<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Hiện biểu mẫu
    public function showRegister()
    {
        return view('auth.register');
    }

    // Xử lý biểu mẫu khi gửi
    public function submitRegister(Request $request)
    {
        // Xác thực dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|max:15',
            'password' => 'required|min:8|confirmed',
        ]);
        
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return back()->with('success', 'Register successfully!');
    }
}
