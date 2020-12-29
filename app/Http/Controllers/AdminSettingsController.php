<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddSettingRequest;
use Illuminate\Http\Request;
use App\Setting;
class AdminSettingsController extends Controller
{

    private $setting;
    public function __construct(Setting $setting){
        $this->setting = $setting;
    }
    public function index(){
        $setting = Setting::paginate(5);
        return view('admin.setting.index')->with(compact('setting'));
    }
    public function create(){
        return view('admin.setting.add');
    }
    public function add(AddSettingRequest $request){
        $this->setting->create([
            'key_config'   => $request->key_config,
            'value_config' => $request->value_config
        ]);
        return redirect()->route('settings.index')->with('success','Thêm setting thành công');
    }
    public function edit($id){
        $setting = Setting::find($id);
        return view('admin.setting.edit', compact('setting'));
    }
    public function update(Request $request,$id){
        $this->setting->find($id)->update([
            'key_config'   => $request->key_config,
            'value_config' => $request->value_config
        ]);
        return redirect()->route('settings.index')->with('success','Cập nhật setting thành công');
    }
}
