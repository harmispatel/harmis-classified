<?php

use App\Models\Permission;

function getPermissionValue($userPermission)
{
    // echo $userPermission;exit;
    $permissionQuery = Permission::where('id',$userPermission)->first();
    return $permissionQuery;
    // echo "<pre>";
    // print_r($permissionQuery->toArray());
}

function prx($val)
{
    echo "<pre>";
    print_r($val);
    exit();
}
