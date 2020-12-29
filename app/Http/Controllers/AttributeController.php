<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProAttribute;
class AttributeController extends Controller
{
    private $attribute;
    public function __construct(ProAttribute $attribute){
        $this->attribute = $attribute;
    }
    public function getAddAttribute($id){
        $product = Product::find($id);
        return view('admin.product.attribute.add',compact('product'));
    }
    public function postAddAttribute(Request $request,$id){
        $product = Product::find($id);
        $productID = $product->id;
        $this->attribute->create([
            'product_id'   => $product->id,
            'lap_ram' => $request->lap_ram,
            'lap_cpu' => $request->lap_cpu,
            'lap_main' => $request->lap_main,
            'lap_card' => $request->lap_card,
            'lap_screen' => $request->lap_screen,
            'lap_conggiaotiep' => $request->lap_conggiaotiep,
            'lap_audio' => $request->lap_audio,
            'lap_LAN' => $request->lap_LAN,
            'lap_WIFI' => $request->lap_WIFI,
            'lap_blutooth' => $request->lap_blutooth,
            'lap_system' => $request->lap_system,
            'lap_pin' => $request->lap_pin,
            'lap_weight' => $request->lap_weight,
            'lap_size' => $request->lap_size,
        ]);
        return redirect()->route('product.index')->with('success',' Đã thêm thành công chi tiết sản phẩm');
    }
    public function editAttribute($id){
        $attr = ProAttribute::find($id);
        $product = Product::find($id);
    }
}
