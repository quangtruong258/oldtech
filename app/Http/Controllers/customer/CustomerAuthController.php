<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CustomerRegisterRequest;
use App\Http\Requests\CustomerAuthRequest;

use App\Mail\VerifyAccount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;


class CustomerAuthController extends Controller
{
    //

    public function __construct()
    {
    }

    //login
    public function index()
    {
        return view('user.account.login');
    }

    public function check_login(CustomerAuthRequest $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];
        //dd($credentials);

        //$data = $request->only('email', 'password');
        //dd($data);
        $check = auth('cus')->attempt($credentials);
        //dd($check);
        if ($check) {
            // dd((auth('cus')->user()->email_verified_at));
            //dd((auth('cus')->user('email_verified_at'));
            if (auth('cus')->user()->email_verified_at == '') {
                return redirect()->back()->with('error', 'Tài khoản của bạn chưa xác thực, vui lòng kiểm tra lại email');
            }
            return redirect()->route('customer.index')->with('success', 'Đăng nhập thành công');
        }
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không đúng');
    }


    public function register()
    {
        return view('user.account.register');
    }

    public function check_register(CustomerRegisterRequest $req)
    {

        $data = $req->only('name', 'phone', 'address', 'email');
        $data['password'] = Hash::make($req->password);

        if ($customer = Customer::create($data)) {
            Mail::to($customer->email)->send(new VerifyAccount($customer));
            return redirect()->route('customer.account.login')->with('success', 'Tạo tài khoản thành công, mời bạn đăng nhập');
        }

        return redirect()->route('customer.account.register')->with('error', 'Tạo tài khoản thất bại');
    }

    public function verify_account($email)
    {
        $account = Customer::where('email', $email)->whereNull('email_verified_at')->firstOrFail();
        //dd($account);
        Customer::where('email', $email)->update(['email_verified_at' => date('Y-m-d H:i:s')]);
        return redirect()->route('customer.account.login')->with('success', 'Xác thực thành công, giờ bạn có thể đăng nhập');
    }


    public function logout(){
        // Auth::logout();
 
        // $request->session()->invalidate();
     
        // $request->session()->regenerateToken();

        auth('cus')->logout();     
        return redirect()->route('customer.index');
    }


    public function profile(){
        echo 123123;
    }
   
}
