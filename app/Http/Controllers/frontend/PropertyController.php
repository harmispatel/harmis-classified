<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Propertie, Country, Category, State};

//use validation Request Class
use App\Http\Requests\storePropertie;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    /**
     * Display a listing of the Property.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
        $category = Category::get();
            $propertyMaxPrice = Propertie::max('price');
            $propertyMinPrice = Propertie::min('price');
            $PropertyMidPrice = Propertie::avg('price');
            $totalRecords     = Propertie::count();

            $property = Propertie::whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMidPrice])
                                ->with(['hasOneCountry','hasOneState','hasOneCategory'])
                                ->paginate(6);

            return view('frontend.property', compact(
                'property',
                'propertyMaxPrice',
                'propertyMinPrice',
                'PropertyMidPrice',
                'totalRecords',
                'category'
            ));

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
            $categoryId = Category::get();
            return view('frontend.createProperty',compact('categoryId', 'countryId'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    // Get State.
    public function getState(Request $request)
    {
        try {
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
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    // Store Property.
    public function store(storePropertie $request)
    {
        try {
            $user = auth()->User();
            $userId = $user->id;
            $addPropertyData = new Propertie;
            $addPropertyData->name = $request->name;
            $addPropertyData->slug = Str::slug($request->name);
            $addPropertyData->category_id = $request->category_id;
            $addPropertyData->user_id = $userId;
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
            $addPropertyData->status = $request->status;

            if($request->file('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('multiImage'), $filename);
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

            return redirect('/');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editPropertyData = Propertie::find($id);
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
        try {
            $updatePropertyData = Propertie::find($id);
            $updatePropertyData->name = $request->name;
            $updatePropertyData->category_id = $request->category;
            $updatePropertyData->price = $request->price;
            $updatePropertyData->country_id = $request->country;
            $updatePropertyData->state_id = $request->state;
            $updatePropertyData->address = $request->address;
            $updatePropertyData->floor = $request->floor;
            $updatePropertyData->bedroom = $request->bedroom;
            $updatePropertyData->kitchen = $request->kitchen;
            $updatePropertyData->bath = $request->bath;
            $updatePropertyData->garage = $request->garage;
            $updatePropertyData->latitude ='latitude';
            $updatePropertyData->longitude ='longitude';
            $updatePropertyData->status = $request->status;

            if($request->file('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('multiImage'), $filename);
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

            return redirect('/property');
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
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
        return redirect('/property');
    }
    
    // List of Property end Map.
    public function propertyList()
    {
        try {
            return view("frontend.PropertyList");
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
    * Show the property details.
    *
    * @param  string  $slug
    * @return \Illuminate\Http\Response
    */
    public function propertyDetails($slug)
    {
        $propertyDetails = Propertie::where('slug',$slug)
                        ->with(['hasOneCountry','hasOneState','hasOneCategory', 'hasOneUser'])
                        ->first();                        
        return view('frontend.propertiesDetails', compact('propertyDetails'));
    }
}
