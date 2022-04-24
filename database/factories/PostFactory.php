<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Category::factory(),
            'slug' => $this->faker->slug,
            'title' => $this->faker->sentence,
            'excerpt' => implode(' ', $this->faker->paragraphs(2)),
            'body' => implode(' ', $this->faker->paragraphs(6))
            // 'excerpt' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            // 'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>'
        ];
    }
}
