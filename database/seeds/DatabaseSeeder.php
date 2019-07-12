<?php

use App\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $category = new Category();
        $category->name = 'executive';
        $category->save();
        $category = new Category();
        $category->name = 'hod';
        $category->save();
        $category = new Category();
        $category->name = 'general';
        $category->save();
        factory('App\User', 6)->create();
        $this->call(RolesTableSeeder::class);
        

        factory('App\Agenda', 40)->create();
        factory('App\Meeting', 10)->create();

    }
}
