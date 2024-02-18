<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Hide;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hide>
 */
class HideFactory extends Factory
{
    protected $model = Hide::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hideable = $this->hideable();

        return [
            'user_id' => User::factory(),
            'hideable_id' => $hideable::factory(),
            'hideable_type' => $hideable,
        ];


    }

    public function hideable()
    {
        return $this->faker->randomElement([
            Tag::class,
            Category::class,
        ]);
    }
}
