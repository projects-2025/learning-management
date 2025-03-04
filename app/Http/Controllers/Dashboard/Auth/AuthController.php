<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('dashboard.home');
    }

    public function login()
    {
        return view('dashboard.pages.auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::guard('admin')->attempt($data)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.home')->with('success', 'تم تسجيل الدخول بنجاح');
        } else {
            return redirect()->route('dashboard.login')->with('error', 'البيانات غير صحيحة');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard.login')->with('success', 'تم تسجيل الخروج بنجاح');
    }
}
