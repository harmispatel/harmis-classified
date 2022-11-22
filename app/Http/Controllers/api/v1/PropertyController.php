<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Resource Class
use App\Http\Resources\PropertyResource;

// Models
use App\Models\{
    Propertie
};

class PropertyController extends Controller
{
    /**
     * Property Listing
     */
    public function getProperties()
    {
        try {
            // Get the Active Properties
            $properties = Propertie::where('status', 1)->with(['hasOneUser', 'hasOneCategory'])->orderBy('id', 'desc')->get();

            return $this->sendResponse('true', 'Properties loaded successfully!', $properties, Response::HTTP_OK);
        } catch (\Throwable $e) {
            return $this->sendResponse('false', 'Something went wrong, please try later!', [], 500);
        }
    }
}
