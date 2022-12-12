<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

     /**
     * Remove the specified Language.
     *
     * @param  int  $id
     * @return view Admin Login
     */
    public function index()
    {
        return view("auth.login");
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $user = $request->only('email', 'password');
        $user['role_id'] = 1;
        $credentials = $user;

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        } else {
            return redirect("/login");
        }
    }

    /**
     * Store a newly created Category in storage.
     *
     * @return \Illuminate\Http\Response
     */
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
