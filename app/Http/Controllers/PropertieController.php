<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Propertie, Category, State, Country, User};

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
        $userId = User::where('role_id', '!=', 10 )->get();

        $categoryId = Category::get();
        return view('settings.createProperties',compact('categoryId', 'countryId', 'userId'));
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

        $addPropertyData = new Propertie;
        $addPropertyData->name = $request->name;
        $addPropertyData->category_id = $request->category_id;
        $addPropertyData->user_id = $request->user_id;
        $addPropertyData->price = $request->price;
        $addPropertyData->country_id = $request->country_id;
        $addPropertyData->state_id = $request->state_id;
        $addPropertyData->address = $request->address;
        $addPropertyData->latitude ='latitude';
        $addPropertyData->longitude ='longitude';
        $addPropertyData->status = $request->status;
        $addPropertyData->save();

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
        $userId = User::where('role_id', '!=', 10 )->get();
        $country = Country::get();
        $state = State::get();
        return view('settings.editProperties',compact('editPropertiesData', 'categoryId', 'country', 'state', 'userId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storePropertie $request, $id)
    {
        $updatePropertyData = Propertie::find($id);
        $updatePropertyData->name = $request->name;
        $updatePropertyData->category_id = $request->category_id;
        $updatePropertyData->user_id = $request->category_id;

        $updatePropertyData->price = $request->price;
        $updatePropertyData->country_id = $request->country_id;
        $updatePropertyData->state_id = $request->state_id;
        $updatePropertyData->address = $request->address;
        $updatePropertyData->latitude ='latitude';
        $updatePropertyData->longitude ='longitude';
        $updatePropertyData->status = $request->status;

        $updatePropertyData->update();

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
