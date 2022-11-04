@extends('layouts.app')

@section('content')

    @if(isset($post))
        <h1 class="mb-4">{{$post->title}}</h1>
        ​<p>{{$post->description}}</p>
        ​<h6>Crée le : {{$post->created_at}}</h6>
    @endif

@endsection
