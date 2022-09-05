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
        array('name' => 'Flat','status' => '1'),
        array('name' => 'Villa / House','status' => '1'),
        array('name' => 'Land','status' => '1'),
        array('name' => 'Farm','status' => '1'),
        );
        // Save The Categories:
        Category::insert($categories);
    }
}
