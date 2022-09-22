<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function index()
    {
        try {
            return view('frontend.common.layout');
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    public function show()
    {
        try {
            return view('frontend.auth.login');
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Authenticate the User.
     *
     * @param LoginRequest $request
     */
    public function login(LoginRequest $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            // Login the User
            if (Auth::attempt($credentials)) {
                return redirect('/');
            } else {
                return back();
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    public function logout()
    {
        try {
            auth()->logout();
            return redirect('/');
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    public function userLogout()
    {
        try {
            return redirect('/');
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }
}
