<?php

namespace App\Http\Controllers;
use App\Blog;
use Storage;
use Illuminate\Http\Request;
use App\Http\Requests\AdminBlogRequest;
class AdminBlogController extends Controller
{
    private $blog;
    public function __construct(Blog $blog){
        $this->blog = $blog;
    }
    public function index(){
        $blogs = Blog::all();
        return view('admin.blog.index',compact('blogs'));
    }
    public function create(){
        return view('admin.blog.add');
    }
    public function add(AdminBlogRequest $request){
        $dataCreate = [
            'b_name'    => $request->b_name,
            'b_slug'    => $request->b_slug,
            'b_desc'    => $request->b_desc,
            'b_content' => $request->b_content,
            'b_author'  => $request->b_author
        ];
        if($request->hasFile('b_image')){
            $file     = $request->b_image;
            $fileName = $file->getClientOriginalName();
            $filePath = $request->file('b_image')->storeAs('public/blog',$fileName);
            $dataImage = [
                'file_name'  => $fileName,
                'file_path'  => Storage::url($filePath)
            ];
        }
        if(!empty($dataImage)){
            $dataCreate['b_image']      = $dataImage['file_path'];
        }
        $this->blog->create($dataCreate);
        return redirect()->route('Adminblogs.index')->with('success','Thêm tin tức thành công');
    }
    public function getEdit($id){
        $blogs = Blog::find($id);
        return view('admin.blog.edit',compact('blogs'));
    }
    public function postEdit(Request $request,$id){
        $dataUpdate = [
            'b_name'    => $request->b_name,
            'b_slug'    => $request->b_slug,
            'b_desc'    => $request->b_desc,
            'b_content' => $request->b_content,
            'b_author'  => $request->b_author
        ];
        if($request->hasFile('b_image')){
            $file     = $request->b_image;
            $fileName = $file->getClientOriginalName();
            $filePath = $request->file('b_image')->storeAs('public/blog',$fileName);
            $dataImage = [
                'file_name'  => $fileName,
                'file_path'  => Storage::url($filePath)
            ];
        }
        if(!empty($dataImage)){
            $dataUpdate['b_image']      = $dataImage['file_path'];
        }
        $this->blog->find($id)->update($dataUpdate);
        return redirect()->route('Adminblogs.index')->with('success','Cập nhật blogs thành công');
    }
    public function active($id){
        $blogs = Blog::find($id);
        $blogs->status = ! $blogs->status;
        $blogs->save();
        return redirect()->back();
    }
}