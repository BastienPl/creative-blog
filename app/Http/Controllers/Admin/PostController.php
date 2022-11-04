<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = Route::getCurrentRoute()->uri;
        $posts = Post::latest()->get();

        return view('admin.posts.index', ['posts' => $posts]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function panel()
    {
        return view('admin.posts.panel');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        
        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, "-");
        $post->description = $request->description;
        $post->isPublished = isset($request->isPublished) ? 1 : 0;
        $post->save();
        

        session()->flash('success', "L'article a bien été enregistré");

        return redirect()->route('admin.posts.index');
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
            ->firstOrFail();

        return view('pages.show', compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $value
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $value)
    {
        return view('admin.posts.create', compact("value"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $update)
    {
        $update->title = $request->get('title');
        $update->slug = Str::slug($request->get('title'), "-");
        $update->description = $request->get('description');
        $update->isPublished = isset($request->isPublished) ? 1 : 0;
        $update->save();

        session()->flash('success', "L'article a bien été modifié");

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Post::query()
            ->where('id', $request->id)
            ->firstOrFail();
            
        $post->delete();

        session()->flash('success', "L'article a bien été supprimé");

        return redirect()->route('admin.posts.index');
    }
}
