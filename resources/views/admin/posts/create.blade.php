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
    <h1><center>Modifier un article</center></h1>
@else
    <h1><center>Ajouter un article</center></h1>
@endif
<br>
<form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{ isset($value->id) ? route('admin.posts.update', $value->id) : route('admin.posts.store') }}">
    @csrf

    @if (isset($value->id))
        @method("put")
    @else
        @method("post")
    @endif

    <div class="mb-3">
        <label for="ArticleTitle" class="form-label">Titre de l'article</label>
        <input value="{{ isset($value->title) ? $value->title : old('title') }}" type="title" name="title" class="form-control" id="ArticleTitle" aria-describedby="ArticleTitle">
    </div>
    <div class="mb-3">
        <label for="ContentArticle" class="form-label">Contenu de l'article</label>
        <textarea class="form-control" name="description" id="FormControlContentArticle" rows="3">{{ isset($value->description) ? $value->description : old('description') }}</textarea>
    </div>
    <div class="mb-3">
        <input type="checkbox" class="btn-check" id="btn-check-outlined" autocomplete="off" name='isPublished' {{ (isset($value) && $value->isPublished) ? "checked" : " "}}>
        <label class="btn btn-outline-success" for="btn-check-outlined">En Ligne</label>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
    <a href='{{ route('admin.posts.index') }}' class="btn btn-danger">Retour</a>
</form>

@endsection