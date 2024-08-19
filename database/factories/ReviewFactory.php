<?php

namespace Database\Factories;


use App\Models\Film;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::select('id')->get()->toArray();
        return [
            'rates' => fake()->numberBetween(0, 10),
            'review_content' => fake()->paragraph(),
            'movie_id' => fake()->unique()->numberBetween(0, 18),
            'user_id' => fake()->randomElement(User::pluck('id', 'id')->toArray()),
            'like' => 0,
        ];
    }
}
