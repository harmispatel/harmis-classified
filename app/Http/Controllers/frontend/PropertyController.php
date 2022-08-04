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
        // print_r($request->toArray());
        $propertyMaxPrice = Propertie::max('price');
        $propertyMinPrice = Propertie::min('price');
        $PropertyMidPrice = Propertie::avg('price');

            $property = Propertie::whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMidPrice]);

            $property = Propertie::with(['hasOneCountry','haseOneState','hasOneCategory'])->get();
            // prx($request->ajax());
            if($request->ajax()){
                $view = view('frontend.data',compact('property'))->render();
                return response()->json(['html'=>$view]);
            }
        // echo "<pre>";
        // print_r($property->toArray());exit;
        $ajaxId = isset($request->ajaxId) ? $request->ajaxId : 0;


            return view('frontend.property',compact('property','propertyMaxPrice','propertyMinPrice','PropertyMidPrice'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $countryId = Country::get();
        // $userId = User::where('role_id', '!=', 10 )->get();

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $addProperty = $request->except('_token','confirmPassword');
    //     // echo "<pre>";
    //     // print_r($request);exit;
    //     $addProperty['latitude'] = 'latitude';
    //     $addProperty['longitude'] = 'longitude';
    //     $addPropertyData = Propertie::create($addProperty);
    // }

    public function store(storePropertie $request)
    {

        // echo "<pre>";
        // print_r($countryName->toArray());exit;
        // $addCategoryData = Propertie::create($request->all());
        $user = auth()->User();
        $userId = $user->id;
        // prx($userId);
        $addPropertyData = new Propertie;
        $addPropertyData->name = $request->name;
        $addPropertyData->category_id = $request->category_id;
        $addPropertyData->user_id = $userId;
        $addPropertyData->price = $request->price;
        $addPropertyData->country_id = $request->country_id;
        $addPropertyData->state_id = 1;
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
        $editPropertyData = Propertie::find($id);
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
        $updatePropertyData = Propertie::find($id);
        $updatePropertyData->name = $request->name;
        $updatePropertyData->category_id = $request->category;
        // $updatePropertyData->category_id =3;
        $updatePropertyData->price = $request->price;
        $updatePropertyData->country_id = $request->country;
        // $updatePropertyData->country_id =98;
        $updatePropertyData->state_id = $request->state;
        // $updatePropertyData->state_id =1405;
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
        $deleteProprtieData = Propertie::find($id)->delete();
        return redirect('/property');
    }

    public function getpropertybyprice(Request $request)
    {
        $propertyMaxPrice = $request->price;
        $propertyMinPrice = Propertie::min('price');
        // prx($propertyMinPrice);
        $PropertyMidPrice = Propertie::avg('price');
        $property = Propertie::whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMidPrice])->get();
// prx($property);

        $html = "";
            foreach($property as $showProperty)
            {
                $html .= ' <div class="post-wrap col-lg-6 col-md-6">
                            <div class="post-item card ">
                                <a href="#" class="img-inr">
                                    <img src=" '.asset ("image/house1.png").'" class="img-fluid card-img " alt="">
                                    <div class="img-pri-abo">
                                        <h3><i class="fa-solid fa-rupee-sign"></i> <strong>. '.$showProperty->price.'</strong></h3>
                                    </div>
                                    <div class="re-img">
                                        <div class="re-text">
                                            <span>';
                                                if($showProperty["status"] == 0)
                                                {
                                                    $html .='Inactive';
                                                }
                                                else
                                                {
                                                    $html .='Active';
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


            return response()->json([
                'html' => $html
            ]);

    }

    public function infiniteScroll(Request $request)
    {

        print_r($request->all());
    }
}
