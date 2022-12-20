<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Category, User, Role, PermissionRole, Permission, Propertie};
use App\Traits\{imageRemoveTrait};


//Request Class
use App\Http\Requests\storeUser;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use imageRemoveTrait;

    /**
    * Display a listing of the User.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        try {
            $userId = user::with(['hasOneRole']);
            $rolePermission = PermissionRole::where('role_id',isset($userId->role_id) ? $userId->role_id : '')->orderBy('id','DESC')->get();
            foreach($rolePermission as $permissionValue)
            {
                $parmissionId = $permissionValue->permission_id;
                $permissionQuery = Permission::where('id',$parmissionId)->first();

            }
            $showUserData = User::where('id', '!=', 1 )->orderBy('id','DESC')->get();
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
            $roleIdData = Role::where('id', '!=', 1)->get();
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
        try{
            $addUserData = new User;
            $addUserData->name      = $request->name;
            $addUserData->email     = $request->email;
            $addUserData->gender    = $request->gender;
            $addUserData->mobile    = $request->mobile;
            $addUserData->role_id   = $request->role;
            $addUserData->password  = bcrypt(request('password'));
            $addUserData->status    = $request->status;

            if($request->file('image')){
                $file = $request->file('image');
                $multiFile = $this->addSingleImage('userimage',$file, $oldImage = '');
                $addUserData->image = $multiFile;
            }

            $addUserData->save();

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
            $roleIdData = Role::where('id', '!=', 1)->get();
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
            $addUserData->name     = $request->name;
            $addUserData->email    = $request->email;
            $addUserData->gender   = $request->gender;
            $addUserData->mobile   = $request->mobile;
            $addUserData->role_id  = ($request->role == 'Super Admin') ? 1 : $request->role;
            $addUserData->password = ($request->password != '' && !empty($request->password)) ? bcrypt(request('password')) : $addUserData->password;
            $addUserData->status   = $request->status;

            if($request->file('image')){
                // new image move to storage
                $file = $request->file('image');
                $oldImage = $addUserData->image;
                $multiFile = $this->addSingleImage('userimage',$file, $oldImage);
                $addUserData->image = $multiFile;
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
            $user = User::with('properties')->find($id);

            // remove user singel image from storage
            $oldSingleImage = $user->image;
            $this->addSingleImage('userimage',$file = '',$oldSingleImage);

            // remove property singel image from storage
            if (isset($user->properties->image)) {
                $oldpropertyImage = $user->properties->image;
                $this->addSingleImage('multiImage',$file = '',$oldpropertyImage);
            }

             // remove multi image from storage
            if (isset($user->properties->image)) {
                $oldMultiProeprty = $user->properties->multiImage;
                $this->addMultiImage('multiImage', $files = '', $oldMultiProeprty);
            }

            $data = User::find($id);
            if ($data) {
                $data->properties()->delete();
                $data->delete();
            }

            return redirect()->route('show_user.index');
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
    *  shwo admin profile.
    **/
    public function adminprofile()
    {
        try {
            $admindetail = auth()->user();
            return view('auth.adminprofile', compact('admindetail'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }
}
