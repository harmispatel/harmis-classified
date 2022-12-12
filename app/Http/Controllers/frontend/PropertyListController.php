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

       $html = "";
       $listview = "";
        if ($request->request_page != 'propertyHome') {
            foreach($listOfProperty as $key => $PropertyList)
            {
                // Property list
                $html .='<div class="property_list_inr_box post-grid" onclick="myClick('.$start.');">
                            <div id="property'.$PropertyList->id.'" class="property_detail_inr_info">
                                <div class="property_list_inr_box_img">
                                    <div class="property_list_img">
                                        <a href="javascript:void(0)" onclick="myClick('.$start.')" class="img_inr">
                                            <img src="'. asset("public/multiImage/".''.$PropertyList->image).'" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="property_list_inr_box_info">
                                    <div class="property_detail">
                                        <div class="sl-item highlighted">
                                            <div class="property_name">
                                                <h2>'.$PropertyList->name.'</h2>
                                            </div>
                                            <div class="property_detail_inr">';
                                            $html .=  ($PropertyList->bedroom != 0 && !empty($PropertyList->bedroom)) ? "<span>". __('BedRooms') .":-". $PropertyList->bedroom."</span>" : '';
                                            $html .= '</div>
                                            <div class="property_detail_inr">';
                                            $html .= ($PropertyList->floor != '' && !empty($PropertyList->floor)) ? "<span>". __('Floor').":-".$PropertyList->floor."</span>" : '';
                                            $html .= '</div>
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
        }
        else{
            foreach($listOfProperty as $showProperty)
            {
                $url = route('propertyDetails',$showProperty->slug);
                // Grid view for Home Page
                $html .='<div class="item" onscroll="getPricewiseProperty()" id="scroll">
                             <div class="post-item card ">
                                <a href="'.$url.'" class="img-inr">
                                    <img src="'.asset("public/multiImage/$showProperty->image").'" class="img-fluid card-img " alt="">
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
                                                elseif($showProperty["property_type"] == 2)
                                                {
                                                    $html .= __('For Sales');
                                                }
                                                else{
                                                    $html .= '';
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

                    // List View for Home Page
                    $listview .='<div class="col-md-4 mb-3 onscroll="getPropertyList()" id="scroll"">
                        <div class="list_img">
                            <a href="javascript:void(0)" onclick="myClick('.$start.')" class="img_inr">
                                <img src="'. url('public/multiImage/'.$showProperty->image) .'" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <a href="'. route('propertyDetails',$showProperty->slug) .'" class="text-dark" style="text-decoration: none;">
                            <div class="list_pro_info">
                                <div class="property_detail">
                                    <div class="sl-item highlighted">
                                        <div class="property_name">
                                            <h2 class="d-inline-block">'. $showProperty->name .'</h2>
                                            <span class="ms-2">';
                                            if($showProperty["property_type"] == 1)
                                            {
                                                $listview .= __('For Rent');
                                            }
                                            elseif($showProperty["property_type"] == 2)
                                            {
                                                $listview .= __('For Sales');
                                            }
                                            else{
                                                $listview .= '';
                                            }
                                            $listview .='</span>
                                        </div>';
                                        $listview .= ($showProperty->floor != '' && !empty($showProperty->floor)) ? '<div class="property_detail_inr"><span>Floor:-</span><span>'.$showProperty->floor.'</span></div>' : '';
                                        $listview .= ($showProperty->bedroom != '' && !empty($showProperty->bedroom)) ? '<div class="property_detail_inr"><span>Bedroom:-</span><span>'.$showProperty->bedroom.'</span></div>' : '';
                                        $listview .= ($showProperty->building_area != 0 && !empty($showProperty->building_area)) ? '<div class="property_detail_inr"><span>sq.ft.:-</span><span>'.$showProperty->building_area.'</span></div>' : '';
                                        $listview .= ($showProperty->price != 0 && !empty($showProperty->price)) ? '<div class="property_detail_inr"><span>Price:-</span><span>'.$showProperty->price.'</span></div>' : '';
                                        $listview .= '<div class="property_detail_inr">
                                            <span>Addres:-</span><span onclick="myClick('.$start.')">'. $showProperty->address .'</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>';
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
