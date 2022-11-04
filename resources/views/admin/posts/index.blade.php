@extends('layouts.app')

@section('content')

    @if(Session::has('success')) 
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <h2 class="mb-4">Administration des articles : </h2> 
    <p>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-outline-primary">Ajouter un Article</a>
    </p>

    @if (!$posts->isEmpty())
        
        <div class="list-group w-auto mb-4">

        @foreach ($posts as $post)

                <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{ $post->title }}</h6>
                            <p class="mb-0 opacity-75">{{ $post->description }}</p>
                            <span class="badge badge-pill bg-{{ $post->isPublished == 1 ? "success" : "secondary" }}">{{ $post->isPublished == 1 ? "En Ligne" : "Hors Ligne" }}</span>
                        </div>
                        <small class="opacity-50 text-nowrap">Le {{ $post->created_at }}</small>
                    </div>
                    <span><a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-outline-info"><i class="bi bi-brush-fill"></i></a></span>
                    <form action="{{ route('admin.posts.destroy', ['id' => $post->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger" onclick="confirm('Êtes-vous sur de vouloir supprimer le l\'article ?')"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </div>

        @endforeach

        </div>

    @endif


@endsection