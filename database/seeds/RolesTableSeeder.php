<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Admin';
        $admin_role->save();

        $executive_role = new Role();
        $executive_role->slug = 'executive';
        $executive_role->name = 'Executive';
        $executive_role->save();

        $hod_role = new Role();
        $hod_role->slug = 'hod';
        $hod_role->name = 'HOD';
        $hod_role->save();

        $staff_role = new Role();
        $staff_role->slug = 'staff';
        $staff_role->name = 'Staff';
        $staff_role->save();
    }
}
