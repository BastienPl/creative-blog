<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function home() {

        // $posts = Post::lastest()->get();
        // return view('pages.home', ['posts' => $posts]);

        return view('pages.home', ['posts' => collect()]);

    }

}
