<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\CourseCategory;



class BlogController extends Controller
{
   public function index (){
    $posts = Blog::latest()->paginate(2);
    $categories = CourseCategory::all();
    return view('pages.blog.index', compact('posts', 'categories'));
   }


   public function show($slug){

      $post = Blog::where('slug', $slug)->first();
$categories = CourseCategory::all();
      return view('pages.blog.show', compact('post', 'categories'));
   }

   public function comment(){

   }

   public function filter($title){

      $category = CourseCategory::where('title', $title)->first();
      $posts = $category->categoryBlogs()->paginate(3);
      $categories = CourseCategory::all();

     return view('pages.blog.filter', compact('posts', 'categories'));
   }

   public function search(Request $request) {


       $posts = Blog::where('title','like', '%'.$request->searchterm.'%')->orWhere('excerpt', 'like', '%'.$request->searchterm.'%')->orWhere('slug', 'like', '%'.$request->searchterm.'%')->orWhere('description', 'like', '%'.$request->searchterm.'%')->paginate(3);
        $categories = CourseCategory::all();
        return view('pages.blog.search', compact('posts', 'categories'));
   }
}
