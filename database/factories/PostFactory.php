<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //


            'title'=> $this->faker->sentence(10),
            'content'=>  $this->faker->sentence(20 ) ,
            'description'=>   $this->faker->sentence(10 ),
            'user_id'=> User::all()->random()->id  ,
            'keywords'=> implode(',',explode(' ',$this->faker->sentence(5)) ) ,
            'image' =>$this->faker->image('storage/app/public/posts',400,300)
        ];
    }
}
