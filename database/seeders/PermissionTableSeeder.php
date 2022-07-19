<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = array (
            [
                'name'       => 'Add User',
                'slug'       => 'user_add',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Edit User',
                'slug'       => 'user_edit',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Delete User',
                'slug'       => 'user_delete',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Add Role',
                'slug'       => 'role_add',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Edit Role',
                'slug'       => 'role_edit',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Delete Role',
                'slug'       => 'role_delete',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Add Country',
                'slug'       => 'country_add',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Edit Country',
                'slug'       => 'country_edit',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Delete Country',
                'slug'       => 'country_delete',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Add State',
                'slug'       => 'state_add',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Edit State',
                'slug'       => 'state_edit',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Delete State',
                'slug'       => 'state_delete',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Add Category',
                'slug'       => 'category_add',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Edit Category',
                'slug'       => 'category_edit',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Delete Category',
                'slug'       => 'category_delete',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Add Property',
                'slug'       => 'property_add',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Edit Property',
                'slug'       => 'property_edit',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name'       => 'Delete Property',
                'slug'       => 'property_delete',
                'status'     => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        );

        // Save the Permissions
        Permission::insert($permissions);
    }
}
