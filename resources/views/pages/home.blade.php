@extends('layouts.app')

@section('content')

    @if(Route::is('pages.home') )
        @include('layouts.welcome-layout')
    @endif


    @if(Session::has('success')) 
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    
    <section class="main-content">
        @if(Route::is('pages.home') )
            <h2 class="mb-4" id='lastPost'>Les derniers articles : </h2>
        @elseif(Route::is('categorie.home') )
            <h2 class="mb-4" id='lastPost'>Les derniers articles pour la catégorie : {{ $posts[0]->category->name }} </h2> 
        @elseif(Route::is('tag.home') )
            <h2 class="mb-4" id='lastPost'>Les derniers articles pour le tag : {{ $tag->name }} </h2> 
        @endif

        @include('partials.post-list')

@endsection

