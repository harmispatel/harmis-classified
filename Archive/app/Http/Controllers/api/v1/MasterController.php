<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Models
use App\Models\{
    Category
};

class MasterController extends Controller
{
    /**
    * Get the Property Types
    */
    public function getCategories()
    {
        try {
            // Get the Active Property Types
            $categories = Category::select('id', 'name')->where('status', config('global.ACTIVE'))->get();

            return $this->sendResponse('true', 'Property Types loaded successfully!', $categories, Response::HTTP_OK);
        } catch (\Throwable $e) {
            return $this->sendResponse('false', 'Something went wrong, please try later!', [], 500);
        }
    }
}
