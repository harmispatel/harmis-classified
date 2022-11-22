<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Models
use App\Models\{Propertie, Category, State, Country, User};

use Illuminate\Http\Response;

//Requests Class
use App\Http\Requests\storePropertie;
// Slug
use Illuminate\Support\Str;

class PropertieController extends Controller
{
    /**
     * Display a listing of the Property.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $showPropertiesData = Propertie::with(['hasOneCountry','haseOneState','hasOneCategory'])->orderBy('id','DESC')->paginate(10);
            return view('settings.propertie',compact('showPropertiesData'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Show the form for creating a new Property.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $countryId = Country::get();
            $userId = User::where('role_id', '!=', 10 )->get();

            $categoryId = Category::get();
            return view('settings.createProperties',compact('categoryId', 'countryId', 'userId'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     *
     * Get The State
     * Using Ajax
     *
     */
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
     * Store a newly created Property in storage.
     *
     * @param  \Illuminate\Http\Request $request
     */
    public function store(storePropertie $request)
    {
        $addPropertyData = new Propertie;
        $addPropertyData->name = $request->name;
        $addPropertyData->slug = Str::slug($request->name);
        $addPropertyData->category_id = $request->category_id;
        $addPropertyData->user_id = $request->user_id;
        $addPropertyData->property_type = $request->property_type;
        $addPropertyData->property_condition = $request->property_condition;
        $addPropertyData->floor = $request->floor;
        $addPropertyData->bedroom = $request->bedroom;
        $addPropertyData->kitchen = $request->kitchen;
        $addPropertyData->bath = $request->bath;
        $addPropertyData->garage = $request->garage;
        $addPropertyData->build_year = $request->build_year;
        $addPropertyData->building_area = $request->building_area;
        $addPropertyData->description = $request->description;
        $addPropertyData->price = $request->price;
        $addPropertyData->country_id = $request->country_id;
        $addPropertyData->state_id = $request->state_id;
        $addPropertyData->address = $request->address;
        $addPropertyData->longitude = $request->longitude;
        $addPropertyData->latitude = $request->latitude;
        // $addPropertyData->latitude ='latitude';
        // $addPropertyData->longitude ='longitude';
        $addPropertyData->status = $request->status;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/MainImage'), $filename);
            $addPropertyData['image']= $filename;
        }

        if($request->hasfile('multiImage')) {
            foreach($request->file('multiImage') as $file)
            {
                $multiImage = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path().'/multiImage/', $multiImage);
                $imgData[] = $multiImage;
            }
            $addPropertyData->multiImage = implode(" ,",$imgData);
        }
        $addPropertyData->save();

        return redirect('propertie');
    }

    /**
     * Show the form for editing the Property.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $editPropertiesData = Propertie::find($id);
            $categoryId = Category::get();
            $userId = User::where('role_id', '!=', 10 )->get();
            $country = Country::get();
            $state = State::get();
            return view('settings.editProperties',compact('editPropertiesData', 'categoryId', 'country', 'state', 'userId'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Update the specified Property in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updatePropertyData = Propertie::find($id);
        $updatePropertyData->name = $request->name;
        $updatePropertyData->slug = Str::slug($request->name);
        $updatePropertyData->category_id = $request->category_id;
        $updatePropertyData->user_id = $request->user_id;
        $updatePropertyData->property_type = $request->property_type;
        $updatePropertyData->property_condition = $request->property_condition;
        $updatePropertyData->floor = $request->floor;
        $updatePropertyData->bedroom = $request->bedroom;
        $updatePropertyData->kitchen = $request->kitchen;
        $updatePropertyData->bath = $request->bath;
        $updatePropertyData->garage = $request->garage;
        $updatePropertyData->build_year = $request->build_year;
        $updatePropertyData->building_area = $request->building_area;
        $updatePropertyData->description = $request->description;
        $updatePropertyData->price = $request->price;
        $updatePropertyData->country_id = $request->country_id;
        $updatePropertyData->state_id = $request->state_id;
        $updatePropertyData->address = $request->address;
        $updatePropertyData->longitude = $request->longitude;
        $updatePropertyData->latitude = $request->latitude;
        $updatePropertyData->status = $request->status;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('MainImage'), $filename);
            $updatePropertyData['image']= $filename;
        }

        if($request->hasfile('multiImage')) {
            foreach($request->file('multiImage') as $file)
            {
                $multiImage = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path().'/multiImage/', $multiImage);
                $imgData[] = $multiImage;
            }
            $updatePropertyData->multiImage = implode(" ,",$imgData);
        }
        $updatePropertyData->update();

        return redirect('propertie');
    }

    /**
     * Remove the Property from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deleteProprtieData = Propertie::find($id)->delete();
            return redirect()->route('propertie.index');
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

}
