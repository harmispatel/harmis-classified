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

// Trait
use App\Traits\imageRemoveTrait;

class RegisterController extends Controller
{

    use imageRemoveTrait;

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

            if($request->file('image')){
                $file = $request->file('image');
                $image = $this->addSingleImage('userimage',$file, $oldImage = '');
                $register['image'] = $image;
            }

            // Create the User
            User::create($register);

            return view("frontend.auth.login")->with('success', 'User Registered Successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong, Please try later!');
        }
    }
}
