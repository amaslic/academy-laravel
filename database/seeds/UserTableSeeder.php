<?php

use App\Role;
use App\User;
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
        $adminRole = Role::where('name', 'admin')->first();
        $affRole  = Role::where('name', 'affiliator')->first();

        $adminUser = new User();
        $adminUser->name = 'Super Admin';
        $adminUser->email = 'thisinfoms@gmail.com';
        $adminUser->password = bcrypt('password123456');
        $adminUser->save();
        $adminUser->roles()->attach($adminRole);

        $aff = new User();
        $aff->name = 'Super Affiliator';
        $aff->email = 'thisinforms@gmail.com';
        $aff->password = bcrypt('password123456');
        $aff->save();
        $aff->roles()->attach($affRole);
    }
}
