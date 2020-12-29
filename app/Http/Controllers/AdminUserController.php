<?php

namespace App\Http\Controllers;
use App\Role;
use App\User;
use DB;
use Log;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RequestRegister;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    private $user;
    public function __construct(User $user){
        $this->user = $user;
    }
    public function index(){
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }
    public function create(){
        $roles = Role::all();
        return view('admin.user.add',compact('roles'));
    }
    public function store(Request $request){
        try{
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'is_admin' => '1'  
            ]);
            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('users.index')->with('success','Thêm user thành công');
        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('message:'.$exception->getMessage(). 'Line:'.$exception->getLine());
        }
    }
    public function edit($id){
        $roles = Role::all();
        $user = User::find($id);
        $roleUser = $user->roles;
        return view('admin.user.edit',compact('roles','user','roleUser'));
    }
    public function update(Request $request, $id){
        try{
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone
                
            ]);
            $user = $this->user->find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('users.index')->with('success','Cập nhật user thành công');
        } catch(\Exception $exception){
            DB::rollBack();
            Log::error('message:'.$exception->getMessage(). 'Line:'.$exception->getLine());
        }
    }
}
