<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Settings;
use Illuminate\Http\Request;

use App\Traits\imageRemoveTrait;

class FooterController extends Controller
{
    use imageRemoveTrait;

    /**
     * Display Setting Form.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footerSetting = Settings::where('group','setting')->where('key','site_settings')->first();
        $setting = isset($footerSetting->value) ? unserialize($footerSetting->value) : '';
        $setting = isset($setting['setting_data']) ? $setting['setting_data'] : '';

        return view('footer.footer', compact('setting'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function show(Footer $footer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function edit(Footer $footer)
    {
        //
    }

    /**
     * Update the Footer Settings.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Check Footer value is exists
        $checkSetting = Settings::where('group','setting')->where('key','site_settings')->first();
        $oldimg = isset($checkSetting->value) ? unserialize($checkSetting->value) : '';
        $settings['setting_data'] = $request->setting;
        $settings['setting_data']['hlogo'] = isset($oldimg['setting_data']['hlogo']) ? $oldimg['setting_data']['hlogo'] : '';
        if ($request->has('hlogo')) {
            $hlogo = $this->addSingleImage('image',$request->hlogo ,isset($oldimg['setting_data']['hlogo']) ? $oldimg['setting_data']['hlogo'] : '');
            $settings['setting_data']['hlogo'] = $hlogo;
        }
        $settings['setting_data']['flogo'] = isset($oldimg['setting_data']['flogo']) ? $oldimg['setting_data']['flogo'] : '';
        if ($request->has('flogo')) {
            $flogo = $this->addSingleImage('image',$request->flogo ,isset($oldimg['setting_data']['flogo']) ? $oldimg['setting_data']['flogo'] : '');
            $settings['setting_data']['flogo'] = $flogo;
        }

        $serial = serialize($settings);

        // If footer value is exists so updating record, else inserting record.
        if (isset($serial)) {
            $oldSetting = isset($checkSetting->id) ? $checkSetting->id : '';

            if (!empty($oldSetting) || $oldSetting != '') {
                $Update = Settings::find($oldSetting);
                $Update->value = $serial;
                $Update->update();
            } else {
                $SettingNew = new Settings();
                $SettingNew->group = 'setting';
                $SettingNew->key = 'site_settings';
                $SettingNew->value = $serial;
                $SettingNew->serialized = 1;
                $SettingNew->save();
            }
            
        }

        return redirect()->route('footerdetails')->with('success', 'Footer setting update successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footer $footer)
    {
        //
    }
}
