<?php

namespace Database\Factories;

use App\Models\Projects;
use App\Models\Tags;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectTag>
 */
class ProjectTagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $projects = Projects::inRandomOrder()->first();
        $tags = Tags::inRandomOrder()->first();

        return [
            'projects_id' => $projects->id,
            'tag_id' => $tags->id
        ];
    }
}
