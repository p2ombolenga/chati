<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'user_id' => User::factory(),
            'slug' => $this->faker->slug(),
            'body' => $this->faker->realText(200),
            'image' => 'images/posts/flat.jpg',
        ];
    }
}
