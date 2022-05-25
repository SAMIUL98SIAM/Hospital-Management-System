<?php

namespace Database\Seeders;

use App\Models\Admin\Permission;
use App\Models\Admin\Role;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permissions = Permission::all();
        Role::updateOrCreate(['name' => 'Admin', 'slug' => 'admin', 'deletable' => false])
            ->permissions()
            ->sync($admin_permissions->pluck('id'));


        Role::updateOrCreate(['name' => 'Manager', 'slug' => 'manager', 'deletable' => false]);

    }
}
