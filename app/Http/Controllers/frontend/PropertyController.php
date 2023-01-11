<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Propertie, Country, Category, State, User};

//use validation Request Class
use App\Http\Requests\storePropertie;
use Illuminate\Support\Str;

// Theme Traits
use App\Traits\{ActiveTheme,imageRemoveTrait};
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redis;

class PropertyController extends Controller
{
    use ActiveTheme,imageRemoveTrait;
    /**
     * Display a listing of the Property.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = '')
    {
        try {
            $property = $this->activeTheme();
            // dd($property['agents']->toArray());

            // if ($property['activeTheme']['id'] == 1) {
            //     return view('frontend.themes.theme_one', compact('property'));
            // }
            // elseif ($property['activeTheme']['id'] == 2) {
            //     return view('frontend.themes.theme_two', compact('property'));
            // }
            // elseif ($property['activeTheme']['id'] == 3) {
            //     return view('frontend.themes.theme_three', compact('property'));
            // }
            // else{
            //     return view('frontend.themes.theme_one', compact('property'));
            // }


            if ($id == 2) {
                return view('frontend.themes.theme_two', compact('property'));
            }
            elseif ($id == 3) {
                return view('frontend.themes.theme_three', compact('property'));
            }
            else{
                return view('frontend.themes.theme_one', compact('property'));
            }



        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Show the form for creating a new Property.
     *
     * @return \Illuminate\Http\Response
     */
    public function agentProperty(Request $request)
    {
        // try {
            $countryId = Country::get();
            $categoryId = Category::get();
            return view('frontend.createProperty',compact('categoryId', 'countryId'));
        // } catch (\Throwable $th) {
        //     return back()->with('error', 'Page Not Found!');
        // }
    }


    /**
     * // Show the form for creating a new Property.
     * Show the All Logedin Agent Property.
     *
     * @return \Illuminate\Http\Response
     */
    public function agentpropertylist(Request $request)
    {
        try {
            $countryId = Country::get();
            $user_id = auth()->user()->id;
            $ajentProprtry = Propertie::with(['hasOneCountry','hasOneState','hasOneCategory'])->where('user_id',$user_id)->orderBy('id','DESC')->paginate(10);

            return view('frontend.agentpropertylist',compact('ajentProprtry', 'countryId'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }


     /**
     *  Show the form for edit a Property.
     *
     * @return \Illuminate\Http\Response
     */
    public function editAgentProperty($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $PropertiesData = Propertie::find($id);
            $categoryId = Category::get();
            $country = Country::get();
            $state = State::get();
            return view('frontend.editagentproperty',compact('PropertiesData', 'categoryId', 'country', 'state'));
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
                $fileName = $this->addSingleImage('multiImage',$request->file('image'),$oldImage = '');
                $addPropertyData['image']= $fileName;
            }

            if($request->hasfile('multiImage')) {
                $multiFile = $this->addMultiImage('multiImage',$request->file('multiImage'), $oldImage = '');
                $addPropertyData->multiImage = $multiFile;
            }

            $addPropertyData->save();

            return redirect()->route('agentpropertylist');
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
        $id = Crypt::decrypt($id);
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
            $updatePropertyData->latitude =  $request->longitude;
            $updatePropertyData->longitude = $request->latitude;
            $updatePropertyData->status = $request->status;
            $updatePropertyData->description = $request->description;
            $updatePropertyData->build_year = $request->build_year;
            $updatePropertyData->building_area = $request->building_area;


            if($request->file('image')){
                $file = $request->image;
                $oldImage = $updatePropertyData->image;
                $fileName = $this->addSingleImage('multiImage',$file,$oldImage);
                $updatePropertyData->image = $fileName;
            }

            if($request->hasfile('multiImage')) {
                $file = $request->multiImage;
                $oldImage = $updatePropertyData->multiImage;
                $multiFile = $this->addMultiImage('multiImage',$file, $oldImage);
                $updatePropertyData->multiImage = $multiFile;
            }

            $updatePropertyData->update();
            return back()->with('success', 'Property update!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong !');
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
        $id = Crypt::decrypt($id);
        $deleteProprtieData = Propertie::find($id)->delete();
        return redirect()->back()->with('error', 'Property delete successfully !');
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

        // $propertyDetails->category_id
        $relatedProperties = Propertie::with(['hasOneCountry','hasOneState','hasOneCategory'])->where('property_type',$propertyDetails->property_type)->where('category_id',$propertyDetails->category_id)->latest()->take(6)->get();

        $activeDetails = $this->activeDetailtheme();
        if ($activeDetails->id == 1) {
            return view('frontend.propertiesDetails', compact('propertyDetails','relatedProperties'));
        }
        elseif ($activeDetails->id == 2) {
            return view('frontend.propertiesDetails_two', compact('propertyDetails','relatedProperties'));
        }
        else{
            return view('frontend.propertiesDetails', compact('propertyDetails','relatedProperties'));
        }
    }

    /**
    * Show the property for theme two.
    *
    * @param  string  $slug
    * @return \Illuminate\Http\Response
    */
    public function mappropertytwo(Request $request)
    {
        $property = $this->activeTheme();


        // $allproperty = array_merge($property['resentPropertys'], $property['themeTwoRent'], $property['themeTwoSale']);
        $allproperty = array_merge($property['resentPropertys']->toArray(),$property['themeTwoRent']->toArray(), $property['themeTwoSale']->toArray());
        $propertyDetails = array_unique($allproperty, SORT_REGULAR);
        // dd($propertyDetails);

        return response()->json([
            'propertyList' => $propertyDetails
        ]);
    }


    /**
    * Show Agent details.
    *
    * @param  string  $id
    * @return \Illuminate\Http\Response
    */
    public function agentdetail($id)
    {
        $id = Crypt::decrypt($id);
        $agent = User::with('properties')->where('id',$id)->first();
        return view('frontend.agentdetails',compact('agent'));
    }

    public function allagent()
    {
        $agents = User::where('role_id', 9)->latest()->get();
        return view('frontend.allagent',compact('agents'));
    }
}
