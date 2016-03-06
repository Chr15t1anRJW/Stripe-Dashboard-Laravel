@extends('pages')
@section('content')


<div class="container">
<h1>Edit Property</h1>


{!! Form::model($property,['method'=>'POST','url'=>'properties/'.$property->id.'/edit']) !!}

<div class="form-group">   
        {!! Form::label('title','Title:') !!}
        
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
     
      </div>

		 <div class="form-group">   
        {!! Form::label('description','Description:') !!}
        
        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
    
      </div>
      
      <div class="form-group">   
        {!! Form::label('api_key','Api KEY:') !!}
      
        {!! Form::text('api_key', null, ['class'=>'form-control']) !!}
    
      </div>
       <div class="form-group hidden">   
        {!! Form::label('tag_list','Tags:') !!}
      
        {!! Form::select('tag_list[]', $tags,null, ['class'=>'form-control', 'multiple']) !!}
    
      </div>
      
       <div class="form-group">   
        
        {!! Form::submit('Add Property', ['class'=>'btn btn-primary form-control']) !!}
    
      </div>

{!! Form::close() !!}

@if($errors->any())
	<ul class="alert alert-danger">
    	@foreach($errors->all() as $error)
        	<li>{{$error}}</li>
            
        @endforeach
    
    </ul>

@endif




</div>
@stop