<?php namespace App\Http\Controllers;

use App\Property;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreatePropertyRequest;

use Request;

use Auth;


class PropertiesController extends Controller {
	
	
	
	public function __construct(){
		
		
			
			$this->middleware('auth');
			
		
		
		
		}
	
	

	public function index(){
		
		
		$properties = Property::all();
		return view('properties.index',compact('properties'));
		}
 


	public function show($id){
		
		
		
		$properties = Property::all();
		
		
		$property = Property::findOrFail($id);
		//Api Key 
 		$apikey = $property->api_key;
		
		$now = new \DateTime('now');
		$month = $now->format('m');
		$year = $now->format('Y');
		$day = $now->format('d');
		
		$startDate = $year.'-'.$month.'-01';
		$start = strtotime('01-'.$month.'-'.$year);

		$finishDate = $year.'-'.$month.'-'.$day;
		$finish = strtotime($day.'-'.$month.'-'.$year);
		

		$transpfers  = Property::gettransdata($start,$finish,$apikey);
		$results = Property::getpropdata($start,$finish,$apikey);
		return view('properties.show',compact('property','results','transpfers','startDate','finishDate','properties'));
		}
		
		
		
	public function showrange($id){
		$properties = Property::all();
		
		$property = Property::findOrFail($id);
		$apikey = $property->api_key;
		$input = Request::all();
		$start = $input['start'];
		$finish = $input['finish'];
		
		$start = strtotime(str_replace('-', '/',$start));
		$finish = strtotime(str_replace('-', '/',$finish));
		$finish = $finish+86400;
		
		$transpfers = Property::gettransdata($start,$finish,$apikey);
		$results = Property::getpropdata($start,$finish,$apikey);
		return view('properties.show',compact('property','transpfers','results','input','properties'));	
		}
	

public function create(){
	
	$tags = Tag::lists('name','id');
	$properties = Property::all();
		return view('properties.create',compact('properties','tags'));
		}


public function store(CreatePropertyRequest $request){
		
		$property = Auth::user()->properties()->create($request->all());
		$property->tags()->attach($request->input('tag_list'));
		
		//Property::create($request->all());
		
		return redirect('properties');
		
		
		}
		
		
public function edit($id){
		$tags = Tag::lists('name','id');
		//Property::create($request->all());
		$properties = Property::all();
		$property = Property::findOrFail($id);
		return view('properties.edit', compact('property','properties','tags'));
		
		
		}


 public function update(CreatePropertyRequest $request, $id){
	
	$article = Property::findOrFail($id);
	$article->update($request->all());
	return redirect('properties');
	
	
 }


}
