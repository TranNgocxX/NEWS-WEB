<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerSave(Request $request)
    {
        // Validate dữ liệu nhập vào
        Validator::make($request->all(), [
            'TenDangNhap' => 'required|string|max:50|unique:users,TenDangNhap',
            'Email' => 'required|email|unique:users,Email|max:100',
            'MatKhau' => 'required|confirmed|min:6',
            'VaiTro' => 'required|string|max:20', // Vai trò phải nhập
        ])->validate();
    
        // Tạo người dùng mới (lưu mật khẩu như chuỗi văn bản thuần túy)
        User::create([
            'TenDangNhap' => $request->TenDangNhap,
            'Email' => $request->Email,
            'MatKhau' => $request->MatKhau,  // Lưu mật khẩu như chuỗi thuần túy
            'VaiTro' => $request->VaiTro,  // Vai trò người dùng
            'Diemtichluy' => 0,  // Mặc định điểm tích lũy là 0
        ]);
    
        // Chuyển hướng đến trang đăng nhập sau khi đăng ký thành công
        return redirect()->route('login');
    }
    

    public function login()
    {
        return view('auth/login');
    }

    public function loginAction(Request $request)
    {
        // Validate dữ liệu nhập vào
        $validated = Validator::make($request->all(), [
            'Email' => 'required|email',
            'MatKhau' => 'required',
        ])->validate();
    
        // Tìm người dùng theo email và so sánh mật khẩu
        $user = \App\Models\User::where('Email', $request->Email)->first();
    
        if ($user && $user->MatKhau === $request->MatKhau) {
            // Nếu mật khẩu đúng, đăng nhập thành công
            Auth::login($user, $request->boolean('remember'));
    
            // Regenerate session để bảo mật
            $request->session()->regenerate();
    
            // Chuyển hướng đến trang dashboard sau khi đăng nhập thành công
            return redirect()->route('dashboard');
        }
    
        // Nếu mật khẩu không đúng
        throw ValidationException::withMessages([
            'Email' => trans('auth.failed'),
        ]);
    }    

    public function logout(Request $request)
    {
        // Thực hiện đăng xuất
        Auth::guard('web')->logout();

        // Hủy session
        $request->session()->invalidate();

        // Chuyển hướng về trang chủ
        return redirect('/');
    }

    public function profile()
    {
        return view('profile');
    }
}
