<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
  
        return redirect()->back();
    }
}
