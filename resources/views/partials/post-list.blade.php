
    @if (!$posts->isEmpty())

        <div class="row">

            @foreach ($posts as $post)

                <div class="col-12 col-sm-6 col-md-3 col-lg-3">
                    
                    <div class="card mb-4 bg-light card-min-height">
                        @if(isset($post->category)) 
                            <div class="text-nowrap category-badge">
                                <p role="button" onclick="location.href='{{ route('categorie.home', ['id' => $post->category->id])}}'" class='badge bg-info bg-info-custom'>{{ Str::upper($post->category->name) }}</p>
                            </div> 
                        @else 
                            <span class="text-nowrap"></span>  
                        @endif 
                        <img src="/images/thumbnail/{{ $post->image_name === null ? "non_image.png" : $post->image_name }}" class="card-img-top" alt="..." style="height:150px">
                        <div class="card-body"> 
                            <h5 class="card-title text-center">{{ $post->title }}</h5>
                            <p class="card-text text-center">{{ $post->lead_paragraph }}</p>
                            <div class="text-center">
                                <a href="{{route('pages.show', ['slug' =>$post->slug, 'id' => $post->id])}}" class="btn bg-info-custom">Voir l'article</a>
                            </div>
                            @if(isset($post->tags)) 
                                <div class="text-left mt-2"> Tag :
                                    @foreach ($post->tags as $tag)
                                        <span role="button" onclick="location.href='{{ route('tag.home', $tag)}}'" class='badge bg-info bg-info-tag mt-1'>{{ Str::upper($tag->name) }}</span>
                                        {{-- <span class="badge bg-info bg-info-tag mt-1">{{ Str::upper($tag->name) }}</span> --}}
                                    @endforeach
                                </div> 
                            @else
                                <div class="text-left mt-2"></div> 
                            @endif 
                        </div>
                        <div class="card-footer text-muted">
                            <small class="opacity-50 text-nowrap">Crée le {{ $post->created_at->format('d/m/Y') }}</small>
                        </div>
                    </div>

                </div>

            @endforeach

        </div>
    
    @endif
</section>