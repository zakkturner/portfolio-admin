<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Project;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => fake()->sentence(),
            'description' => fake()->realText(200),
            'short_description' =>  fake()->realText(100),
            'category_id' => Category::factory(),
            'site' => fake()->url(), // password
            'freelance' => $this->faker->boolean(),
            'personal' => $this->faker->boolean(),

        ];
    }
}
