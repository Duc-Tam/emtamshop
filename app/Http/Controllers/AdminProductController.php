<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Tag;
use App\ProAttribute;
use Carbon\Carbon;
use Storage;
use DB;
use Log;
use App\ProductImage;
use App\Traits\ImageTraits;
use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Http\Requests\AdminRequestProduct;
class AdminProductController extends Controller
{
    use ImageTraits;
    private $product;
    private $category;
    private $tag;
    public function __construct(Category $category, Product $product, Tag $tag){
        $this->category = $category;
        $this->product  = $product;
        $this->tag      = $tag;
    }

    public function index(){
        $product = Product::paginate(5);
        return view('admin.product.index')->with(compact('product'));
    }
    public function create(){
        $htmlOption = $this->getCate($parentId = '');
        return view('admin.product.add',compact('htmlOption'));
    }


    public function getCate($parentId){
        $data       = $this->category->all();
        $recusive   = new Recusive($data);
        $htmlOption = $recusive->cateRecusive($parentId);
        return $htmlOption;
    }

    public function add(AdminRequestProduct $request){

        try{
            DB::beginTransaction();
            $dataCreate = [
                'p_name'        => $request->p_name,
                'p_price'       => $request->p_price,
                'p_category_id' => $request->p_category_id,
                'p_slug'        => $request->p_slug,
                'p_hot'         => $request->p_hot,
                'description'   => $request->description,
                'p_attr'        => $request->p_attr,
            ];
            $file     = $request ->image;
            $fileName = $file->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('public/product',$fileName);
            $dataUploadImage = [
                'file_name' => $fileName,
                'file_path' => Storage::url($filePath)
            ];
            if(!empty($dataUploadImage)){
                $dataCreate['image'] = $dataUploadImage['file_name'];
                $dataCreate['image_path'] = $dataUploadImage['file_path'];
            }
            $product = $this->product->create($dataCreate);
    
            //Thêm ảnh chi tiết vào Product_Image
            if($request->hasFile('images_path')){
                foreach ($request->images_path as $fileItem){
                    // $dataUploadImageM = $this->TraitUploadImage($fileItem,'product',$product->id);
                    $fileName = $fileItem->getClientOriginalName();
                    $filePath = $fileItem->storeAs('public/product/'.$product->id,$fileName);
                    $dataUploadImageM = [
                        'file_name'   => $fileName,
                        'file_path'   => Storage::url($filePath)
                    ];
                    $product->images()->create([
                        'images_name' => $dataUploadImageM['file_name'],
                        'images_path' => $dataUploadImageM['file_path'],
                    ]);
                }
            }
    
            // THêm tags
    
            foreach ($request->tags as $tagItem){
                $tagInstrance = $this->tag->firstOrCreate(['name' => $tagItem]);
                $tagId[] = $tagInstrance->id;
            }
            $product->tags()->attach($tagId);
            DB::commit();
            return redirect()->route('product.index')->with('success','Thêm sản phẩm thành công');
    
        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('message:'.$exception->getMessage(). 'Line:'.$exception->getLine());
        }
    }

    public function edit($id)
    {
        $product    = $this->product->find($id);
        $htmlOption = $this->getCate($product->p_category_id);
        return view('admin.product.edit', compact('product','htmlOption'));
    }

    public function update(Request $request, $id){
        try{
            DB::beginTransaction();
            $dataUpdate = [
                'p_name'        => $request->p_name,
                'p_price'       => $request->p_price,
                'p_category_id' => $request->p_category_id,
                'p_slug'        => $request->p_slug,
                'p_hot'         => $request->p_hot,
                'description'   => $request->description,
                'p_attr'        => $request->p_attr,
            ];
            if($request->hasFile('image')){
                $file     = $request->image;
                $fileName = $file->getClientOriginalName();
                $filePath = $request->file('image')->storeAs('public/product',$fileName);
                $dataUploadImage = [
                    'file_name'  => $fileName,
                    'file_path'  => Storage::url($filePath)
                ];
            }
            if(!empty($dataUploadImage)){
                $dataUpdate['image']      = $dataUploadImage['file_name'];
                $dataUpdate['image_path'] = $dataUploadImage['file_path'];
            }
            $this->product->find($id)->update($dataUpdate);
            $product = $this->product->find($id);
            //Thêm ảnh chi tiết vào Product_Image
            if($request->hasFile('images_path')){
                ProductImage::where('product_id',$id)->delete();
                foreach ($request->images_path as $fileItem){
                    // $dataUploadImageM = $this->TraitUploadImage($fileItem,'product',$product->id);
                    $fileName = $fileItem->getClientOriginalName();
                    $filePath = $fileItem->storeAs('public/product/'.$product->id,$fileName);
                    $dataUploadImageMulti = [
                        'file_name' => $fileName,
                        'file_path' => Storage::url($filePath)
                    ];
                    $product->images()->create([
                        'images_name' => $dataUploadImageMulti['file_name'],
                        'images_path' => $dataUploadImageMulti['file_path'],
                    ]);
                }
            }
    
            // THêm tags
    
            foreach ($request->tags as $tagItem){
                $tagInstrance = $this->tag->firstOrCreate(['name' => $tagItem]);
                $tagId[] = $tagInstrance->id;
            }
            $product->tags()->sync($tagId);
            DB::commit();
            return redirect()->route('product.index')->with('success','Cập nhật sản phẩm thành công');
    
        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('message:'.$exception->getMessage() . 'Line:'. $exception->getLine());
        }
    }

    public function active($id){
        $product = Product::find($id);
        $product->p_status = ! $product->p_status;
        $product->save();
        return redirect()->back();
    }
    public function productDetail(Request $request,$id){
        if($request->ajax()){
            $attr = ProAttribute::where('product_id',$id)->first();
            $html = view('components.product-detail',compact('attr'))->render();
            return response([
                'html' => $html
            ]);
        }
    }
}
