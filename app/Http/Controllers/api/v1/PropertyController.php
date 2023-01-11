<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\{ Request, Response };
use Illuminate\Support\Str;

// Models
use App\Models\{ Propertie, Bookmark, Category};

// Request Class
use App\Http\Requests\{ BookmarkRequest, storePropertie};

// Resource Class
use App\Http\Resources\{ PropertyResource };

// Media Traits
use App\Traits\imageRemoveTrait;

class PropertyController extends Controller
{
    use imageRemoveTrait;
    /**
     * Property Listing
     */
    public function getProperties()
    {
        try {
            // Get the Active Properties
            $properties = Propertie::where('status', 1)
                                    ->with(['hasOneUser', 'hasOneCategory', 'hasOneState', 'hasOneCountry'])
                                    ->orderBy('id', 'desc')
                                    ->get();

            return $this->sendResponse(true, 'Properties loaded successfully!', PropertyResource::collection($properties), Response::HTTP_OK);
        } catch (\Throwable $e) {
            return $this->sendResponse(false, 'Something went wrong, please try later!', [], 500);
        }
    }
    
    /**
     * Add Properties to Bookmark
     */
    public function addToBookmarks(BookmarkRequest $request)
    {
        try {
            Bookmark::create($request->all());
            return $this->sendResponse(true, 'Properties bookmarked successfully!', [], Response::HTTP_OK);
        } catch (\Throwable $e) {
            return $this->sendResponse(false, 'Something went wrong, please try later!', [], 500);
        }
    }

    /**
     * Bookmarked Property Listing
     */
    public function getBookmarks(Request $request)
    {
        try {
            // Get the Specific Bookmarked Properties
            $bookmarks = Propertie::whereHas('bookmarks', function($query) use($request) {
                                        $query->where('device_token', $request->device_token);
                                    })->get();

            return $this->sendResponse(true, 'Bookmarked Properties loaded successfully!', PropertyResource::collection($bookmarks), Response::HTTP_OK);
        } catch (\Throwable $e) {
            return $this->sendResponse(false, 'Something went wrong, please try later!', [], 500);
        }
    }

    /**
     * Remove Properties from Bookmark
     */
    public function removeFromBookmarks(BookmarkRequest $request)
    {
        try {
            // Remove the Specific Bookmarked Properties
            Bookmark::where([
                ['device_token', $request->device_token],
                ['property_id', $request->property_id]
            ])->delete();

            return $this->sendResponse(true, 'Removed Properties from Bookmarks successfully!', [], Response::HTTP_OK);
        } catch (\Throwable $e) {
            return $this->sendResponse(false, 'Something went wrong, please try later!', [], 500);
        }
    }

    /**
     * Add Propery
     */
    public function addProperty(storePropertie $request)
    {
        // dd($request->all());
        try {
                // $userId = $user->id;
                $addPropertyData = new Propertie;
                $addPropertyData->name = $request->name;
                $addPropertyData->slug = Str::slug($request->name);
                $addPropertyData->category_id = $request->category_id;
                // $addPropertyData->user_id = $userId;
                $addPropertyData->property_type = $request->property_type;
                $addPropertyData->property_condition = $request->property_condition;
                $addPropertyData->floor = $request->floor;
                $addPropertyData->bedroom = $request->bedroom;
                $addPropertyData->kitchen = $request->kitchen;
                $addPropertyData->bath = $request->bath;
                $addPropertyData->garage = $request->garage;
                $addPropertyData->build_year = $request->build_year;
                $addPropertyData->building_area = $request->building_area;
                $addPropertyData->description = $request->description;
                $addPropertyData->price = $request->price;
                $addPropertyData->country_id = $request->country_id;
                $addPropertyData->state_id = $request->state_id;
                $addPropertyData->address = $request->address;
                $addPropertyData->longitude = $request->longitude;
                $addPropertyData->latitude = $request->latitude;
                $addPropertyData->status = $request->status;
                
                // Temp var
                // $addPropertyData->image = $request->image;
                // $addPropertyData->multiImage = $request->multiImage;


                if($request->file('image')){
                    $fileName = $this->addSingleImage('multiImage',$request->file('image'),$oldImage = '');
                    $addPropertyData['image']= $fileName;
                }

                if($request->hasfile('multiImage')) {
                    $multiFile = $this->addMultiImage('multiImage',$request->file('multiImage'), $oldImage = '');
                    $addPropertyData->multiImage = $multiFile;
                }
                $addPropertyData->save();
            return $this->sendResponse(true, 'Propertie added successfully!', [], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return $this->sendResponse(false, 'Something went wrong, please try later!', [], 500);
        }
    }


    /**
     * Get Single Propertie Details
     */
    public function getPropertiesdetail(Request $request)
    {
        try {
            $id = $request->id;
            $propertyDetails = Propertie::where('id',$id)
                        ->with(['hasOneUser', 'hasOneCategory', 'hasOneState', 'hasOneCountry'])
                        ->first();

            return $this->sendResponse(true, 'Propertie detail loaded successfully!', new PropertyResource($propertyDetails), Response::HTTP_OK);
        } catch (\Throwable $th) {
            return $this->sendResponse(false, 'Something went wrong, please try later!', [], 500);
        }
    }

    /**
     * property amenities
     */
    public function propertyamAnities(Request $request)
    {
        $category = Category::where('id',$request->category_id)->with('amenities')->first();

        $data['category_id'] = $category->id;

        if($category)
        {
            foreach($category->amenities as $amenity)
            {
                $name = isset($amenity->name) ? $amenity->name : '';
                $mydata['name'] = $name;
                $mydata['id'] = $amenity->id;
                $mydata['icon'] = (isset($amenity->icon) && !empty($amenity->icon)) ? asset('amenities_icon/'.$amenity->icon) : '';
                $data['amenities'][] = $mydata;
            }
        }
        
        return $this->sendResponse(true, 'Propertie amenities loaded successfully!', $data, Response::HTTP_OK);

        exit();
    }
}
