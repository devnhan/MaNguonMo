<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            session(['user_id' => Auth::id()]); // Lưu user_id vào session
            // Đăng nhập thành công
            Session::flash('success', 'Đăng nhập thành công!');
            return redirect()->route('job.index');
        } else {
            // Đăng nhập thất bại
            return redirect()->back()->withErrors(['message' => 'Email hoặc mật khẩu không đúng']);
        }
    }
}