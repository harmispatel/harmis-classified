<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\Language;

// request
use App\Http\Requests\storeCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showCategoryData = Category::orderBy('id','DESC')->get();
        return view('categories.category',compact('showCategoryData'));
    }

    /**
     * Show the form for creating a new Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getLanguage = Language::get();

        $category = Category::get();
        return response()->view('categories.createCategory',compact('category','getLanguage'));
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeCategory $request)
    {
        $getLanguage = Language::get();
        foreach($getLanguage as $languag)
        {
            $language_id = $languag->id;
            $addCategoryData = Category::create($request->all());
        }
        return redirect('category');
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
     * Show the form for editing the specified Category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editCategoryData = Category::find($id);
        return view('categories.editCategory',compact('editCategoryData'));
    }

    /**
     * Update the specified Category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateCategoryData = Category::find($id);
        $updateCategoryData->name = $request->name;
        $updateCategoryData->status = $request->status;
        $updateCategoryData->save();

        return redirect('category');
    }

    /**
     * Remove the specified Category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteCategoryData = Category::where('id',$id)->delete();
        return redirect('category');
    }

}
