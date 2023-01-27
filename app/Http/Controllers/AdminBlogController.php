<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class AdminBlogController extends Controller
{
    public function index(){
        return view('admin.blogs.index',[
            "blogs"=>Blog::latest()->paginate(2)
        ]);
    }

    function create(){

        return view('admin.blogs.create',[
            'categories'=>Category::all()
        ]);
    }
    function store(){

        $path = request()->file('thumbnail')->store('thumbnails');
        $formData = request()->validate([
            "title" => ["required"],
            "slug" => ["required",Rule::unique('blogs','slug')],
            "intro" => ["required"],
            "body" => ["required"],
            "category_id" => ["required",Rule::exists('categories','id')]
        ]);
        $formData['user_id']=auth()->id();
        $formData['thumbnail']=$path;
        Blog::create($formData);

        return redirect('/');
    }
    function edit(Blog $blog){
        return view('admin.blogs.edit',[
            'blog'=>$blog,
            'categories'=>Category::all()
        ]);
    }

    public function update(Blog $blog){
        $path = request()->file('thumbnail') ? request()->file('thumbnail')->store('thumbnails') : $blog->thumbnail;
        $formData = request()->validate([
            "title" => ["required"],
            "slug" => ["required",Rule::unique('blogs','slug')->ignore($blog->id)],
            "intro" => ["required"],
            "body" => ["required"],
            "category_id" => ["required",Rule::exists('categories','id')]
        ]);
        $formData['user_id']=auth()->id();
        $formData['thumbnail']=$path;
        $blog->update($formData);

        return redirect('/');
        
    }
    public function destory(Blog $blog){
         $blog->delete();
         return back()->with('success','The Blog has been deleted');
    }
}
