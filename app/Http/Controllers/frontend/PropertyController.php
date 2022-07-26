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
    public function index(Request $request)
    {
        // print_r($request->toArray());
        $propertyMaxPrice = Property::max('price');
        $propertyMinPrice = Property::min('price');
        $PropertyMidPrice = Property::avg('price');

            $property = Property::whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMidPrice]);

            $property = Property::with(['hasOneCountry','haseOneState','hasOneCategory'])->paginate(4);
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
        // echo "<pre>";
        // print_r($request);exit;
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

    public function getpropertybyprice(Request $request)
    {
        $propertyMaxPrice = $request->price;
        $propertyMinPrice = Property::min('price');
        // prx($propertyMinPrice);
        $PropertyMidPrice = Property::avg('price');
        $property = Property::whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMidPrice])->get();
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
