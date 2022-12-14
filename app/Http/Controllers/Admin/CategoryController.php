<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $route = Route::getCurrentRoute()->uri;
        $categories = Category::latest()->get();

        return view('admin.categories.index', compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        
        $post = new Category;
        $post->name = $request->name;
        $post->save();
        
        session()->flash('success', "La catégorie a bien été enregistrée");

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $value
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $value)
    {
        return view('admin.categories.create', compact("value"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $update)
    {
        $update->name = $request->get('name');
        $update->save();

        session()->flash('success', "La catégorie a bien été modifiée");

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Category::query()
            ->where('id', $request->id)
            ->firstOrFail();
            
        $post->delete();

        session()->flash('success', "La catégorie a bien été supprimée");

        return redirect()->route('admin.categories.index');
    }
}
