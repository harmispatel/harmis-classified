<?php

namespace App\Http\Controllers;

use App\Models\{DetailTheme, Settings, Theme};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\fontFamily;
use Illuminate\Support\Facades\Redis;

class ThemeController extends Controller
{

    use fontFamily;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::get();
        $detailsTheme = DetailTheme::get();
        $fonts = $this->getFonts();
        $get_fonts_settings = Settings::select('value')->where('key','fonts')->first();

        return view('theme.themelayout',compact('themes','detailsTheme','fonts','get_fonts_settings'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function themeupdate($id)
    {
        Theme::where('id',$id)->update(['is_default' => 1]);
        Theme::where('id','!=',$id)->update(['is_default' => 0]);

        // DB::table('themes')->update(['is_default' =>DB::raw("'(CASE WHEN themes.id = " . $id . " THEN 1 ELSE 0 END)'")]);

        // DB::table('themes')->select('id',$id)->raw('(CASE WHEN themes.id = ' . $id . ' THEN 1 ELSE 0 END) AS is_user');

        return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     */
    public function detailsupdate($id)
    {
        DetailTheme::where('id',$id)->update(['is_default' => 1]);
        DetailTheme::where('id','!=',$id)->update(['is_default' => 0]);

        // DB::table('themes')->update(['is_default' =>DB::raw("'(CASE WHEN themes.id = " . $id . " THEN 1 ELSE 0 END)'")]);

        // DB::table('themes')->select('id',$id)->raw('(CASE WHEN themes.id = ' . $id . ' THEN 1 ELSE 0 END) AS is_user');

        return redirect()->back();

    }


    /**
     * Update Theme Setting And Font Family.
     */
    public function genralsetting(Request $request)
    {
        // dd($request->all());
        if ($request->fonts) {
            $check_font_setting = Settings::where('key', 'fonts')->first();
            $font_setting_id = isset($check_font_setting->id) ? $check_font_setting->id : '';
            if (!empty($font_setting_id) || $font_setting_id != '') {
                $font_setting_update = Settings::find($font_setting_id);
                $font_setting_update->value = $request->fonts;
                $font_setting_update->update();
            } else {
                $font_setting_new = new Settings();
                $font_setting_new->group = 'fontfamily';
                $font_setting_new->key = 'fonts';
                $font_setting_new->value = $request->fonts;
                $font_setting_new->serialized = 0;
                $font_setting_new->save();
            }
        }

        return redirect()->back()->with('success','Setting Update successfully');
    }
}
