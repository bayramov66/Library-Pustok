<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLoginForm(Request $request)
    {
        return view('admin.user.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['user_status'] = 1;

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard.index');
        }

        return redirect()->route('authadmin.login')->withErrors(['loginError' => 'Incorrect login credentials']);
    }

}
