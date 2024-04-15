<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterForadminController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.registeradmin');
    }

    public function registeradmin(Request $request)
    {
        // Validate input và tạo người dùng mới

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'admin', 
        ]);

        // Lưu vai trò vào session
        Session::put('role', 'admin');
        Session::put('user_id', $user->id);

        return redirect()->route('login');
    }
}