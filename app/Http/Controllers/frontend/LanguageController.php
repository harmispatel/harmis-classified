<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

// Models
use App\Models\{ Language };

class LanguageController extends Controller
{
    /**
     * Change the Language.
     *
     * @return \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
    */
    public function changeLang(Request $request)
    {
        try {
            App::setLocale($request->lang);
            session()->put('locale', $request->lang);

            return redirect()->back();
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

}
