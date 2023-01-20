<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PropertyResource;
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
        try {
            // Get Data from the Request.
            $proPrice = $request->price;
            $category_id = $request->categoryId;
            $property_condition = $request->propertyCondition;
            $property_floor = $request->floor;
            $bedroom = $request->bedroom;
            $search = $request->keyword;

            // Set the Avg Price.
            // $propertyMaxPrice = $request->price;
            // $propertyMinPrice = Propertie::min('price');
            // $PropertyMaxPrice = Propertie::max('price');

            // $total = 0;
            $property = Propertie::query();

            // Property Type Filter.
            $property->when($proPrice, function() use($property, $proPrice) {
                $property->where('property_type', $proPrice);
                // $total += $property->where('property_type', $proPrice)->count();
            });

            // Property Filter on Category.
            $property->when($category_id, function() use($property, $category_id) {
                $property->where('category_id', $category_id);
                // $total += $property->where('category_id', $category_id)->count();
            });

            // Property Filter on Property Condition.
            $property->when($property_floor, function() use($property, $property_floor) {
                $property->where('floor', $property_floor);
                // $total += $property->where('floor', $property_floor)->count();
            });

            // Property Filter on Property Floor.
            $property->when($property_condition, function() use($property, $property_condition) {
                $property->where('property_condition', $property_condition);
                // $total += $property->where('property_condition', $property_condition)->count();
            });

            // Property Filter on Bedrooms.
            $property->when($bedroom, function() use($property, $bedroom) {
                if (in_array('5+', $bedroom)) {
                    $property->where('bedroom', '>=', 5)->orWhereIn('bedroom', $bedroom);
                } 
                if(!in_array('5+', $bedroom)) {
                    $property->whereIn('bedroom', $bedroom);
                }
            });

            // Property Filter on Search.
            $property->when($search, function() use($property, $search) {
                $property->where('name', 'LIKE', "%{$search}%")->orWhere('description', 'LIKE', "%{$search}%");
                // $total += $property->where('name', 'LIKE', "%{$search}%")->count();
            });

            // Property Filter on Price
            if (($request->minPrice != '' && !empty($request->minPrice)) && ($request->minPrice != '' && !empty($request->minPrice))) {
                // $total += $property->whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMidPrice])->count();
                $property->whereBetween('price', [$request->minPrice, $request->maxPrice]);
                // $property->whereBetween('price', [$propertyMinPrice, $propertyMaxPrice, $PropertyMaxPrice]);
            }

            $procount = $property->count(); 
            $property = $property->with('bookmarks')
            ->limit(10)
            ->offset($request['offset'])
            ->get();



            return $this->sendResponse(true, 'Filter detail loaded successfully!', ['total'=>$procount ,'property'=>PropertyResource::collection($property)] , Response::HTTP_OK);
        } catch (\Throwable $th) {
            return $this->sendResponse(false, 'Something went wrong, please try later!', [], 500);
        }
    }
}