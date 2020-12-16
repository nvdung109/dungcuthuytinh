<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    // use AuthenticatesUsers;
    // protected $redirectTo = '/home';
    public function login(){
    	if (Auth::check()) {
            // nếu đăng nhập thàng công thì 
            return redirect(route('admin.index'));
        } else {
            return view('admin.login');
        }
    }
    public function postLogin(LoginRequest $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
            'active' => 1,
        ];

        // $password = bcrypt($request->password);
        // dd(bcrypt('123456'));
        //attempt sẽ chỉ xét duyệt nếu mật khẩu đã đc mã hóa
        if (Auth::attempt($login)) {
            // Authentication passed...
            return redirect()->intended('/admin');
        }
        return Redirect::to("admin/login")->with('status', 'Email hoặc Password không chính xác');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    
}
