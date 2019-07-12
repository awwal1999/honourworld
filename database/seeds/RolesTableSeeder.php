<?php

use App\Role;
use Illuminate\Database\Seeder;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_admin = User::all()->first();

        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Admin';
        $admin_role->save();
        $admin_role->users()->attach($user_admin);

    }
}
