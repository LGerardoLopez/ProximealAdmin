<?php

use Illuminate\Database\Seeder;

class VehiclesSeeder extends Seeder
{
/**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('permissions')->insert(array(
            175 =>
            array(
                'id' => 195,
                'name' => 'vehicles.index',
                'guard_name' => 'web',
                'created_at' => '2020-08-29 08:08:05',
                'updated_at' => '2020-08-29 08:08:05',
                'deleted_at' => NULL,
            ),
            176 =>
            array(
                'id' => 196,
                'name' => 'vehicles.create',
                'guard_name' => 'web',
                'created_at' => '2020-08-29 08:08:05',
                'updated_at' => '2020-08-29 08:08:05',
                'deleted_at' => NULL,
            ),
            177 =>
            array(
                'id' => 197,
                'name' => 'vehicles.store',
                'guard_name' => 'web',
                'created_at' => '2020-08-29 08:08:05',
                'updated_at' => '2020-08-29 08:08:05',
                'deleted_at' => NULL,
            ),
            178 =>
            array(
                'id' => 198,
                'name' => 'vehicles.edit',
                'guard_name' => 'web',
                'created_at' => '2020-08-29 08:08:05',
                'updated_at' => '2020-08-29 08:08:05',
                'deleted_at' => NULL,
            ),
            179 =>
            array(
                'id' => 199,
                'name' => 'vehicles.update',
                'guard_name' => 'web',
                'created_at' => '2020-08-29 08:08:05',
                'updated_at' => '2020-08-29 08:08:05',
                'deleted_at' => NULL,
            ),
            180 =>
            array(
                'id' => 200,
                'name' => 'vehicles.destroy',
                'guard_name' => 'web',
                'created_at' => '2020-08-29 08:08:05',
                'updated_at' => '2020-08-29 08:08:05',
                'deleted_at' => NULL,
            ),
        ));

        \DB::table('role_has_permissions')->insert(array(
            242 => 
            array (
                'permission_id' => 195,
                'role_id' => 2,
            ),
            243 => 
            array (
                'permission_id' => 196,
                'role_id' => 2,
            ),
            244 => 
            array (
                'permission_id' => 197,
                'role_id' => 2,
            ),
            245 => 
            array (
                'permission_id' => 198,
                'role_id' => 2,
            ),
            246 => 
            array (
                'permission_id' => 199,
                'role_id' => 2,
            ),
            247 => 
            array (
                'permission_id' => 200,
                'role_id' => 2,
            ),
        ));
    }

}
