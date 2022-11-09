@extends('layouts.app')

@section('content')

    @if(Session::has('success')) 
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <h2 class="mb-4">Administration des tags : </h2> 
    <p>
        <a href="{{ route('admin.tags.create') }}" class="btn btn-outline-primary">Ajouter un tag</a>
    </p>

    @if (!$tags->isEmpty())
        
        <div class="list-group w-auto mb-4">

        @foreach ($tags as $tag)

                <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{ $tag->name }}</h6>
                        </div>
                    </div>
                    <span><a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-outline-info"><i class="bi bi-brush-fill"></i></a></span>
                    <form action="{{ route('admin.tags.destroy', ['id' => $tag->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger" onclick="confirm('Êtes-vous sur de vouloir supprimer le tag ?')"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </div>

        @endforeach

        </div>

    @endif


@endsection