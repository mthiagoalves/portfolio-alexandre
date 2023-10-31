<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tags>
 */
class TagsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'UI/UX Design',
            'slug' => 'ui-ux'
        ];
    }

    public function webDesign()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Web Design',
                'slug' => 'web-design'
            ];
        });
    }

    public function creativeDesign()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Creative Design',
                'slug' => 'creative-design'
            ];
        });
    }
}
