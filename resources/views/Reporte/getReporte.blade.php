@extends('template.layout')
    @section('title', 'Home')
    @section('content')
    	@foreach($detalles as $detalle)
    		{{$detalle->id}}
    	@endforeach
    @endsection