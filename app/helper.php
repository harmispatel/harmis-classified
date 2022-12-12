<?php

use App\Models\{Permission, Country, State, User, Language};
// use App\Models\Country;

/**
 * Get User Permission Value by User Permission Id
 */
function getPermissionValue($userPermission)
{
    // echo $userPermission;exit;
    $permissionQuery = Permission::where('id',$userPermission)->first();
    return $permissionQuery;
}

/**
 * Get country name by id
 */
function getCountryName($id)
{
    $countryName = Country::where('id', $id)->first();
    return $countryName;
}

/**
 * Get state name by country id and state id
 */
function getStateName($id,$countryId)
{
    $stateName = State::where('id', $id)->where('country_id',$countryId)->first();
    return $stateName;
}

/**
 * Get All State by Country Id
 */
function getCountryOnState($id)
{
    $countryOnState = State::where('country_id',$id)->get();
    return $countryOnState;
}

/**
 * Get User Name By Id
 */
function getUserName($id)
{
    $getUserId = User::where('id',$id)->first();
    return $getUserId;
}

/**
 * Get Language
 */
function getLang()
{
    $languageValue = Language::select('id', 'name', 'code')->where('status',1)->get();
    return $languageValue;
}
