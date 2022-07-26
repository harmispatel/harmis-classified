<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create the Admin User
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'gender'   => 'Male',
            'mobile'   => '1234567890',
            'role_id'  => 1,
            'password' => bcrypt('harmis123'),
            'status'   => 1
        ]);
    }
}
