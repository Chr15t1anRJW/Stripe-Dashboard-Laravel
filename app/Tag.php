<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

	protected $fillable = [
	'name',
	
	
	
	];
	public function properties(){
		
		return $this->belongsToMany('App\Property');
		
		}
		
		
	public function getTagListAttributs(){
		
		return $this->tags->list('id');
		
		}

}
