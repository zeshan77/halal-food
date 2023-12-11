<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'slug' => $this->faker->unique()->slug,
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
            'published_at' => now(),
            'is_reviewed' => $this->faker->randomNumber([0, 1]),
            'meta' => ['impressions' => 1000, 'visits' => 250],
        ];
    }
}
