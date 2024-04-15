<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate input và tạo người dùng mới

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user', // Gán giá trị 'user' cho trường role
        ]);

        // Lưu vai trò vào session
        Session::put('role', 'user');
        Session::put('user_id', $user->id);

        // Code để xử lý sau khi đăng ký

        return redirect()->route('login');
    }
}