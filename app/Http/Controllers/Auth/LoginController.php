<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view("Auth.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials))
        {
            return redirect('/dashboard');
        } else {
            return redirect("/login");
        }
    }
    
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function adminLogout()
    {
        return redirect('/dashboard');
    }
}
