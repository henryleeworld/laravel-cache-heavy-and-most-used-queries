<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'        => fake()->unique()->sentence,
            'content'      => fake()->unique()->paragraph(6),
            'published_at' => null,
            'reviewed'     => fake()->randomElement([0, 1]),
        ];
    }
}
