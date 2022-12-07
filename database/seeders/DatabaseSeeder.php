<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Bill::factory(10)->create();
        \App\Models\Dose::factory(10)->create();
        $patient = Role::create(['name' => 'patient']);
        $doctor = Role::create(['name' => 'doctor']);
        $admin = Role::create(['name' => 'admin']);







        $create = Permission::create(['name' => 'create']);
        $edit = Permission::create(['name' => 'edit']);
        $view = Permission::create(['name' => 'view']);
        $delete = Permission::create(['name' => 'delete']);

        $doctor->givePermissionTo($edit, $view, $create);
        $admin->givePermissionTo($edit, $view, $create, $delete);





    }
}
