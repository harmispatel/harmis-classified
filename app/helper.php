<?php

use App\Models\{Permission, Country, State, User};
// use App\Models\Country;


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

function getCountryName($id)
{
    $countryName = Country::where('id', $id)->first();
    return $countryName;
}
function getStateName($id,$countryId)
{
    $stateName = State::where('id', $id)->where('country_id',$countryId)->first();
    return $stateName;
}
function getCountryOnState($id)
{
    $countryOnState = State::where('country_id',$id)->get();
    return $countryOnState;
}
function getUserName($id)
{
    $getUserId = User::where('id',$id)->first();
    return $getUserId;
}
