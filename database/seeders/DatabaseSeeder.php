<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seed the basic data
        $this->call([
            RoleTableSeeder::class,
            UserTableSeeder::class,
            PermissionTableSeeder::class,
            CategoriesTableSeeder::class

        ]);
     }
}
