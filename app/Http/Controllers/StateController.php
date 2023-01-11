<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

class StateController extends Controller
{
    /**
     * Display a listing of the State.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $totalstate = State::with('hasOneCountry')->count();
            $showStateData = State::with('hasOneCountry')->paginate(50);
            return view('settings.state',compact('showStateData','totalstate'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }
}
