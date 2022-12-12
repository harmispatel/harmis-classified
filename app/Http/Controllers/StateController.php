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
            $showStateData = State::get();
            return view('settings.state',compact('showStateData'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }
}
