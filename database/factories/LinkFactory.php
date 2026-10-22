<?php

namespace Database\Factories;

use App\Models\Link;
use App\Models\User;
use App\Stream;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Link>
 */
class LinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(3),
            'stream' => fake()->randomElement(Stream::cases()),
            'url' => fake()->url(),
        ];
    }
}
