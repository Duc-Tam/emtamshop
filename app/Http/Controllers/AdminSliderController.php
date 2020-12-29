<?php

namespace App\Http\Controllers;
use App\Slider;
use Storage;
use Illuminate\Http\Request;
use App\Http\Requests\AddSliderRequest;
class AdminSliderController extends Controller
{
    private $slider;
    public function __construct(Slider $slider){
        $this->slider = $slider;
    }
    public function index(){
        $slider = Slider::paginate(2);
        return view('admin.slider.index')->with(compact('slider'));
    }
    public function create(){
        return view('admin.slider.add');
    }
    public function add(AddSliderRequest $request){
        $dataCreate = [
            'name'          => $request->name,
            'description'   => $request->description,
        ];
        if($request->hasFile('image')){
            $file     = $request->image;
            $fileName = $file->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('public/slider',$fileName);
            $dataImage = [
                'file_name'  => $fileName,
                'file_path'  => Storage::url($filePath)
            ];
        }
        if(!empty($dataImage)){
            $dataCreate['images_name']      = $dataImage['file_name'];
            $dataCreate['images_path']      = $dataImage['file_path'];
        }
        $this->slider->create($dataCreate);
        return redirect()->route('slider.index')->with('success','Thêm slider thành công');
    }
    public function edit($id)
    {
        $slider    = $this->slider->find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request,$id){
        $dataUpdate = [
            'name'          => $request->name,
            'description'   => $request->description,
        ];
        if($request->hasFile('image')){
            $file     = $request->image;
            $fileName = $file->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('public/slider',$fileName);
            $dataImage = [
                'file_name'  => $fileName,
                'file_path'  => Storage::url($filePath)
            ];
        }
        if(!empty($dataImage)){
            $dataUpdate['images_name']      = $dataImage['file_name'];
            $dataUpdate['images_path']      = $dataImage['file_path'];
        }
        $this->slider->find($id)->update($dataUpdate);
        return redirect()->route('slider.index')->with('success','Cập nhật slider thành công');
    }

    public function active($id){
        $slider = Slider::find($id);
        $slider->status = ! $slider->status;
        $slider->save();
        return redirect()->back();
    }
    public function delete($id){
        $slider = Slider::find($id);
        if($slider){
            $slider->delete();
        }
        return redirect()->back()->with('success','Xóa slide thành công');
    }
}
