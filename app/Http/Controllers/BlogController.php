<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

use App\Traits\imageRemoveTrait;

class BlogController extends Controller
{
    use imageRemoveTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::get();
        return view('blogs.bloglist', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.createblog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $blogs = new Blog;
            $blogs->title = isset($request->title) ? $request->title : '';
            $blogs->description = isset($request->description) ? $request->description : '';
            if ($request->has('image')) {
                $image = $this->addSingleImage('blog_image',$request->image ,$oldImage = '');
                $blogs->image = $image;
            }
            $blogs->view = 0;
            $blogs->save();
    
            return redirect()->route('blogs.index')->with('success','Blog insert succsessfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('blogs.editblog',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request->all());
        try {
            $blogs = Blog::find($id);
            $blogs->title = isset($request->title) ? $request->title : '';
            $blogs->description = isset($request->description) ? $request->description : '';
            if ($request->has('image')) {
                $image = $this->addSingleImage('blog_image',$request->image ,$oldImage = '');
                $blogs->image = $image;
            }
            // $blogs->view = 0;
            $blogs->update();
    
            return redirect()->route('blogs.index')->with('success','Slider insert succsessfully');
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
            $deleteblogs = Blog::find($id);

            // remove singel image from storage
            $oldSingleImage = $deleteblogs->image;
            $this->addSingleImage('blogs_image',$file = '',$oldSingleImage);

            // remove multi image from storage
            $oldMultiImage = $deleteblogs->multiImage;
            $this->addMultiImage('public/blogs_image/',$files = '', $oldMultiImage);

            Blog::find($id)->delete();

            return redirect()->route('blogs.index')->with('success', 'blog delete success.');;
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong.!');
        }
    }
}
