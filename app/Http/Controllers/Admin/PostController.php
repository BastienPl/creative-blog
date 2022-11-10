<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Services\TagService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Image;
use File;

class PostController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = Route::getCurrentRoute()->uri;
        $posts = Post::with('category', 'tags')->latest()->get();

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
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {

        // $tag = New TagService;
        // $tag2 = $tag->storeTag($request);
        
        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, "-");
        $post->description = $request->description;
        if(isset($request->image_name)) {
            
            $image = $request->file('image_name');
            $imageName = date('mdY').$image->getClientOriginalName();

            $destinationPathThumbnail = public_path('images/thumbnail');
            $destinationPathMedium = public_path('images/medium');
            $img = Image::make($image->getPathName());
            // Image vignette
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail .'/'.$imageName);
            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathMedium .'/'.$imageName);

            $image -> move(public_path('images'), $imageName);
            $post->image_name = $imageName;

        }
        $post->isPublished = (bool) $request->isPublished;
        $post->description = $request->description;


        $post->category_id = $request->category_id;
        $post->save();

        // $idPost = DB::getPdo()->lastInsertId();

        // $insertPostTag = $tag->storePivot($idPost, $tag2);

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        }

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
        $tags = Tag::all();

        return view('admin.posts.create', compact("value", "categories", "tags"));
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
        // $tag = New TagService;
        // $tag2 = $tag->storeTag($request);

        $update->title = $request->get('title');
        $update->slug = Str::slug($request->get('title'), "-");
        $update->lead_paragraph = $request->get('lead_paragraph');
        $update->description = $request->get('description');
        if(isset($request->image_name)) {

            if($update->image_name !== null) {
                File::delete(public_path("images/" . $update->image_name ));
                File::delete(public_path("images/thumbnail/" . $update->image_name ));
                File::delete(public_path("images/medium/" . $update->image_name ));
            }
            
            $image = $request->file('image_name');
            $imageName = date('mdY').$image->getClientOriginalName();

            $destinationPathThumbnail = public_path('images/thumbnail');
            $destinationPathMedium = public_path('images/medium');
            $img_thumbnail = Image::make($image->getPathName());
            // Image vignette
            $img_thumbnail->resize(null, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail .'/'.$imageName);
            // Medium
            $img_medium = Image::make($image->getPathName());
            $img_medium->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathMedium .'/'.$imageName);

            $image -> move(public_path('images'), $imageName);
            $update->image_name = $imageName;
        }
        $update->isPublished = (bool)$request->get("isPublished");
        $update->category_id = $request->category_id;
        $update->save();
    
        // $idPost = $update->id;

        // $insertPostTag = $tag->storePivot($idPost, $tag2);

        if ($request->has('tags')) {
            $update->tags()->sync($request->tags);
        }

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
        
        if($post->image_name !== null) {
            File::delete(public_path("images/" . $post->image_name ));
            File::delete(public_path("images/thumbnail/" . $post->image_name ));
            File::delete(public_path("images/medium/" . $post->image_name ));
        }

        $post->delete();

        session()->flash('success', "L'article a bien été supprimé");

        return redirect()->route('admin.posts.index');
    }

}
