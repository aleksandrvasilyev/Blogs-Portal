<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Follow;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Follow>
 */
class FollowFactory extends Factory
{

    protected $model = Follow::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $followable = $this->followable();

        return [
            'user_id' => User::factory(),
            'followable_id' => $followable::factory(),
            'followable_type' => $followable,
        ];
    }

    public function followable()
    {
        return $this->faker->randomElement([
            Tag::class,
            Category::class,
        ]);
    }
}
