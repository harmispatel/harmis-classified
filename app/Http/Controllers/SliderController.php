<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\imageRemoveTrait;

class SliderController extends Controller
{
    use imageRemoveTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::get();
        return view('sliders.sliderlist', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sliders.createslider');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $slider = new Slider;
            $slider->name = isset($request->name) ? $request->name : '';
            $slider->description = isset($request->description) ? $request->description : '';
            if ($request->has('image')) {
                $image = $this->addSingleImage('slider_image',$request->image ,$oldImage = '');
                $slider->image = $image;
            }
            $slider->save();
    
            return redirect()->route('sliders.index')->with('success','Slider insert succsessfully');
        } catch (\Throwable $th) {
            with('error', 'Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('sliders.editslider',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        try {
            $slider = Slider::find($id);
            $slider->name = isset($request->name) ? $request->name : '';
            $slider->description = isset($request->description) ? $request->description : '';
            if ($request->has('image')) {
                $image = $this->addSingleImage('slider_image',$request->image ,$slider->image);
            }
            $slider->image = isset($image) ? $image : $slider->image;
            $slider->update();
    
            return redirect()->route('sliders.index')->with('success','Slider insert succsessfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deleteSlider = Slider::find($id);

            // remove singel image from storage
            $oldSingleImage = $deleteSlider->image;
            $this->addSingleImage('slider_image',$file = '',$oldSingleImage);

            // remove multi image from storage
            $oldMultiImage = $deleteSlider->multiImage;
            $this->addMultiImage('public/slider_image/',$files = '', $oldMultiImage);

            Slider::find($id)->delete();

            return redirect()->route('sliders.index')->with('success', 'Slider delete success.');;
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong.!');
        }
    }
}
