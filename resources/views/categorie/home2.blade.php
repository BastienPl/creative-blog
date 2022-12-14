@extends('layouts.app')

@section('content')

    <div class="px-4 py-5 my-5 text-center">
        <img class="d-inline-block mb-3" src="https://www.creative-formation.fr/wp-content/themes/creative-formation/assets/lettre-creative.svg" alt="Le C du logo Créative Formation" style="width: 50px">
        <h1 class="display-5 fw-bold">Bienvenue sur le blog de Créative</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Retrouvez-ici nos dernières actualités !</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <a class="btn btn-primary btn-lg px-4 gap-3" href="#lastPost">Accédez aux actualités</a>
            </div>
        </div>
    </div>

    <h2 class="mb-4" id='lastPost'>Les derniers articles pour la catégorie : {{ $posts[0]->category->name }} </h2> 

    @if (isset($posts) && !$posts->isEmpty())
    
    <div class="list-group w-auto mb-4">
        
        @foreach ($posts as $post)

            @if ($post->isPublished == 1)
            
            <div class="list-group-item list-group-item-action d-flex gap-3 py-3">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">{{ $post->title }}</h6>
                        <p class="mb-0 opacity-75">{{ $post->description }}</p>
                        @if(isset($post->category)) 
                            <p class="text-nowrap"> Catégorie : <span role="button" onclick="location.href='{{ route('categorie.home', ['id' => $post->category->id])}}'" class='badge bg-info'>{{ $post->category->name }}</span></p> 
                        @else 
                            <p class="text-nowrap"> Catégorie : </p>  
                        @endif 
                        <div class="d-flex justify-content-end">
                            <a href="{{route('pages.show', ['slug' =>$post->slug, 'id' => $post->id])}}" class="btn btn-primary">Voir l'article</a>
                        </div>
                    </div>
                    <small class="opacity-50 text-nowrap">Le {{ $post->created_at }}</small>
                </div>
            </div>

            @endif
        
        @endforeach
        
    </div>
    
    @endif

@endsection

