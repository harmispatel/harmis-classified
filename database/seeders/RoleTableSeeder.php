<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array (
            [
                'name'       => 'Admin',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Agent',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Customer',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

        // Save the Roles
        Role::insert($roles);
    }
}
