<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenController extends Controller
{
    public function register()
    {

        return view('auth.register');
    }

    public function handleRegister()
    {

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::query()->create($data);
        Auth::login($user);
        request()->session()->regenerate();
        return redirect()->route('index');
    }
    public function login()
    {

        return view('auth.login');
    }
    public function handleLogin()
    {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            /**
             * @var User $user
             */
            $user = Auth::user();
            if($user->isAdmin()){
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function forgotPassword()
    {
    }

    public function handleForgotPassword()
    {
    }
}
