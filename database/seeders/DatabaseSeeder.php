<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        $this->call(TagSeeder::class);
        $tag = \App\Models\Tag::all();
        $images = preg_grep('~\.(jpeg|jpg)$~', scandir(public_path('blog_template/images')));
        \App\Models\Post::all()->each(function ($post) use ($tag, $images){
            $post->tag()->attach(
                $tag->random(rand(1,6))->pluck('id')->toArray()
            );
            $post->image()->create([
                'name' => Str::remove('.jpg',$images[array_rand($images)] ),
                'extension' => 'jpg',
                'path' => '/blog_template/images/' . $images[array_rand($images)],
            ]);
        });
        \App\Models\User::all()->each(function ($user) use ($images){

            $user->image()->create([
                'name' => Str::remove('.jpg',$images[array_rand($images)] ),
                'extension' => 'jpg',
                'path' => '/blog_template/images/' . $images[array_rand($images)],
            ]);
        });
        \App\Models\Comment::factory(60)->create();

    }
}
