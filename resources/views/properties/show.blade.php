@extends('pages')
@section('content')
<?php 
//Api Key 
$apikey = $property->api_key;
//Site title
$siteTitle = $property->title;
//Site Description
$siteDescript = $property->description;
if(!empty($input)){
$startDate = $input['start'];
$finishDate = $input['finish'];
	}
$gross = $results[0];
$fees = $results[1];
$refunds = $results[2];
 ?>
 
<div style="padding:15px;">
<div class="row">
 
<h1>Property : <?php echo $siteTitle; ?>: <a href="/properties/<?php echo $property->id; ?>/edit">Edit</a>.</h1>
<?php 
echo '<hr/>';
echo '<p>'.$siteDescript.'</p>';
echo '<p> Start Date '.$startDate.'</p>';
echo '<p> Finish Date '.$finishDate.'</p>';
?>
 
<div class="col-lg-8 col-xs-offset-1">
    {!! Form::open(array('url' => '/properties/'.$property->id)) !!}
    
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
         <div class="col-lg-6">
        <h3>Start</h3>
           <input type="date" name="start" placeholder="mm/dd/yyyy" required="required"><br><br>
    </div>
    <div class="col-lg-6">
        <h3>Finish</h3>
            <input type="date" name="finish" placeholder="mm/dd/yyyy" required="required"><br><br>
    </div>
        <input type="submit" class="btn btn-default pull-right">
    
{!! Form::close() !!}
     
 </div>

</div>

<div class="row">
<hr/>

<p>Gross :<?php echo $gross/100;?> </p>

<p>Fees : <?php echo $fees/100;?></p>
<p>Transfers :<?php echo $transpfers/100;?> </p>

<p>Refunds :<?php echo $refunds/100;?> </p>

<p>Net :<?php echo ($gross-$refunds)/100;?> </p>
<p>Net+ :<?php echo (($gross-$refunds)-$fees)/100;?> </p>




</div>
<div class="row hidden">

@unless($property->tags->isEmpty())

<h5>Tags:</h5>        
        <ul>
        @foreach($property->tags as $tag)
        <li class="mt">
        {{$tag->name}}
        </li>
        @endforeach
        </ul>
@endunless
</div>

</div>

@stop