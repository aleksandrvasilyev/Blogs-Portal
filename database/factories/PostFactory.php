<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Collection;
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
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'slug' => fake()->unique()->slug('4'),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'collection_id' => Collection::factory(),
            'excerpt' => fake()->paragraph(),
            'body' => fake()->paragraphs(5, true),
            'thumbnail' => fake()->imageUrl(640, 640, 'post'),
            'status' => 'published',
            'pinned' => false,
            'edited' => false,

        ];
    }
}
