@extends('layouts.app')

@section('content')

    @if(isset($value))
        <h1 class="mb-4">{{$value->title}}</h1>
        ​<p>{{$value->description}}</p>
        ​<h6>Crée le : {{$value->created_at}}</h6>
    @endif

@endsection
