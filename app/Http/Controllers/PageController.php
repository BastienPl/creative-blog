<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function home() {

        $posts = Post::with('category')
            ->latest()
            ->where('isPublished', true)
            ->get();
        return view('pages.home', ['posts' => $posts]);

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

}
