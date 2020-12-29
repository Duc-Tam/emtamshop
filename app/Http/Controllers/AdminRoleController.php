<?php

namespace App\Http\Controllers;
use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
    private $permission;
    private $role;
    public function __construct(Permission $permission,Role $role){
        $this->permission = $permission;
        $this->role = $role;
    }
    public function index(){
        $roles = Role::all();
        return view('admin.role.index',compact('roles'));
    }
    public function create(){
        $permissions = Permission::where('parent_id','0')->get();
        return view('admin.role.add',compact('permissions'));
    }
    public function store(Request $request){
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('roles.index')->with('success','Thêm roles mới thành công');
    }
    public function edit($id){
        $roles = Role::find($id);
        $permission = Permission::where('parent_id','0')->get();
        $permissionCheck = $roles->permissions;
        return view('admin.role.edit',compact('permission','roles','permissionCheck'));
    }
    public function update(Request $request, $id){
        $role = Role::find($id);
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('roles.index')->with('success','Cập nhật roles thành công');
    }
}
