<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Propertie, Category, State, Country};

use Illuminate\Http\Response;
//Requests Class
use App\Http\Requests\storePropertie;

class PropertieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showPropertiesData = Propertie::with(['hasOneCountry','haseOneState','hasOneCategory'])->get();
        // prx($showPropertiesData);
        return view('settings.propertie',compact('showPropertiesData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $countryId = Country::get();

        $categoryId = Category::get();
        return view('settings.createProperties',compact('categoryId','countryId'));
    }

    public function getState(Request $request)
    {
        $countryId = $request->countryId;
        $states = State::where('country_id',$countryId)->get();

        $html = '';

        foreach($states as $state)
        {
            $html .= '<option value="'.$state->id.'">'.$state->name.'</option>';
        }

        return response()->json([
            'html' => $html
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function store(storePropertie $request)
    {

        // echo "<pre>";
        // print_r($countryName->toArray());exit;
        // $addCategoryData = Propertie::create($request->all());

        $addCategoryData = new Propertie;
        $addCategoryData->name = $request->name;
        $addCategoryData->category_id = $request->category_id;
        $addCategoryData->price = $request->price;
        $addCategoryData->country_id = $request->country_id;
        $addCategoryData->state_id = $request->state_id;
        $addCategoryData->address = $request->address;
        $addCategoryData->latitude ='latitude';
        $addCategoryData->longitude ='longitude';
        $addCategoryData->status = $request->status;
        $addCategoryData->save();

        return redirect('propertie');
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
        $editPropertiesData = Propertie::find($id);
        $categoryId = Category::get();
        $countryId = Country::get();
        $stateId = State::get();
        return view('settings.editProperties',compact('editPropertiesData','categoryId','countryId','stateId'));
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
        $updateCategoryData = Propertie::find($id);
        $updateCategoryData->name = $request->name;
        $updateCategoryData->category_id = $request->category_id;

        $updateCategoryData->price = $request->price;
        $updateCategoryData->country_id = $request->country_id;
        $updateCategoryData->state_id = $request->state_id;
        $updateCategoryData->address = $request->address;
        $updateCategoryData->latitude ='latitude';
        $updateCategoryData->longitude ='longitude';
        $updateCategoryData->status = $request->status;
        // echo "<pre>";
        // print_r($updateCategoryData);
        // exit();
        $updateCategoryData->update();

        return redirect('propertie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteProprtieData = Propertie::find($id)->delete();
        return redirect()->route('propertie.index');
    }
}
