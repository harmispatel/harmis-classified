<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\frontend\Property;
use App\Models\{Propertie, Country, Category};

//use validation Request Class
use App\Http\Requests\storePropertie;

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
                                ->with(['hasOneCountry','haseOneState','hasOneCategory'])
                                ->paginate(4);

            // if($request->ajax()){

            //     $property = Propertie::whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMidPrice])
            //                             ->with(['hasOneCountry', 'haseOneState', 'hasOneCategory'])
            //                             ->paginate(4);

            //     $view = view('frontend.data',compact('property'))->render();

            //     return response()->json(['html'=>$view]);
            // }
            // $ajaxId = isset($request->ajaxId) ? $request->ajaxId : 0;

            return view('frontend.property', compact(
                'property',
                'propertyMaxPrice',
                'propertyMinPrice',
                'PropertyMidPrice',
                'totalRecords',
                'category'
            ));

        // if($request->ajax())
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
        // echo '<pre>';
        // print_r($request->all());
        // exit;
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
                $file-> move(public_path('MainImage'), $filename);
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
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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

    /**
     * Filter the Properties.
     *
     */
    public function getpropertybyprice(Request $request)
    {
        try {
            // Get Data from the Request.
            $proPrice = $request->price;
            $rentSelsPic = $request->rentSelsPrice;


            $page = $request->page;
            $category_id = $request->category;
            $property_condition = $request->propertyCondition;
            $property_floor = $request->propertyFloor;
            $bedroom = $request->bedroom;
            $search = $request->search;

            // Set the Avg Price.
            $propertyMaxPrice = $request->price;
            $propertyMinPrice = Propertie::min('price');
            $PropertyMidPrice = Propertie::avg('price');

            $total = 0;
            $property = Propertie::query();

            // Property Type Filter.
            $property->when(!empty($rentSelsPic), function() use($property, $rentSelsPic, $total) {
                $property->where('property_type', $rentSelsPic);
                $total += $property->where('property_type', $rentSelsPic)->count();
            });

            // Property Filter on Category.
            $property->when(!empty($category_id), function() use($property, $category_id, $total) {
                $property->where('category_id', $category_id);
                $total += $property->where('category_id', $category_id)->count();
            });

            // Property Filter on Property Condition.
            $property->when(!empty($property_floor), function() use($property, $property_floor, $total) {
                $property->where('floor', $property_floor);
                $total += $property->where('floor', $property_floor)->count();
            });

            // Property Filter on Property Floor.
            $property->when(!empty($property_condition), function() use($property, $property_condition, $total) {
                $property->where('property_condition', $property_condition);
                $total += $property->where('property_condition', $property_condition)->count();
            });

            // Property Filter on Bedrooms.
            $property->when(!empty($bedroom), function() use($property, $bedroom, $total) {
                if ($bedroom == '5+') {
                    $total += $property->where('bedroom', '>=', 5)->count();
                    $property->where('bedroom', '>=', 5);
                } else {
                    $total += $property->where('bedroom', $bedroom)->count();
                    $property->where('bedroom', $bedroom);
                }
            });

            $property->when(!empty($search), function() use($property, $search, $total) {
                $property->where('name', 'LIKE', "%{$search}%");
                $total += $property->where('name', 'LIKE', "%{$search}%")->count();
            });

            $total += $property->whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMidPrice])->count();

            $property = $property->whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMidPrice])
                                ->limit($request['limit'])
                                ->offset($request['start'])
                                ->get();

            // Set HTML Content.

            $html = "";

            foreach($property as $showProperty)
            {
                $url = route('propertyDetails',$showProperty->slug);
                $html .= '<div class="post-wrap col-lg-6 col-md-6">
                            <div class="post-item card ">
                                <a href="'.$url.'" class="img-inr">
                                    <img src="'.asset ("MainImage/$showProperty->image").'" class="img-fluid card-img " alt="">
                                    <div class="img-pri-abo">
                                        <h3><i class="fa-solid fa-rupee-sign"></i> <strong>. '.$showProperty->price.'</strong></h3>
                                    </div>
                                    <div class="re-img">
                                        <div class="re-text">
                                            <span>';
                                                if($showProperty["property_type"] == 1)
                                                {
                                                    $html .= __('For Rent');
                                                }
                                                else
                                                {
                                                    $html .= __('For Sales');
                                                }
                                            $html .='</span>
                                        </div>
                                    </div>
                                </a>
                                <div class="card-body jo-card">
                                    <div class="jo-card-bor">
                                        <h3 class="card-title mb-1"><a href="#">'.$showProperty->name.'</a></h3>
                                        <p class="post-item-text font-weight-light font-sm">'. $showProperty->address.'</p>
                                    </div>
                                </div>
                            </div>
                        </div>';
            }

            if ($request->ajax()) {
                return response()->json([
                    'html' => $html,
                    'records' => count($property),
                    'total' => $total

                ]);
            } else {
                // TODO: Return View Here.
                // return view()
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }
    // List of Property end Map.
    public function propertyList(Request $request)
    {
        try {
            return view("frontend.PropertyList");
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }
    public function propertyDetails(Request $request, $slug)
    {

        $propertyDetails = Propertie::where('slug',$slug)
                        ->with(['hasOneCountry','haseOneState','hasOneCategory', 'hasOneUser'])
                        ->first();
                        // echo '<pre>';
                        // print_r($propertyDetails->hasOneUser['image']);
                        // exit;
        return view('frontend.propertiesDetails', compact('propertyDetails'));
    }
}
