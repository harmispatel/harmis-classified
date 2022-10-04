<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Role, PermissionRole, Permission};


//Request Class
use App\Http\Requests\storeUser;
use Illuminate\Http\Response;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $userId = user::with(['hasOneRole']);
            $rolePermission = PermissionRole::where('role_id',isset($userId->role_id) ? $userId->role_id : '')->get();
            foreach($rolePermission as $permissionValue)
            {
                $parmissionId = $permissionValue->permission_id;
                $permissionQuery = Permission::where('id',$parmissionId)->first();

            }
            $showUserData = User::where('id', '!=', 1 )->get();
            return view('user_management.user',compact('showUserData','rolePermission'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Show the form for creating a new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $roleIdData = Role::get();
            return view('user_management.createUser',compact('roleIdData'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUser $request)
    {

        $addUserData = new User;
        $addUserData->name = $request->name;
        $addUserData->email=$request->email;
        $addUserData->gender=$request->gender;
        $addUserData->mobile=$request->mobile;
        $addUserData->role_id=$request->role;
        $addUserData->password=bcrypt(request('password')) ;
        $addUserData->status=$request->status;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/UserImage'), $filename);
            $addUserData['image']= $filename;
        }

        $addUserData->save();
        try {
        } catch (\Throwable $th) {
            return 'The User Cannot be Saved.';
        }

        return redirect('show_user');
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $roleIdData = Role::get();
            $editUserData = User::find($id);

            return view('user_management.editUser',compact('editUserData','roleIdData'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Update the specified User in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $addUserData = User::find($id);
            $addUserData->name = $request->name;
            $addUserData->email=$request->email;
            $addUserData->gender=$request->gender;
            $addUserData->mobile=$request->mobile;
            $addUserData->role_id=$request->role;
            $addUserData->password=bcrypt(request('password'));
            $addUserData->status=$request->status;

            if($request->file('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('/UserImage'), $filename);
                $addUserData['image']= $filename;
            }

            $addUserData->save();
        } catch (\Throwable $th) {
            return 'The User Cannot be Saved.';
        }
        return redirect('show_user');
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deleteUserData = User::where('id',$id)->delete();
            return redirect ()->route('show_user.index');
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }
}
