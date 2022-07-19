<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\frontend\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showPropertyData = Property::with(['hasOneCountry','haseOneState','hasOneCategory'])->get();
        $propertyMaxPrice = Property::max('price');
        $propertyMinPrice = Property::min('price');

        return view('frontend.property',compact('showPropertyData','propertyMaxPrice','propertyMinPrice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.createProperty');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $addProperty = $request->except('_token','confirmPassword');
        $addProperty['latitude'] = 'latitude';
        $addProperty['longitude'] = 'longitude';
        $addPropertyData = Property::create($addProperty);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editPropertyData = Property::find($id);
        // prx($editPropertyData->toArray());
        return view('frontend.editProperty',compact('editPropertyData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatePropertyData = Property::find($id);
        $updatePropertyData->name = $request->name;
        // $updatePropertyData->category_id = $request->category;
        $updatePropertyData->category_id =3;
        $updatePropertyData->price = $request->price;
        // $updatePropertyData->country_id = $request->country;
        $updatePropertyData->country_id =98;
        // $updatePropertyData->state_id = $request->state;
        $updatePropertyData->state_id =1405;
        $updatePropertyData->address = $request->address;
        $updatePropertyData->latitude ='latitude';
        $updatePropertyData->longitude ='longitude';
        $updatePropertyData->status = $request->status;
        // echo "<pre>";
        // print_r($updatePropertyData);
        // exit();
        $updatePropertyData->update();

        return redirect('/property');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteProprtieData = Property::find($id)->delete();
        return redirect('/property');
    }
}
