<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $admin = new Role();
        $admin->name = "admin";
        $admin->save();

        $author = new Role();
        $author->name = "author";
        $author->save();

        $user = new Role();
        $user->name = "user";
        $user->save();
    }
}
