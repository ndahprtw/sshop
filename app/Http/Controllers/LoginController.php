<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\SsoController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        // ------------------------------------------------- USER
    
        public function login(Request $request) {
            // dd($request);
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ], [
                'email.required' => 'Kolom Email tidak boleh kosong.',
                'email.email' => 'Masukkan alamat email yang valid.',
                'password.required' => 'Kolom Password tidak boleh kosong.',
            ]);
            
    
    
            if (Auth::attempt($request->only('email','password'))) {
                $user = Auth::user();
            
                if ($user->role === 'user') {
                    return redirect('/');
                } elseif($user->role === 'admin') {
                    return redirect('/dashboard');
                } else {
                    return redirect('/login')->with('error', 'Role tidak Ditemukan !');
                }
            } else {
                return redirect('/login')->with('error', 'Invalid Email and Password! Try Again!');
            }
        }
    
        public function logout(Request $request) {
            // Login lewat SSO: logout juga dari server SSO (sekaligus dari semua aplikasi lain).
            if (Auth::check() && $request->session()->has('sso_access_token')) {
                return app(SsoController::class)->logout($request);
            }

            if (Auth::check()){
                $role = Auth::user()->role;
    
                if ($role === 'user' || $role === 'admin') {
                    Auth::logout();
                }
            } return redirect('/login');
        }
}
