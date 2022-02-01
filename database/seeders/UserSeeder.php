<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@abah.com';
        $admin->email_verified_at = now();
        $admin->role_id = 1;
        $admin->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $admin->remember_token = Str::random(10);
        $admin->save();

        $author = new User();
        $author->name = 'author';
        $author->email = 'author@abah.com';
        $author->email_verified_at = now();
        $author->role_id = 2;
        $author->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $author->remember_token = Str::random(10);
        $author->save();

        $user = new User();
        $user->name = 'user';
        $user->email = 'user@abah.com';
        $user->email_verified_at = now();
        $user->role_id = 3;
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
