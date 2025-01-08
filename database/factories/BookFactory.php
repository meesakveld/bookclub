<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->company(),
            'description' => fake()->paragraph(),
            'image_url' => "books/book-" . fake()->numberBetween(1, 12) . ".jpg",
            'author_id' => fake()->numberBetween(1, 500),
            'published_at' => fake()->date(),
        ];
    }
}
