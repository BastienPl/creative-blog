@extends('pages.home')

@section('contentList')

    @if(Session::has('success')) 
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
    
    <h2 class="mb-4" id='lastPost'>Les derniers articles : </h2> 
    
    
    @if (!$posts->isEmpty())
    
    <div class="list-group w-auto mb-4">
        
        @foreach ($posts as $post)
        
        <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3">
            <div class="d-flex gap-2 w-100 justify-content-between">
                <div>
                    <h6 class="mb-0">{{ $post->title }}</h6>
                    <p class="mb-0 opacity-75">{{ $post->description }}</p>
                </div>
                <small class="opacity-50 text-nowrap">Le {{ $post->created_at }}</small>
            </div>
        </a>
        
        @endforeach
        
    </div>
    
    @endif
    
    
    @endsection
