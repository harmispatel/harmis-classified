<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models
use App\Models\{ Language };

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
            // Display the Languages
            $languages = Language::get();
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
            // Show the Language Form for Add
            $type = 'Add';
            return view('languages.add_edit', compact('type'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LanguageRequest $request)
    {
        try {
            // Create the Languages
            Language::create($request->all());
            return back()->with('success', 'Language saved successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong, please try later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            // Show the Language Form for Edit
            $type = 'Update';
            $language = Language::find(decrypt($id));

            return view('languages.add_edit', compact('type', 'language'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(LanguageRequest $request, $id)
    {
        try {
            // Update the Specific Language
            $input = $request->except('_token', '_method');
            $language = Language::find($id);

            if (!empty($language)) {
                $language->update($input);
                return back()->with('success', 'Language updated successfully!');
            } else {
                return back()->with('error', 'Record not found!');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong, please try later.');
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
}
