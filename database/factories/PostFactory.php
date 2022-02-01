<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $title = $this->faker->sentence(10),
            'slug' => Str::slug($title),
            'body' => $this->faker->sentence(100),
            'user_id' => rand(1,2),
            'category_id' => rand(1,4),
        ];
    }
}
