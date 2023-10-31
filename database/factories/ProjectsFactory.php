<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class ProjectsFactory extends Factory
{
    protected static $numberAsc = 1;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => 'Title Project - ' . static::$numberAsc++,
            'slug' => 'title-project',
            'description' => $this->faker->text(400),
            'order' => static::$numberAsc++
        ];
    }
}
