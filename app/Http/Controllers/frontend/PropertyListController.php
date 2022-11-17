<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Propertie, Category};

class PropertyListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $totalRecords = Propertie::count();
        // $proDataList = Propertie::get();
        $category = Category::get();
            $propertyMaxPrice = Propertie::max('price');
            $propertyMinPrice = Propertie::min('price');
            $PropertyMidPrice = Propertie::avg('price');
            $totalRecords     = Propertie::count();

// For Scroll:

        return view('frontend.propertyList', compact(
            'totalRecords',
            // 'proDataList',
            'category',
            'propertyMaxPrice',
            'propertyMinPrice',
            'PropertyMidPrice',
        ));

// For Scroll:
    }

    // Store Property.
    public function store(Request $request)
    {
       //
    }

    public function listScroll(Request $request)
    {

        $category = Category::get();
            $propertyMaxPrice = Propertie::max('price');
            $propertyMinPrice = Propertie::min('price');
            // $PropertyMidPrice = Propertie::avg('price');
            $totalRecords     = Propertie::count();

        // Get Data from the Request.
        $proPrice = $request->price;

        $rentSelsPrice = $request->rentSelsPrice;
        $page = $request->page;
        $category_id = $request->category;
        $property_condition = $request->propertyCondition;
        $property_floor = $request->propertyFloor;
        $bedroom = $request->propertyBedRoom;
        $search = $request->search;




        $page = $request->page;
        $limit = 4;
        $start = ($request->start);



        $total = 0;
        $listOfProperty = Propertie::query();


        // Property on Rent Sels Filter.
        $listOfProperty->when(!empty($rentSelsPrice), function() use($listOfProperty, $rentSelsPrice, $total) {
            $listOfProperty->where('property_type', $rentSelsPrice);
            $total += $listOfProperty->where('property_type', $rentSelsPrice)->count();
        });

        // Property Category on Filter.
        $listOfProperty->when(!empty($category_id), function() use($listOfProperty, $category_id, $total) {
            $listOfProperty->whereIn('category_id', $category_id);
            $total += $listOfProperty->whereIn('category_id', $category_id)->count();
        });

        // Property Filter on Property Floor.
        $listOfProperty->when(!empty($property_condition), function() use($listOfProperty, $property_condition, $total) {
            $listOfProperty->whereIn('property_condition', $property_condition);
            $total += $listOfProperty->whereIn('property_condition', $property_condition)->count();
        });

        // Property Filter on Property Condition.
        $listOfProperty->when(!empty($property_floor), function() use($listOfProperty, $property_floor, $total) {
            $listOfProperty->whereIn('floor', $property_floor);
            $total += $listOfProperty->whereIn('floor', $property_floor)->count();
        });

        // Property Filter on Bedrooms.
        $listOfProperty->when(!empty($bedroom), function() use($listOfProperty, $bedroom, $total) {
            if (in_array('5+', $bedroom)) {
                $total += $listOfProperty->where('bedroom', '>=', 5)->orWhereIn('bedroom', $bedroom)->count();
                $listOfProperty->where('bedroom', '>=', 5)->orWhereIn('bedroom', $bedroom);
            } else {
                $total += $listOfProperty->whereIn('bedroom', $bedroom)->count();
                $listOfProperty->whereIn('bedroom', $bedroom);
            }
        });

        $listOfProperty->when(!empty($search), function() use($listOfProperty, $search, $total) {
            $listOfProperty->where('name', 'LIKE', "%{$search}%");
            $total += $listOfProperty->where('name', 'LIKE', "%{$search}%")->count();
        });

        $start = ($request->start);

        $total += $listOfProperty->whereBetween('price', [$propertyMinPrice, $proPrice])->count();

        $listOfProperty = $listOfProperty->whereBetween('price', [$propertyMinPrice, $proPrice])
                            ->limit($request['limit'])
                            ->offset($request['start'])
                            ->get();



// Rent Sels Price Filter:
        // if($rentSelsPic == 0) {
        //     $total = Propertie::with('hasOneCountry','haseOneState','hasOneCategory')->count();

        //     $listOfProperty = Propertie::with('hasOneCountry','haseOneState','hasOneCategory')
        //     ->limit($limit)
        //     ->offset($start)
        //     ->get();
        // } else {
        //     $total = Propertie::where('property_type', $rentSelsPic)->with('hasOneCountry','haseOneState','hasOneCategory')->count();

        //     $listOfProperty = Propertie::where('property_type', $rentSelsPic)->with('hasOneCountry','haseOneState','hasOneCategory')
        //     ->limit($limit)
        //     ->offset($start)
        //     ->get();
        // }
// Property Condition Used, New:
        // if($propertyCondition == 0) {
        //     $total = Propertie::with('hasOneCountry','haseOneState','hasOneCategory')->count();

        //     $listOfProperty = Propertie::with('hasOneCountry','haseOneState','hasOneCategory')
        //     ->limit($limit)
        //     ->offset($start)
        //     ->get();
        // } else {    $total = Propertie::where('property_condition', $propertyCondition)->with('hasOneCountry','haseOneState','hasOneCategory')->count();

        //     $listOfProperty = Propertie::where('property_condition', $propertyCondition)->with('hasOneCountry','haseOneState','hasOneCategory')
        //     ->limit($limit)
        //     ->offset($start)
        //     ->get();
        // }


// Condition New, Used:
        //Set HTML Content.

        $html = "";

        foreach($listOfProperty as $key => $PropertyList)
        {

            $html .='
                    <div class="property_list_inr_box post-grid" onclick="myClick('.$start.');">
                        <div id="property'.$PropertyList->id.'" class="property_detail_inr_info">
                            <div class="property_list_inr_box_img">
                                <div class="property_list_img">
                                    <a href="javascript:void(0)" onclick="myClick('.$start.')" class="img_inr">
                                        <img src="'. "mainImage/".''.$PropertyList->image.'" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="property_list_inr_box_info">
                                <div class="property_detail">
                                    <div class="sl-item highlighted">
                                        <div class="property_name">
                                            <h2>'.$PropertyList->name.'</h2>
                                        </div>
                                        <div class="property_detail_inr">
                                            <span>'. __("BedRooms") .':-'. $PropertyList->bedroom.'</span>
                                        </div>
                                        <div class="property_detail_inr">
                                            <span>'. __('Floor').':-'.$PropertyList->floor.'</span>
                                        </div>
                                        <div class="property_detail_inr">
                                            <span>'. __('Addres') .':-';
                                            $html .='</span>';
                                            $html .='<span onclick="myClick('.$start.')">'. $PropertyList->address .'</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    $start++;
        }
        if ($request->ajax()) {
            return response()->json([
                "html" => $html,
                "propertyList" => $listOfProperty,
                "records" => count($listOfProperty),
                "total" => $total,
                "category" => $category
            ]);
        } else {
            // TODO: Return View Here.
            // return view()
        }
        return back()->with("error", "Page Not Found!");
    }
}
