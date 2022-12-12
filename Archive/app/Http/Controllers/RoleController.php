<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Request Class
use App\Http\Requests\StoreRole;

// Facades
use Illuminate\Support\Facades\Crypt;

// Models
use App\Models\{Role, Permission, PermissionRole};


class RoleController extends Controller
{
    /**
     * Display a listing of the Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $showRoleData = Role::where('id', '!=', '1')->orderBy('id', 'desc')->get();
            return view('user_management.role',compact('showRoleData'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():Response
    {
        try {
            $permission = Permission::get();
            return response()->view('user_management.createRole',compact('permission'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRole $request)
    {
        try {
            $permissionArray = $request->permission;

            // Save Role
            $roles = $request->only('name', 'status');
            $addRoleData = Role::create($roles);

            // Save Role's Permissions
            $addRoleData->addRole()->attach($permissionArray);

            return redirect('show_role');
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $permission = Permission::pluck('name','id');
            $editRoleData = Role::find($id);
            $permissionId = $editRoleData->addRole()->pluck('permission_id');

            return view('user_management.editRole',compact('editRoleData','permission', 'permissionId'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Update the specified Role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRole $request, $id)
    {
        try {
            $validated = $request->validated();
            $validated = $request->safe()->only(['name']);

            $permissionArray = $request->permission;
            $updateRoleData = Role::find($id);
            $updateRoleData->name = $request->name;
            $updateRoleData->status = $request->status;

            $updateRoleData->addRole()->sync($permissionArray);
            $updateRoleData->update();
            return redirect()->route('show_role.index');
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deleteRoleData = Role::where('id',$id)->delete();
            return redirect()->route('show_role.index');
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }
}
