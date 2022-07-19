<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
//Request Class
use App\Http\Requests\StoreRegister;

class RegisterController extends Controller
{
    public function index()
    {
        return redirect()->route('register');
    }
    public function create(storeRegister $request)
    {
        // prx($request->all());
        $register = $request->except('_token','confirmPassword');
        $register['password'] = Hash::make($request->password);
        $register['role_id'] = 9;
        $register['gender'] = 'male';
        // dd($register);
        $addRagisterData = User::create($register);
        return redirect('userloginform');
        // $addRagisterData = new Register;
        // $addRagisterData->name = $request->name;
        // $addRagisterData->mobile = $request->mobile;
        // $addRagisterData->email = $request->email;
        // $addRagisterData->address = $request->address;
        // $addRagisterData->password = Hash::make($request->password);
        // $addRagisterData->status = $request->status;
        // $addRagisterData->save();
    }
}
