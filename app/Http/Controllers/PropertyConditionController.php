<?php

namespace App\Http\Controllers;

use App\Models\PropertyCondition;
use Illuminate\Http\Request;


class PropertyConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procondition = PropertyCondition::get();
        return view('procondition.procondition',compact('procondition'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('procondition.createprocondition');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo '<pre>';
        // print_r($request->all());
        // exit();
        
        $procondition = PropertyCondition::create($request->all());
        return redirect()->route('propertycondition.index')->with('success','propertycondition Add successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\propertycondition  $procondition
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $procondition = PropertyCondition::find($id);
        return view('procondition.editprocondition',compact('procondition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\propertycondition  $procondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $procondition = PropertyCondition::find($id);
        $procondition->name = $request->name;
        $procondition->update();

        return redirect()->route('propertycondition.index')->with('success','propertycondition Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PropertyCondition  $procondition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $procondition = PropertyCondition::find($id)->delete();
            return redirect()->route('propertycondition.index');
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }
}

