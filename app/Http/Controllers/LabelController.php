<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Models
use App\Models\labels;
// Request Class
use App\Http\Requests\{ LabelRequest };

class LabelController extends Controller
{
    /**
     * Display a listing of the Label.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $labels = labels::orderBy('id','DESC')->get();
            return view('labels.list', compact('labels'));
        } catch (\throwable $th){
            return back()->with('error', 'Page Not Found');
        }
    }

    /**
     * Show the form for creating a new Label.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            // Show the Language Form for Add
            $type = 'Add';
            return view('labels.add_edit', compact('type'));
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Store a newly created Label in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LabelRequest $request)
    {
        try {
            labels::create($request->all());
            return back()->with('success', 'Label saved successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong, please try later.');
        }
    }

    /**
     * Show the form for editing the specified Label.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = 'Update';
        $labels = labels::find(decrypt($id));

        return view('labels.add_edit', compact('type', 'labels'));
        try {
        } catch (\Throwable $th) {
            return back()->with('error', 'Page Not Found!');
        }
    }

    /**
     * Update the specified Label in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LabelRequest $request, $id)
    {
        try {
            $input = $request->except('_token', '_method');
            $label = labels::find($id);

            if (!empty($label)) {
                $label->update($input);
                return back()->with('success', 'Labels updated successfully!');
            } else {
                return back()->with('error', 'Record not found!');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong, please try later.');
        }
    }

    /**
     * Remove the specified Label from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $label = labels::find(decrypt($id))->delete();

            return back()->with('success', 'Label deleted successfully!');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong, please try later.');
        }
    }
}
