<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{

    protected $model = Like::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $likeable = $this->likeable();

        return [
            'user_id' => User::factory(),
            'likeable_id' => $likeable::factory(),
            'likeable_type' => $likeable,
        ];
    }

    public function likeable()
    {
        return $this->faker->randomElement([
            Post::class,
            Comment::class,
        ]);
    }

}
