<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the Country.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $showCountryData = Country::get();
            return view('settings.country',compact('showCountryData'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }
}
