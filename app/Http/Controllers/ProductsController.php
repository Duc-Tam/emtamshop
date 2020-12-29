<?php

namespace App\Http\Controllers;
use App\Category;
use App\Slider;
use App\Product;
use App\Comments;
use App\ProAttribute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index($slug, $categoryID){
        $slider = Slider::all();
        $category = Category::find($categoryID);
        $categorys = Category::where('parent_id','0')->get();
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'tang_dan'){
                $products = Product::where('p_category_id',$categoryID)->where('p_status',1)->orderBy('p_price','asc')
                ->paginate(6)
                ->appends(request()->query());
            }
            elseif($sort_by == 'giam_dan'){
                $products = Product::where('p_category_id',$categoryID)->where('p_status',1)->orderBy('p_price','desc')
                ->paginate(9)
                ->appends(request()->query());
            }
            elseif($sort_by == 'A_Z'){
                $products = Product::where('p_category_id',$categoryID)->where('p_status',1)->orderBy('p_name','asc')
                ->paginate(9)
                ->appends(request()->query());
            }
            elseif($sort_by == 'Z_A'){
                $products = Product::where('p_category_id',$categoryID)->where('p_status',1)->orderBy('p_name','desc')
                ->paginate(9)
                ->appends(request()->query());
            }
        }
        else{
            $products = Product::where('p_category_id',$categoryID)->where('p_status',1)->paginate(6);
        }
        return view('frontend.product.category.list-product',compact('categorys','slider','products','category'));
    }

    public function allproduct(){
        $slider = Slider::all();
        $categorys = Category::where('parent_id','0')->get();
        if(isset($_GET['sort_by'])){
            $sort_by = $_GET['sort_by'];
            if($sort_by == 'tang_dan'){
                $products = Product::where('p_status',1)->orderBy('p_price','asc')->paginate(9)
                ->appends(request()->query());
            }
            elseif($sort_by == 'giam_dan'){
                $products = Product::where('p_status',1)->orderBy('p_price','desc')->paginate(9)
                ->appends(request()->query());
            }
            elseif($sort_by == 'A_Z'){
                $products = Product::where('p_status',1)->orderBy('p_name','asc')->paginate(9)
                ->appends(request()->query());
            }
            elseif($sort_by == 'Z_A'){
                $products = Product::where('p_status',1)->orderBy('p_name','desc')->paginate(9)
                ->appends(request()->query());
            }
        }
        else{
            $products = Product::where('p_status',1)->paginate(9);
        }
        return view('frontend.product.all-product',compact('categorys','slider','products'));
    }

    public function detail($slug,$productID){
        $product = Product::where('id',$productID)->findOrFail($productID);
        $parentid = $product->p_category_id;
        $hotdeal = Product::where('p_hot','0')->take(3)->get();
        $relatedproduct = Product::where('p_category_id',$parentid)->take(4)->get();
        $attr = ProAttribute::where('product_id',$product->id)->first();
        $attid = $attr['product_id'] ?? '0';
        $comments = Comments::where('product_id',$product->id)->where('status',1)->where('parent_comment_id',0)->get();
        $repcmt = Comments::where('product_id',$product->id)->where('status',1)->get();
        return view('frontend.product.product-detail',compact('product','relatedproduct','hotdeal','attr','attid','comments','repcmt'));
    }
    public function getSearch(Request $request){
        $slider = Slider::all();
        $categorys = Category::where('parent_id','0')->get();
        $productsearch = Product::where('p_name','like','%'.$request->key.'%')
                                ->orWhere('p_price',$request->key)
                                ->get();
        return view('frontend.product.search',compact('productsearch','slider','categorys'));
    }

    public function getSearchAjax(Request $request){
        $slider = Slider::all();
        $categorys = Category::where('parent_id','0')->get();
        $data = $request->all();
        if($data['query']){
            $product = Product::where('p_status',1)->where('p_name','like','%'.$data['query'].'%')->get();
            $output = '<ul class="dropdown-menu" style="display:block;margin-left:15px;">';
            foreach($product as $key => $value){
                $output .='<li><a href="san-pham/'.$value->p_slug.'/'.$value->id.'">'.$value->p_name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function postComment(Request $request,$id){
        $product = Product::find($id);
        $proid = $product->id;
        if(isset(Auth::user()->id)){
            $data['user_id'] = Auth::user()->id;
        }
        $data = [
            'user_id'        => Auth::user()->id ?? '0',
            'product_id'     =>$proid,
            'name'           => $request->name,
            'content'        => $request->content,
        ];
        $comment = Comments::create($data);
        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Đã gửi đánh giá sản phẩm.'
        ]);
        return redirect()->back();
    }
}