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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = Category::get();
        // prx($category->toArray());
        // Get the Prices
        $propertyMaxPrice = Propertie::max('price');
        $propertyMinPrice = Propertie::min('price');
        $PropertyMidPrice = Propertie::avg('price');
        $totalRecords     = Propertie::count();

        $property = Propertie::whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMidPrice])
                            ->with(['hasOneCountry','haseOneState','hasOneCategory'])
                            ->paginate(4);

        if($request->ajax()){
            $property = Propertie::whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMidPrice])
                                    ->with(['hasOneCountry','haseOneState','hasOneCategory'])
                                    ->paginate(4);

            $view = view('frontend.data',compact('property'))->render();

            return response()->json(['html'=>$view]);
        }

        $ajaxId = isset($request->ajaxId) ? $request->ajaxId : 0;

        return view('frontend.property', compact(
            'property',
            'propertyMaxPrice',
            'propertyMinPrice',
            'PropertyMidPrice',
            'totalRecords',
            'category'
        ));
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
        return view('frontend.createProperty',compact('categoryId', 'countryId'));
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

    public function store(storePropertie $request)
    {
        $user = auth()->User();
        $userId = $user->id;
        $addPropertyData = new Propertie;
        $addPropertyData->name = $request->name;
        $addPropertyData->category_id = $request->category_id;
        $addPropertyData->user_id = $userId;
        $addPropertyData->property_type = $request->property_type;
        $addPropertyData->property_condition = $request->property_condition;
        $addPropertyData->floor = $request->floor;
        $addPropertyData->price = $request->price;
        $addPropertyData->country_id = $request->country_id;
        $addPropertyData->state_id = $request->state_id;
        $addPropertyData->address = $request->address;
        $addPropertyData->latitude ='latitude';
        $addPropertyData->longitude ='longitude';
        $addPropertyData->status = $request->status;
        $addPropertyData->save();

        return redirect('/');
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
        $updatePropertyData = Propertie::find($id);
        $updatePropertyData->name = $request->name;
        $updatePropertyData->category_id = $request->category;
        $updatePropertyData->price = $request->price;
        $updatePropertyData->country_id = $request->country;
        $updatePropertyData->state_id = $request->state;
        $updatePropertyData->address = $request->address;
        $updatePropertyData->latitude ='latitude';
        $updatePropertyData->longitude ='longitude';
        $updatePropertyData->status = $request->status;
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
        $deleteProprtieData = Propertie::find($id)->delete();
        return redirect('/property');
    }

    /**
     * Filter the Properties.
     *
     */
    public function getpropertybyprice(Request $request)
    {
        // Get Data from the Request
        $proPrice = $request->price;
        $rentSelsPic = $request->rentSelsPrice;
        $page = $request->page;
        $category_id = $request->category;
        $property_condition = $request->propertyCondition;
        $property_floor = $request->propertyFloor;
        $bedroom = $request->bedroom;

        // Set the Avg Price
        $propertyMaxPrice = $request->price;
        $propertyMinPrice = Propertie::min('price');
        $PropertyMidPrice = Propertie::avg('price');

        $total = 0;
        $property = Propertie::query();

        // Property Type Filter
        $property->when(!empty($rentSelsPic), function() use($property, $rentSelsPic, $total) {
            $property->where('property_type', $rentSelsPic);
            $total += $property->where('property_type', $rentSelsPic)->count();
        });

        // Property Filter on Category
        $property->when(!empty($category_id), function() use($property, $category_id, $total) {
            $property->where('category_id', $category_id);
            $total += $property->where('category_id', $category_id)->count();
        });

        // Property Filter on Property Condition
        $property->when(!empty($property_floor), function() use($property, $property_floor, $total) {
            $property->where('floor', $property_floor);
            $total += $property->where('floor', $property_floor)->count();
        });

        // Property Filter on Property Floor
        $property->when(!empty($property_condition), function() use($property, $property_condition, $total) {
            $property->where('property_condition', $property_condition);
            $total += $property->where('property_condition', $property_condition)->count();
        });

        // Property Filter on Bedrooms
        $property->when(!empty($bedroom), function() use($property, $bedroom, $total) {
            if ($bedroom == '5+') {
                $total += $property->where('bedroom', '>=', 5)->count();
                $property->where('bedroom', '>=', 5);
            } else {
                $total += $property->where('bedroom', $bedroom)->count();
                $property->where('bedroom', $bedroom);
            }
        });

        $total += $property->whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMidPrice])->count();

        $property = $property->whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMidPrice])
                            ->limit($request['limit'])
                            ->offset($request['start'])
                            ->get();

        // Set HTML Content

        $html = "";

        foreach($property as $showProperty)
        {
            $html .= '<div class="post-wrap col-lg-6 col-md-6">
                        <div class="post-item card ">
                            <a href="#" class="img-inr">
                                <img src=" '.asset ("image/house1.png").'" class="img-fluid card-img " alt="">
                                <div class="img-pri-abo">
                                    <h3><i class="fa-solid fa-rupee-sign"></i> <strong>. '.$showProperty->price.'</strong></h3>
                                </div>
                                <div class="re-img">
                                    <div class="re-text">
                                        <span>';
                                            if($showProperty["property_type"] == 1)
                                            {
                                                $html .= __('labels.for_rent');
                                            }
                                            else
                                            {
                                                $html .= __('labels.for_sales');
                                            }
                                        $html .='</span>
                                    </div>
                                </div>
                            </a>
                            <div class="card-body jo-card">
                                <div class="jo-card-bor">
                                    <h3 class="card-title mb-1"><a href="#">'.$showProperty->name.'</a></h3>
                                    <p class="post-item-text font-weight-light font-sm">'.$showProperty->hasOneCountry["name"].', '. $showProperty->haseOneState["name"].', '. $showProperty->address.'</p>
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
    }
}
