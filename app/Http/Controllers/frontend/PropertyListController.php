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
        $totalRecords      = Propertie::count();
        $category          = Category::get();
        $propertyMaxPrice  = Propertie::max('price');
        $propertyMinPrice  = Propertie::min('price');
        $PropertyMidPrice  = Propertie::avg('price');
        $totalRecords      = Propertie::count();

        return view('frontend.PropertyList', compact(
            'totalRecords',
            'category',
            'propertyMaxPrice',
            'propertyMinPrice',
            'PropertyMidPrice',
        ));
    }


    /**
    * Property Listing by Scrolling.
    *
    * @return \Illuminate\Http\Response
    */
    public function listScroll(Request $request)
    {
        $category = Category::get();
        $propertyMinPrice = Propertie::min('price');

        // Get Data from the Request.
        $proPrice = $request->price;

        $rentSelsPrice = $request->rentSelsPrice;
        $category_id = $request->category;
        $property_condition = $request->propertyCondition;
        $property_floor = $request->propertyFloor;
        $bedroom = $request->propertyBedRoom;
        $search = $request->search;
        $start = ($request->start);

        $total = 0;
        $listOfProperty = Propertie::query();

        // // Property on Rent Sels Filter.
        // $listOfProperty->when(!empty($rentSelsPrice), function() use($listOfProperty, $rentSelsPrice, $total) {
        //     $listOfProperty->where('property_type', $rentSelsPrice);
        //     $total += $listOfProperty->where('property_type', $rentSelsPrice)->count();
        // });

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
            } 
            if(!in_array('5+', $bedroom)) {
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


       $html = "";
       $listview = "";
        if ($request->request_page != 'propertyHome') {
            foreach($listOfProperty as $key => $PropertyList)
            {
                $image = (file_exists(public_path('multiImage/'.$PropertyList->image)) && !empty($PropertyList->image)) ? asset('public/multiImage/'.$PropertyList->image) : asset('public/multiImage/pronotfound.jpg');
                $html .=  '<div class="property-inr-list-item">
                                <div class="property_inr-list-img">
                                    <a href="javascript:void(0)" onclick="myClick('.$start.')" class="img_inr">
                                        <img src="'. $image .'" class="w-100"/>
                                    </a>';
                                    if($PropertyList["property_type"] == 1)
                                    {
                                        $html .= '<div class="type-tag">'.__("For Rent").'</div>';
                                    }
                                    elseif($PropertyList["property_type"] == 2)
                                    {
                                        $html .= '<div class="type-tag">'.__('For Sales').'</div>';;
                                    }
                                    else{
                                        $html .= '';
                                    }
                                $html .= '</div>
                                <div class="property-inr-list-content">
                                    <h2>'.$PropertyList->name.'</h2>
                                    <p>'. $PropertyList->address .'</p>
                                    <div class="property-inr-list-tag">';
                                      $html .= ($PropertyList->bedroom != 0 && !empty($PropertyList->bedroom)) ? '<span class="badge rounded-pill bg-light-green">'.$PropertyList->bedroom.' '.__("Bedrooms").'</span>' : '';
                                      $html .= ($PropertyList->bath != 0 && !empty($PropertyList->bath)) ? '<span class="badge rounded-pill bg-light-orange">'.$PropertyList->bath.' '.__("Bathrooms").'</span>' : '';
                                      $html .= ($PropertyList->building_area != 0 && !empty($PropertyList->building_area)) ?  '<span class="badge rounded-pill bg-light-yellow">'.$PropertyList->building_area .' '.__("Sq.ft").'</span>' : '';
                                      $html .= ($PropertyList->garage != 0 && !empty($PropertyList->garage)) ?  '<span class="badge rounded-pill bg-light-blue">'.$PropertyList->garage .' '.__("Garage").'</span>' : '';
                                   $html .= '</div>
                                    <div class="property-inr-price-category-tag">
                                        <div class="price-tag">$ '. $PropertyList->price .'</div>
                                    </div>
                                    <a href="'. route('propertyDetails',$PropertyList->slug) .'" class="btn btn-sm btn-success mt-2">'. __("View Property") .'</a>
                                </div>
                            </div>';
                        $start++;
            }
        }

        if ($request->ajax()) {
            return response()->json([
                "html" => $html,
                "listview" => $listview,
                "propertyList" => $listOfProperty,
                "records" => count($listOfProperty),
                "total" => $total,
                "category" => $category
            ]);
        }
        return back()->with("error", "Page Not Found!");
    }
}
