@extends('layouts.app')

@section('content')

<form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('posts/store')}}">
    @csrf
    <div class="mb-3">
        <label for="ArticleTitle" class="form-label">Titre de l'article</label>
        <input type="title" name="title" class="form-control" id="ArticleTitle" aria-describedby="ArticleTitle">
      </div>
      <div class="mb-3">
        <label for="ContentArticle" class="form-label">Contenu de l'article</label>
        <textarea class="form-control" name="description" id="FormControlContentArticle" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>


@endsection