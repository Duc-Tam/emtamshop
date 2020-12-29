<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Product;
class CartController extends Controller
{
    public function addToCart($id){
        $product = Product::find($id);
        $cart = session()->get('cart');
        if ( isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }
        else
        {
            $cart[$id] = [
                'name'     => $product->p_name,
                'price'    => $product->p_price,
                'image'    => $product->image_path,
                'quantity' => 1
            ];
        }
        session()->put('cart',$cart);
        \Session::flash('toastr',[
            'type' => 'success',
            'message' => 'Thêm giỏ hàng thành công'
        ]);
        return redirect()->back();
    }
    public function index(){
        $carts = session()->get('cart');
        return view ('frontend.cart.index',compact('carts'));
    }

    public function updateCart(Request $request){
        
        if($request->id && $request->quantity){
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart',$carts);
        }
    }

    public function deleteCart(Request $request){
        
        if($request->id){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart',$carts);
            \Session::flash('toastr',[
                'type' => 'success',
                'message' => 'Đã xóa sản phẩm khỏi giỏ hàng'
            ]);
            return redirect()->back();
        }
    }
}
