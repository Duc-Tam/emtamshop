<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class BlogController extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('frontend.blog.index',compact('blogs'));
    }
    public function detail($slug,$id){
        $blogs = Blog::find($id);
        return view('frontend.blog.blog-detail',compact('blogs'));
    }
}
