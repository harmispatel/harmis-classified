<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\{ Request, Response };

// Models
use App\Models\{ Propertie };

class FilterController extends Controller
{

    /**
     * Get Properties by Filter
     */
    public function propertyfilter(Request $request)
    {

        // dd($request->all());
        // try {
            // Get Data from the Request.
            $proPrice = $request->price;
            $rentSelsPic = $request->rentSelsPrice;
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

            // Property Filter on Search.
            $property->when(!empty($search), function() use($property, $search, $total) {
                $property->where('name', 'LIKE', "%{$search}%");
                $total += $property->where('name', 'LIKE', "%{$search}%")->count();
            });

            // Property Filter on Price
            if ($proPrice != '' && !empty($proPrice)) {
                $total += $property->whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMidPrice])->count();
                $property->whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMidPrice])
                ->limit($request['limit'])
                ->offset($request['start']);
            }

            $property = $property->get();

            return $this->sendResponse(true, 'Filter detail loaded successfully!', $property , Response::HTTP_OK);
        // } catch (\Throwable $th) {
        //     return $this->sendResponse(false, 'Something went wrong, please try later!', [], 500);
        // }
    }
}