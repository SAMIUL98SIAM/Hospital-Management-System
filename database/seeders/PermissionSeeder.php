<?php

namespace Database\Seeders;
use App\Models\Admin\Module;
use App\Models\Admin\Permission;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moduleAppDashboard = Module::updateOrCreate(['name'=>'Dashboard']);

        Permission::updateOrCreate([
            'module_id' => $moduleAppDashboard->id ,
            'name' => 'Access Dashboard' ,
            'slug' => 'home'
        ]);


        //Roles
        $moduleAppRole = Module::updateOrCreate(['name' => 'Role Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id ,
            'name' => 'Access Role' ,
            'slug' => 'admin.roles.index'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id ,
            'name' => 'Create Role' ,
            'slug' => 'admin.roles.create'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id ,
            'name' => 'Edit Role' ,
            'slug' => 'admin.roles.edit'
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id ,
            'name' => 'Delete Role' ,
            'slug' => 'admin.roles.destroy'
        ]);
    }
}
