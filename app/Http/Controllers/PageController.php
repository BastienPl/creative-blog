<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function home() {

        $posts = Post::with(['category', 'tags'])
            ->latest()
            ->where('isPublished', true)
            ->get();

        // $tags = Tag::query()->all();
        return view('pages.home', compact('posts'));

        // return view('pages.home', ['posts' => collect()]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $post = Post::query()
            ->where('id', $request->id)
            ->where('slug', $request->slug)
            ->where('isPublished', true)
            ->firstOrFail();

        return view('pages.show', compact("post"));
    }


    public function filterByCategory(Request $request)
    {
        $posts = Post::with('category')
        ->latest()
        ->where('category_id', $request->id)
        ->where('isPublished', true)
        ->get();

        return view('pages.home', compact("posts"));
    }

    public function filterByTag(Tag $tag)
    {
        $posts = $tag
        ->posts()
        ->with('tags')
        ->latest()
        ->where('isPublished', true)
        ->get();

        return view('pages.home', compact("posts", "tag"));
    }

}
