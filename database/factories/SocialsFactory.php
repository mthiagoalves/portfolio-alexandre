<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Socials>
 */
class SocialsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'social_name' => 'BEHANCE',
            'link' => '#'
        ];
    }

    public function linkedin()
    {
        return $this->state(function (array $attributes) {
            return [
                'social_name' => 'LINKEDIN',
            ];
        });
    }
}
