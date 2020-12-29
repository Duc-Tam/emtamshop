<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Components\Recusive;
class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category){
        $this->category = $category;
    }

    public function index(){
        $category = Category::paginate(5);
        return view('admin.category.index')->with(compact('category'));
    }
    public function create(){
        $htmlOption = $this->getCate($parentId = '');
        return view('admin.category.add', compact('htmlOption'));
    }

    public function add(Request $request){
        $data = $request->validate([
            'name' => 'required|unique:categories,name',
            'slug' => 'required',
            'parent_id' => 'required',
            'status' => 'required',
            'icon' => 'required',
        ],[
            'name.required'=> 'Vui lòng nhập tên danh mục',
            'name.unique'=> 'Danh mục đã có trong CSDL',
            'slug.required'=> 'Vui lòng nhập đường dẫn chuẩn SEO'
        ]);
        $category = new Category();
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->icon = $data['icon'];
        $category->parent_id = $data['parent_id'];
        $category->status = $data['status'];
        $category->save();
        return redirect()->route('categories.index')->with('success','Thêm danh mục thành công');
    }

    public function getCate($parentId){
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->cateRecusive($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCate($category->parent_id);
        return view('admin.category.edit', compact('category','htmlOption'));
    }

    public function update($id, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'parent_id' => 'required',
            'icon' =>'required',
        ]);
        $category = Category::find($id);
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->icon = $data['icon'];
        $category->parent_id = $data['parent_id'];
        $category->save();
        return redirect()->route('categories.index')->with('success','Cập nhật danh mục thành công');
    }

    public function active($id){
        $category = Category::find($id);
        $category->status = ! $category->status;
        $category->save();
        return redirect()->back();
    }
    public function delete($id){
        $category = Category::find($id);
        $product = Product::where('p_category_id',$id)->get();
        if(count($product)==0){
            $category->delete();
            return redirect()->back()->with('success','Xóa danh mục thành công');
        }
        else{
            return redirect()->back()->with('danger','Danh mục có sản phẩm không thể xóa !!!');
        }
    }
}
