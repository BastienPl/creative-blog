@extends('layouts.app')

@section('content')

    @if(Session::has('success')) 
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <h2 class="mb-4">Administration des articles : </h2> 
    <p>
        <button onclick="location.href='{{ route('posts.create') }}'" class="btn btn-outline-primary">Ajouter un Article</button>
    </p>

    @if (!$posts->isEmpty())
        
        <div class="list-group w-auto mb-4">

        @foreach ($posts as $post)

            <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">{{ $post->title }}</h6>
                        <p class="mb-0 opacity-75">{{ $post->description }}</p>
                    </div>
                    <small class="opacity-50 text-nowrap">Le {{ $post->created_at }}</small>
                </div>
                <button onclick="location.href='{{ route('posts.edit', $post->id)}}'" class="btn btn-outline-info">Modifier</button>
                <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">╳</button>
                </form>
            </a>

        @endforeach

        </div>

    @endif


@endsection