<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\{Country, State};
use Illuminate\Http\{ Request, Response };

class ZoneController extends Controller
{
    /**
     * Get All Countries
     */
    public function country(Request $req)
    {
        try {
            $countries = Country::select('id','name','status')->where('status', 1)->get();    

            return $this->sendResponse(true, 'Counties loaded successfully!', $countries, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return $this->sendResponse(false, 'Something went wrong, please try later!', [], 500);
        }
    }

    /**
     * Get All State By Country
     */
    public function state(Request $request)
    {
        try {
            $states = State::select('id','name','status')->where('country_id', $request->country_id)->get();

            return $this->sendResponse(true, 'State loaded successfully!', $states, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return $this->sendResponse(false, 'Something went wrong, please try later!', [], 500);
        }
    }
}
