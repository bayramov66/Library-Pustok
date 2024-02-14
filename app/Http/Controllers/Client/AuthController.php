<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        if (!$user) {
            return abort(404);
        }

        return view("account", compact('user'));
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('login');
    }

    public function registerPost(RegisterRequest $request)
    {

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if ($user) {
            return redirect()->route('client.account')->with('success', 'Registration successful. Please log in.');
        }
    }

    public function loginPost(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->route('client.index');
        }

        return back()->with('error', 'Email or password is incorrect.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('client.index');
    }

    public function resetpassword()
    {
        return view('resetpassword');
    }

    public function resetPasswordPost(ResetPasswordRequest $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('client.resetpassword')->with('success', 'Your password has been reset.');
        }

        return back()->withErrors(['email' => 'Email not found.']);
    }
}