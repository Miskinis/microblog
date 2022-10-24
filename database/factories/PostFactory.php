<?php

namespace Database\Factories;

use App\Models\User;
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
        fake()->addProvider(new \DavidBadura\FakerMarkdownGenerator\FakerProvider(fake()));

        return array(
            'user_id' => User::factory(),
            'title' => fake()->sentence,
            'content' => fake()->markdown(),
            'img' => 'https://source.unsplash.com/collection/1346951/1000x500?sig=' . rand(1, 100),
            'is_public' => true
        );
    }
}
