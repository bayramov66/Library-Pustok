<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        $user = auth()->user();

        return view('admin.dashboard', compact('user'));
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('authadmin.login');
    }
}
