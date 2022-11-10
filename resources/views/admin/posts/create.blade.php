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
    <form name="add-blog-post-form" id="add-blog-post-form" enctype= multipart/form-data method="POST" action="{{ isset($value->id) ? route('admin.posts.update', $value->id) : route('admin.posts.store') }}">
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
            <label for="LeadParagraph" class="form-label">Chapeau de l'article</label>
            <textarea class="form-control" name="lead_paragraph" id="FormControlContentArticle" rows="3">{{ isset($value->lead_paragraph) ? $value->lead_paragraph : old('lead_paragraph') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="ContentArticle" class="form-label">Contenu de l'article</label>
            <textarea class="form-control" name="description" id="FormControlContentArticle" rows="3">{{ isset($value->description) ? $value->description : old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="TagArticle" class="form-label">Tag</label>
            {{-- @foreach($tags as $tag) @if(in_array($tag->id, old('tags', $value->tags->pluck('id')->toArray()))) {{ $tag->name.";" }} @endif @endforeach --}}
            <?php
                // $tagValue = "";
                // $tagId = 0;
                // if(isset($tags)) {

                //     foreach($tags as $tag){
                //         if(in_array($tag->id, old('tags', $value->tags->pluck('id')->toArray()))) {
                //             $tagValue = $tag->name;
                //             $tagId = $tag->id;
                //         }
                //     }
                // }
            ?>
            {{-- <input type="text" class="form-control" name="tags" id="FormControlTagArticle" rows="3" value="{{ isset($tagValue) ? trim($tagValue) : "" }}"> --}}
            <select class="form-select" multiple name='tags[]' aria-label="multiple select example" id='TagArticle'>
                @if (!isset($value))
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" @if(in_array($tag->id, old('tags', []))) selected @endif>{{ $tag->name }}</option>
                    @endforeach
                @else
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}" @if(in_array($tag->id, old('tags', $value->tags->pluck('id')->toArray()))) selected @endif>{{ $tag->name }}</option>
                    @endforeach
                @endif
            </select>
       
        </div>
        <div class="mb-3">
            <label for="CategoryArticle" class="form-label">Catégorie</label>
            <select id="categoryArticle" name="category_id" class="form-select" aria-label="Default select example">
                <option value=''></option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @if (
                            (isset($value) && $category->id == old('category_id', $value->category_id)) ||
                            $category->id == old('category_id')
                        )
                            selected
                        @endif 
                    > 
                        {{ isset($category->name) ? $category->name : old("name") }}
                    </option>
                @endforeach
            </select>
        </div>
        @if (isset($value) && $value->image_name !== null)
            <div class="mb-3">
                <img src="/images/thumbnail/{{ $value->image_name }}" alt="">
            </div>
        @endif



        <div class="mb-3">
            <label for="formFile" class="form-label">Insérer une image</label>
            <input class="form-control" type="file" accept="image/*" id="formFile" name="image_name" onchange="preview()">
            <br>
            <img id="thumb" class="img-thumbnail" src="" width="250px"/>
        </div>
        <div class="mb-3">
            <input type="hidden" name="isPublished" value="0">
            {{-- <input type="checkbox" class="btn-check" id="btn-check-outlined" name='isPublished' {{ (isset($value) && $value->isPublished) ? "checked" : ""}}> --}}
            <input type="checkbox" class="btn-check" id="isPublished" name='isPublished' value="1" 
                @if (
                    (isset($value) && old('isPublished', $value->isPublished))
                )
                    checked
                @endif 
            > 
            <label class="btn btn-outline-success" for="isPublished" >En Ligne</label>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        <a href='{{ route('admin.posts.index') }}' class="btn btn-danger">Retour</a>
    </form>
@endsection
