<?php

namespace Database\Factories;

use App\Models\About;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutFactory extends Factory
{

    protected $model = About::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'about_first_text' => $this->faker->paragraph(),
            'about_second_text' => $this->faker->paragraph(),
            'about_first_image' => 'storage/images/about-img-1.jpg',
            'about_second_image' => 'storage/images/about-img-2.jpg',
            'about_our_vision' => $this->faker->paragraph(),
            'about_our_mission' => $this->faker->paragraph(),
            'about_services' => $this->faker->paragraph(),
        ];
    }
}
