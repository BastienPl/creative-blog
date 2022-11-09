@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body" style="min-height: 13em;">
                    <h5 class="card-title">Gestion des articles</h5>
                    <p class="card-text">Permet de lister, d'ajouter, de modifer, ainsi que supprimer les artciles.</p>
                    <a href="posts" class="btn btn-primary">Acceder</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body" style="min-height: 13em;">
                    <h5 class="card-title">Gestion des catégorie</h5>
                    <p class="card-text">Permet de lister, d'ajouter, de modifer, ainsi que supprimer les catégories du blog</p>
                    <a href="categories" class="btn btn-primary">Acceder</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body" style="min-height: 13em;">
                    <h5 class="card-title">Gestion des tags</h5>
                    <p class="card-text">Permet de lister, d'ajouter, de modifer, ainsi que supprimer les tags du blog</p>
                    <a href="tags" class="btn btn-primary">Acceder</a>
                </div>
            </div>
        </div>
    </div>

@endsection