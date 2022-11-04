@extends('layouts.app')

@section('content')

    @if(Session::has('success')) 
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <h2 class="mb-4">Administration des catégories : </h2> 
    <p>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-primary">Ajouter une catégorie</a>
    </p>

    @if (!$categories->isEmpty())
        
        <div class="list-group w-auto mb-4">

        @foreach ($categories as $category)

                <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                            <h6 class="mb-0">{{ $category->name }}</h6>
                        </div>
                    </div>
                    <span><a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-outline-info"><i class="bi bi-brush-fill"></i></a></span>
                    <form action="{{ route('admin.categories.destroy', ['id' => $category->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger" onclick="confirm('Êtes-vous sur de vouloir supprimer la catégorie ?')"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </div>

        @endforeach

        </div>

    @endif


@endsection