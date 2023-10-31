<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HomepageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'occupation' => 'UI/UX Designer <br>
            Graphic Designer',
            'first_text' => 'Passionate UI/UX and Graphic Designer, committed to improving user experiences and eager to merge graphic and product design skills for a dynamic career.',
            'second_text' => 'Creative problem solver who crafts intuitive designs, bringing together form and function to elevate user interactions and leave a lasting impression.',
            'text_footer' => 'Handcrafted by AP. using a sketchbook, Figma & the millions of lines of code by Thiago Alves',
            'email' => 'alexandrepiedad@gmail.com',
            'phone' => '+351 <span style="font-weight:500;">913 748 996</span>',
        ];
    }
}
