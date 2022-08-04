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

        return view('frontend.common.layout');
    }

    public function show()
    {
        return view('frontend.auth.login');
    }

    /**
     * Authenticate the User.
     *
     * @param LoginRequest $request
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        // Login the User
        if (Auth::attempt($credentials)) {
            return redirect('/');
        } else {
            return back();
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    public function userLogout()
    {
        return redirect('/');
    }
}
