<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('pages.index'); // Chuyển hướng về trang index sau khi logout
    }
    // Hiện biểu mẫu đăng nhập
    public function showLogin()
    {
        return view('auth.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Xác thực thông tin đăng nhập
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Lấy thông tin người dùng
            $user = Auth::user();

            // Kiểm tra usertype và chuyển hướng dựa trên vai trò
            if ($user->usertype === 'user') {
                return redirect()->route('pages.home'); // Chuyển đến trang home của user
            } elseif ($user->usertype === 'admin') {
                return redirect()->route('admin.adminHome'); // Chuyển đến trang adminHome
            }

            // Chuyển đến trang dashboard nếu không xác định được vai trò
            return redirect()->intended('dashboard');
        }

        // Trả về lỗi nếu đăng nhập không thành công
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }
}
