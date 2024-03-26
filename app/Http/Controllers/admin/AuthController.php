<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function __construct()
    {
    }

    public function index()
    {
        if(Auth::id()!= null){
            return redirect()->route('admin.dashboad.index');
        }

        return view('admin.auth.login');
    }

    public function login(AuthRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        //dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboad.index')->with('success','Đăng nhập thành công');
        }
        return redirect()->route('admin.auth.index')->with('error', 'Email hoặc mật khẩu không đúng');
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('admin.dashboad.index');

    }
}
