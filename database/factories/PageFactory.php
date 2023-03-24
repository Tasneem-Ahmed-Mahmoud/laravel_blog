<?php

namespace Database\Factories;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Page>
 */
class PageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => implode('-',explode(' ', strtolower($title))),
            'content' => $this->faker->sentence(20),
            'keywords' => implode(',',explode(' ',$this->faker->sentence(5))),
            'description' => $this->faker->sentence(10),
            //
        ];
    }
}
