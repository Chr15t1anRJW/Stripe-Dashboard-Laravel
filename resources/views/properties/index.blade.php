@extends('pages')
@section('content')
<h1>Properties</h1>
@foreach($properties as $property)
<a href="properties/{{$property->id}}"><h3>{{$property->title}}</h3></a>
@endforeach
@stop