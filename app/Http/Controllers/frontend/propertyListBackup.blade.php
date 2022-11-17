<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Propertie;

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
        $proDataList = Propertie::get();


// For Scroll:

        return view('frontend.propertyList', compact('totalRecords','proDataList'));

// For Scroll:
    }

    // Store Property.
    public function store(storePropertie $request)
    {
       //
    }

    public function listScroll(Request $request)
    {




        // Get Data from the Request.
        $page = $request->page;
        $limit = 4;
        $start = ($request->page-1) * $limit;


        $total = Propertie::with('hasOneCountry','haseOneState','hasOneCategory')->count();

        $listOfProperty = Propertie::with('hasOneCountry','haseOneState','hasOneCategory')
        ->limit($limit)
        ->offset($start)
        ->get();

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
                    $start ++;
        }
        if ($request->ajax()) {
            return response()->json([
                "html" => $html,
                "propertyList" => $listOfProperty,
                "records" => count($listOfProperty),
                "total" => $total
            ]);
        } else {
            // TODO: Return View Here.
            // return view()
        }
        return back()->with("error", "Page Not Found!");
    }
}
