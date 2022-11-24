<?php

namespace App\Http\Controllers;

use App\Models\Blog;


class BlogController extends Controller
{
    function index() {
        return view('blogs.index',[
            'blogs'=>Blog::latest()
                        ->filter(request(['search','category','user']))
                        ->paginate(6)
                        ->withQueryString()
        ]);
    }

    function show(Blog $blog){

        return view('blogs.show',[
            'blog'=>$blog,
            'randomBlogs'=>Blog::inrandomOrder()->take(3)->get()
        ]);
    }
}
