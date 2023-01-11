<?php

namespace App\Http\Controllers;

use App\Models\amenities;
use Illuminate\Http\Request;

use App\Traits\imageRemoveTrait;

class AmenitiesController extends Controller
{

    use imageRemoveTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amenities = amenities::get();
        return view('amenities.amenities',compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('amenities.createamenities');
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
        $amenities = new amenities;
        if(isset($request->icon)){
            $fileName = $this->addSingleImage('amenities_icon',$request->icon,$old='');
            $amenities->icon = $fileName;
        }

        $amenities->name = $request->name;
        $amenities->save();

        return redirect()->route('amenities.index')->with('success','Amenities Add successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $amenities = amenities::find($id);
        return view('amenities.editamenities',compact('amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $amenities = amenities::find($id);
        if(isset($request->icon)){
            $fileName = $this->addSingleImage('amenities_icon',$request->icon, $amenities->icon);
            $amenities->icon = $fileName;
        }

        $amenities->name = $request->name;
        $amenities->update();

        return redirect()->route('amenities.index')->with('success','Amenities Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\amenities  $amenities
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $amenities = amenities::find($id);

            // remove singel image from storage
            $this->addSingleImage('amenities_icon',$file = '',$amenities->icon);
            $amenities->delete();
            return redirect()->route('amenities.index');
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }
}
