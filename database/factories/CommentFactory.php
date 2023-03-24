<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'    => $this->faker->name,
        'email'   => $this->faker->email,
        'content' => $this->faker->paragraph(3),
        'post_id' => Post::all()->random()->id,
        'user_id' => User::all()->random()->id,
        'approved'=> $this->faker->boolean,
        ];
    }
}
