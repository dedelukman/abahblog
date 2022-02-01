<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'the_comment' => $title = $this->faker->sentence(10),
            'post_id' => rand(1,30),
            'user_id' => rand(3,30),
        ];
    }
}
