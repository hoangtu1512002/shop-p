<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class AuthorizationController extends Controller
{
    public function loginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.page.dashboard');
        }
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $request->flash();
        $credentials = $request->only('email', 'password');
        $checkUserLogin = User::where('email', $credentials['email'])->first();

        if ($checkUserLogin && $checkUserLogin->is_active === 0) {
            return redirect()->back()->withErrors('Tài khoản của bạn đã bị vô hiệu!');
        }

        if (Auth::attempt($credentials)) {
            session()->flash('success', 'Đăng nhập thành công!');
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withErrors('Email hoặc mật khẩu không chính xác!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
