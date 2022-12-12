<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleController extends Controller
{
    /**
     * Google Auto Coplite
     */
    public function index()
    {
        return view('googleAutocomplete');
    }
}
