<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

// Models
use App\Models\{ Language, labels };

// Request Class
use App\Http\Requests\{ LanguageRequest };

class LanguageController extends Controller
{
    /**
     * Listing of the Languages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $languages = Language::orderBy('id','DESC')->get();
            return view('languages.list', compact('languages'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Show the form for creating a new Language.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $type = 'Add';
            $languages = Language::get();
            $labels = Labels::get();
            return view('languages.add', compact('type', 'labels', 'languages'));
            // Show the Language Form for Add
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Store a newly created Language in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        $name = isset($request->name) ? $request->name : '';
        $code = isset($request->code) ? $request->code : '';
        $labels = isset($request->labels) ? $request->labels : [];
        $status = isset($request->status) ? $request->status : [];

        $html = '';

        if(count($labels) > 0)
        {
            $labelCount = count($labels);
            $no = 0;

            $html .= '{';

            foreach($labels as $key => $label)
            {
                $no++;

                if($no < $labelCount)
                {
                    $html .= '"'.$key.'":"'.$label.'",';
                }
                else
                {
                    $html .= '"'.$key.'":"'.$label.'"';
                }
            }
            $html .= '}';
        }

        $data = $html;
        $file = $code.'.json';
        $destinationPath=base_path()."/resources/lang/";

        if (is_dir($destinationPath))
        {
            try {
                File::put($destinationPath.$file,$data);
                Language::create([
                    'name' => $name,
                    'code' => $code,
                    'language_label' => serialize($labels),
                    'status' => $status
            ]);

            return back()->with('success', 'New Languages has been Created SuccessFully..');
            } catch (\Throwable $th) {
                return back()->with('error', 'Something Went Wrong!');
            }
        }
        else
        {
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    /**
     * Show the form for editing the specified Language.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            // Show the Language Form for Edit
            $type = 'Update';
            $labels = labels::get();
            $language = Language::find(decrypt($id));

            return view('languages.edit', compact('type', 'language','labels'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Update the specified Language in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = isset($request->id) ? $request->id : '';
        $name = isset($request->name) ? $request->name : '';
        $code = isset($request->code) ? $request->code : '';
        $labels = isset($request->labels) ? $request->labels : [];
        $status = isset($request->status) ? $request->status : [];

        $html = '';

        if(count($labels) > 0)
        {
            $labelCount = count($labels);
            $no = 0;

            $html .= '{';

            foreach($labels as $key => $label)
            {
                $no++;

                if($no < $labelCount)
                {
                    $html .= '"'.$key.'":"'.$label.'",';
                }
                else
                {
                    $html .= '"'.$key.'":"'.$label.'"';
                }
            }

            $html .= '}';
        }

        $data = $html;
        $file = $code.'.json';
        $destinationPath=base_path()."/resources/lang/";

        if (is_dir($destinationPath))
        {
            File::put($destinationPath.$file,$data);

            // Store a Language
            $hello = Language::find($id)->update([
                'name' => $name,
                'code' => $code,
                'language_label' => serialize($labels),
                'status' => $status
            ]);

                return back()->with('success', 'Language has been Updated SuccessFully..');
            try {

                } catch (\Throwable $th) {
                    return back()->with('error', 'Something Went Wrong!');
                }
        }
        else
        {
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    /**
     * Remove the specified Language.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Delete the specific Language
            $language = Language::find(decrypt($id));

            if (!empty($language)) {
                $language->delete();
                return back()->with('success', 'Language deleted successfully!');
            } else {
                return back()->with('error', 'Record not found!');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong, please try later.');
        }
    }
    /**
     *
     * Set Language In Session
     *
     */
    public function setLanguage(Request $request)
    {
        try {
            // session()->put('lang_code', $request->lang);
            session(['lang_code' => $request->lang]);

            return response()->json([
                'success' => 1,
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong, please try later.');
        }
    }
}
