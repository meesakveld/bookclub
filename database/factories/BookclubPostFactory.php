<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookclubPost>
 */
class BookclubPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->paragraphs(6, true),
            'bookclub_id' => fake()->numberBetween(1, 25),
            'user_id' => fake()->numberBetween(1, 2),
            'book_id' => fake()->numberBetween(1, 600),
        ];
    }
}
