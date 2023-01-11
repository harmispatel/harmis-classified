<?php

namespace App\Traits;

use App\Models\{Blog, Category, DetailTheme, Propertie, Slider, Theme, User};
use PhpParser\Builder\Property;

trait ActiveTheme {

    /**
     * remove image from sotage
     * @return $this|false|string
     */
    public function activeTheme()
    {
        $activeTheme = Theme::where('is_default',1)->first();

        // Agent
        $agents = User::where('role_id', 9)->latest()->take(10)->get();

        // Blogs
        $blogs = Blog::latest()->take(3)->get();


        // Blogs
        $sliders = Slider::latest()->get();

        // Theme One
        $resentPropertys = Propertie::with('hasOneCategory')->latest()->take(6)->get();
        $categories = Category::select('id', 'name')->get();
        
        $data = [];
        foreach ($categories as $category) {
            $data[$category->name][] = Propertie::where('category_id', $category->id)->get()->groupBy('property_type')->toArray();
        }
        // End Theme One

        // Theme Two && Three
        $themeTwoRent = Propertie::with('hasOneCategory')->where('property_type',1)->latest()->take(6)->get();
        $themeTwoSale = Propertie::with('hasOneCategory')->where('property_type',2)->latest()->take(6)->get();
        // End Theme Two && Three

        // Temp theme show front
        return compact('activeTheme','agents','blogs','sliders','data','resentPropertys','themeTwoRent','themeTwoSale');

        // if ($activeTheme->id == 1) {
        //     return compact('data', 'agents','resentPropertys','activeTheme');
        // }
        // elseif ($activeTheme->id == 2) {
        //     return compact('activeTheme','agents','resentPropertys','themeTwoRent','themeTwoSale');
        // }
        // elseif ($activeTheme->id == 3) {
        //     return compact('activeTheme','agents','resentPropertys','themeTwoRent','themeTwoSale');
        // }
        // else {
        //     return compact('data','agents','resentPropertys','activeTheme');
        // }
        // return null;

    }

    public function activeDetailtheme()
    {
        $activeDetailTheme = DetailTheme::where('is_default',1)->first();
        return $activeDetailTheme;
    }

}
