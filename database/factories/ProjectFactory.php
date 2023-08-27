<?php

namespace Database\Factories;

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
            'user_id' => 1,
            'name' => fake()->sentence(),
            'description' => '<p>' . implode('</p><p>', $this->faker->paragraphs(1)) . '</p>',
            'short_description' =>  '<p>' . $this->faker->sentence() . '</p>',
            'category_id' => Category::inRandomOrder()->first()->id,
            'site' => fake()->url(), // password

        ];
    }
}
