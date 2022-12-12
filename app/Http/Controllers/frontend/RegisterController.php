<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Models
use App\Models\{User, Role};

// Facades
use Illuminate\Support\Facades\Hash;

// Request Class
use App\Http\Requests\storeRegister;

class RegisterController extends Controller
{

    /**
    * User Register .
    */
    public function index()
    {
        try {
            // Get the Roles Apart from Admin Role
            $roles = Role::where('id', '!=', 1)->get();

            return view('frontend.auth.register', compact('roles'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }
   /**
    * Authenticate the User.
    *
    * @param storeRegister $request
    */
    public function create(storeRegister $request)
    {
        try {
            // Set password and removed unused fields
            $register = $request->except('_token', 'confirmPassword');
            $register['password'] = Hash::make($request->password);

            // Create the User
            User::create($register);

            return view("frontend.auth.login")->with('success', 'User Registered Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong, Please try later!');
        }
    }
}
