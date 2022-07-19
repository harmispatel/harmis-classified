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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showRoleData = Role::where('id', '!=', '1')->orderBy('id', 'desc')->get();
        return view('user_management.role',compact('showRoleData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():Response
    {
        $permission = Permission::get();
        return response()->view('user_management.createRole',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRole $request)
    {
        // $validated = $request->validated();
        // $validated = $request->safe()->only(['name']);

        $permissionArray = $request->permission;

        // Save Role
        $roles = $request->only('name', 'status');
        $addRoleData = Role::create($roles);

        // Save Role's Permissions
        $addRoleData->addRole()->attach($permissionArray);

        return redirect('show_role');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::pluck('name','id');
        $editRoleData = Role::find($id);
        $permissionId = $editRoleData->addRole()->pluck('permission_id');

        return view('user_management.editRole',compact('editRoleData','permission', 'permissionId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRole $request, $id)
    {
        $validated = $request->validated();
        $validated = $request->safe()->only(['name']);

        $permissionArray = $request->permission;
        // echo "<pre>";
        // print_r($permissionArray);exit;
        // Update Role
        $updateRoleData = Role::find($id);
        $updateRoleData->name = $request->name;
        $updateRoleData->status = $request->status;

        $updateRoleData->addRole()->sync($permissionArray);
        $updateRoleData->update();
        //$message->Users()->attach($newIds);
        return redirect()->route('show_role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteRoleData = Role::where('id',$id)->delete();

        return redirect()->route('show_role.index');
    }
}
