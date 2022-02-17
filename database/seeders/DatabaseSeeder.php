<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        \App\Models\Post::factory(30)->create();
        \App\Models\User::factory(30)->create();

        $blog_routes = Route::getRoutes();
        $permissions_ids = [];
        foreach ($blog_routes as $route) {
            if (strpos($route->getName(), 'admin') !== false) {
                $permission = \App\Models\Permission::create(['name' => $route->getName()]);
                $permissions_ids[] = $permission->id;
            }
        }

        \App\Models\Role::where('name', 'admin')->first()->permissions()->sync($permissions_ids);

        $this->call(TagSeeder::class);
        $tag = \App\Models\Tag::all();
        $images = preg_grep('~\.(jpeg|jpg)$~', scandir(public_path('storage/images')));
        \App\Models\Post::all()->each(function ($post) use ($tag, $images){
            $post->tag()->attach(
                $tag->random(rand(1,6))->pluck('id')->toArray()
            );
            $post->image()->create([
                'name' => Str::remove('.jpg',$images[array_rand($images)] ),
                'extension' => 'jpg',
                'path' => 'storage/images/' . $images[array_rand($images)],
            ]);
        });
        \App\Models\User::all()->each(function ($user) use ($images){

            $user->image()->create([
                'name' => Str::remove('.jpg',$images[array_rand($images)] ),
                'extension' => 'jpg',
                'path' => 'storage/images/' . $images[array_rand($images)],
            ]);
        });
        \App\Models\Comment::factory(60)->create();

    }
}
