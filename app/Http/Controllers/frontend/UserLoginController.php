<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;


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
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);

        // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials))
        {
            // echo "you are login";exit;
            return redirect('/');
        } else {
            // echo "you are not login";exit;
            return redirect('/register');
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/userloginform');
    }
}
