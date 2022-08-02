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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = user::with(['hasOneRole']);
        $rolePermission = PermissionRole::where('role_id',isset($userId->role_id) ? $userId->role_id : '')->get();

        // echo "<pre>";
        // print_r($rolePermition->toArray());
        // exit;
        foreach($rolePermission as $permissionValue)
        {
            $parmissionId = $permissionValue->permission_id;
            $permissionQuery = Permission::where('id',$parmissionId)->first();
            // echo "<pre>";
            // print_r($permissionQuery->toArray());exit;
            // if($permissionQuery->name == 'Add User')
            // {
            //     echo "Hiii";
            // }
            // if($permissionQuery->name == 'Edit User')
            // {
            //     echo "Hello";
            // }
            // if($permissionQuery->name == 'Delete User')
            // {
            //     echo "How are you";
            // }
        }
        // exit;
        // $userId->addRole()->get();

        // $showUserData = User::where('id', '!=', '1')->orderBy('id', 'desc')->get();
        $showUserData = User::where('id', '!=', 1 )->get();
        return view('user_management.user',compact('showUserData','rolePermission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roleIdData = Role::get();
        return view('user_management.createUser',compact('roleIdData'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeUser $request)
    {
        // try {
            $addUserData = new User;
            $addUserData->name = $request->name;
            $addUserData->email=$request->email;
            $addUserData->gender=$request->gender;
            $addUserData->mobile=$request->mobile;

            $addUserData->role_id=$request->role;

            $addUserData->password=bcrypt(request('password')) ;
            $addUserData->status=$request->status;
            // echo "<pre>";
            // print_r($addUserData);
            $addUserData->save();
        // } catch (\Throwable $th) {
        //     return 'The User Cannot be Saved.';
        // }

        return redirect('show_user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roleIdData = Role::get();
        $editUserData = User::find($id);

        return view('user_management.editUser',compact('editUserData','roleIdData'));
    }

    /**
     * Update the specified resource in storage.
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

            $addUserData->save();
        } catch (\Throwable $th) {
            return 'The User Cannot be Saved.';
        }
        return redirect('show_user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteUserData = User::where('id',$id)->delete();
        return redirect ()->route('show_user.index');
    }
}
