<?php

use Designbycode\RolesAndPermissions\Models\Role;
use Illuminate\Database\Seeder;

class AdminRoleSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = ['name' => 'admin'];

    	Role::insert($roles);
    }
}
