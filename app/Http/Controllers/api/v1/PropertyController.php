<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\{ Request, Response };

// Models
use App\Models\{ Propertie, Bookmark };

// Request Class
use App\Http\Requests\{ BookmarkRequest };

// Resource Class
use App\Http\Resources\{ PropertyResource };

class PropertyController extends Controller
{
    /**
     * Property Listing
     */
    public function getProperties()
    {
        try {
            // Get the Active Properties
            $properties = Propertie::where('status', config('global.ACTIVE'))
                                    ->with(['hasOneUser', 'hasOneCategory', 'hasOneState', 'hasOneCountry'])
                                    ->orderBy('id', 'desc')
                                    ->get();

            return $this->sendResponse('true', 'Properties loaded successfully!', PropertyResource::collection($properties), Response::HTTP_OK);
        } catch (\Throwable $e) {
            return $this->sendResponse('false', 'Something went wrong, please try later!', [], 500);
        }
    }
    
    /**
     * Add Properties to Bookmark
     */
    public function addToBookmarks(BookmarkRequest $request)
    {
        try {
            Bookmark::create($request->all());
            return $this->sendResponse('true', 'Properties bookmarked successfully!', [], Response::HTTP_OK);
        } catch (\Throwable $e) {
            return $this->sendResponse('false', 'Something went wrong, please try later!', [], 500);
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

            return $this->sendResponse('true', 'Bookmarked Properties loaded successfully!', PropertyResource::collection($bookmarks), Response::HTTP_OK);
        } catch (\Throwable $e) {
            return $this->sendResponse('false', 'Something went wrong, please try later!', [], 500);
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

            return $this->sendResponse('true', 'Removed Properties from Bookmarks successfully!', [], Response::HTTP_OK);
        } catch (\Throwable $e) {
            return $this->sendResponse('false', 'Something went wrong, please try later!', [], 500);
        }
    }
}
