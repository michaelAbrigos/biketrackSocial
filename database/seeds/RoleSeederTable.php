<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'bike_user']);
        $role2 = Role::create(['name' => 'peers']);
        $role3 = Role::create(['name' => 'admin']);
        $permission1 = Permission::create(['name'=>'View Map']);
        $permission2 = Permission::create(['name'=>'Search History']);
    }
}
