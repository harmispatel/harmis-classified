<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\Language;

// request
use App\Http\Requests\storeCategory;
use App\Models\{amenities, AmenitiesCategory, categoryPropertyCondition, CategoryPropertyCondition as ModelsCategoryPropertyCondition, Propertie, PropertyCondition};

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
        $amenities = amenities::get();
        $procondition = PropertyCondition::get();

        $category = Category::get();
        return response()->view('categories.createCategory',compact('category','getLanguage','amenities','procondition'));
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeCategory $request)
    {     
        $input = $request->except('_token','amenities');
        $addCategoryData = new Category;
        $addCategoryData->name = $request->name;
        $addCategoryData->status = $request->status;
        $addCategoryData->save();
        $addCategoryData->amenities()->sync($request->amenities);
        $addCategoryData->propertycondition()->sync($request->procondition);

        return redirect()->route('category.index');
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editCategoryData = Category::with('amenities','propertycondition')->find($id);
        $amenities = amenities::get();
        $procondition = PropertyCondition::get();
        return view('categories.editCategory',compact('editCategoryData','amenities','procondition'));
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
        $updateCategoryData->update();
        $updateCategoryData->amenities()->sync($request->amenities);
        $updateCategoryData->propertycondition()->sync($request->procondition);

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
        Propertie::where('category_id', $id)->delete();
        AmenitiesCategory::where('category_id', $id)->delete();
        ModelsCategoryPropertyCondition::where('category_id', $id)->delete();
        Category::where('id',$id)->delete();
        return redirect('category');
    }

}
