<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestLogin;
use Illuminate\Support\Facades\Auth;
class AdminLoginController extends Controller
{
    public function login(){
        return view('admin.login-admin');
    }
    public function postLogin(RequestLogin $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1])) {
            return redirect()->intended('/admin-api');
        }
        return redirect()->back();
    }
    public function logoutAdmin(){
        Auth::logout();
        return redirect()->to('/');
    }
}
