<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'admin';
        $role_employee->description = 'Administrative User';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->name = 'affiliator';
        $role_manager->description = 'Affiliator User';
        $role_manager->save();
    }
}
