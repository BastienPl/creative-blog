<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
        $posts = Post::with('category')->latest()->get();

        return view('admin.posts.index', compact('posts'));
        
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
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
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
        $post->category_id = $request->category_id;
        $post->save();
        

        session()->flash('success', "L'article a bien été enregistré");

        return redirect()->route('admin.posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $value
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $value)
    {
        $categories = Category::all();
        return view('admin.posts.create', compact("value", "categories"));
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
        $update->category_id = $request->category_id;
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
