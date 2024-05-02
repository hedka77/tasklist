<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ 'title'            => fake()->sentence(4),
                 'description'      => fake()->paragraph,
                 'long_description' => fake()->paragraph(7, true),
                 'completed'        => fake()->boolean, ];
    }

    public function uncompleted(): static
    {
        return $this->state(fn(array $attributes) => [ 'completed' => false, ]);
    }

    public function long_title(): static
    {
        return $this->state(fn(array $attributes) => [ 'title' => fake()->sentence(10), ]);
    }
}
