<?php

namespace App\Http\Controllers;
use App\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    private $permission;
    public function __construct(Permission $permission){
        $this->permission = $permission;
    }
    public function create(){
        $permissions = Permission::where('parent_id','0')->get();
        // dd($permission);
        return view('admin.permission.add',compact('permissions'));
    }
    public function store(Request $request){
        $permission = $this->permission->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'parent_id' => $request->parent_id,
            'key_code' => $request->key_code  
        ]);
        return redirect()->back()->with('success','Thêm user thành công');
    }
}
