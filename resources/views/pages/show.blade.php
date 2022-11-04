@extends('layouts.app')

@section('content')

    @if(isset($post))
        <h1 class="mb-4">{{$post->title}}</h1>
        ​<p>{{$post->description}}</p>
        ​<small>Crée le : {{$post->created_at->format('d/m/Y')}}</small>
    @endif

@endsection
