<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
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
            'sender_id' => User::factory(),
            'receiver_id' => 7,
            'message' => $this->faker->paragraph(),
            'image' => '/images/posts/flat.jpg',
        ];
    }
}
