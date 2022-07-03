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
    public function definition()
    {
        return [
            'title'        => $this->faker->unique()->sentence,
            'content'      => $this->faker->unique()->paragraph(6),
            'published_at' => null,
            'reviewed'     => $this->faker->randomElement([0, 1]),
        ];
    }
}
