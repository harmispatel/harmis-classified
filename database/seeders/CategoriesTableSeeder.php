<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = array(
        array('name' => 'Test1','status' => '1'),
        array('name' => 'Test2','status' => '1'),
        array('name' => 'Test2','status' => '1'),
        );
        // Save The Categories:
        Category::insert($categories);
    }
}
