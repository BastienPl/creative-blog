@extends('layouts.app')

@section('content')

@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger alert-dismissible fade show" id="formMessage" role="alert">
        {{ $error }}
    </p>
    @endforeach
@endif

@if (isset($value))
    <h1><center>Modifier un tag</center></h1>
@else
    <h1><center>Ajouter un tag</center></h1>
@endif
<br>
<form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{ isset($value) ? route('admin.tags.update', $value->id) : route('admin.tags.store') }}">
    @csrf

    @if (isset($value))
        @method("put")
    @else
        @method("post")
    @endif

    <div class="mb-3">
        <label for="ArticleTitle" class="form-label">Nom du tag</label>
        <input value="{{ isset($value->name) ? $value->name : old('name') }}" type="name" name="name" class="form-control" id="ArticleTitle" aria-describedby="ArticleTitle">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
    <a href='{{ route('admin.tags.index') }}' class="btn btn-danger">Retour</a>
</form>

@endsection