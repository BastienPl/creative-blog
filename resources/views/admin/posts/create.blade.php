@extends('layouts.app')

@section('content')

<p>
    <button onclick="location.href='{{ URL::previous() }}'" class="btn btn-danger">Retour</button>
</p>

<form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{ isset($value->id) ? route('posts.update', $value->id) : route('posts.store') }}">
    @csrf
    <div class="mb-3">
        <label for="ArticleTitle" class="form-label">Titre de l'article</label>
        <input value="{{ isset($value->title) ? $value->title : old('title') }}" type="title" name="title" class="form-control" id="ArticleTitle" aria-describedby="ArticleTitle">
    </div>
    <div class="mb-3">
        <label for="ContentArticle" class="form-label">Contenu de l'article</label>
        <textarea class="form-control" name="description" id="FormControlContentArticle" rows="3">{{ isset($value->description) ? $value->description : old('description') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

@endsection