<?php

namespace App\Http\Controllers;
use App\Slider;
use App\Tag;
use App\Blog;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $slider = Slider::all();
        $productnew = Product::where('p_status',1)->orderBy('id','asc')->take(10)->get();
        $proAsus = Product::where('p_status',1)->where('p_category_id',8)->get();
        $proGear = Product::where('p_status',1)->where('p_category_id',3)->get();
        $proMoniter = Product::where('p_status',1)->where('p_category_id',5)->get();
        $product = Product::all()->where('p_status','1')->where('p_hot','1');
        $hotdeal = Product::where('p_hot','0')->take(3)->get();
        $hotoffer = Product::where('p_hot','2')->take(3)->get();
        $categorys = Category::where('parent_id','0')->get();
        $bestseller = Product::where('p_hot','2')->get();
        $carts = session()->get('cart');
        $tags = Tag::all();
        $blogs = Blog::all();
        $productsale = Product::all()->where('p_status','1')->where('p_hot','2');
        return view('frontend.home.home',compact('slider','productnew','product','proAsus','proGear','proMoniter','hotdeal','hotoffer','categorys','bestseller','carts','tags','productsale','blogs'));
    }
}
