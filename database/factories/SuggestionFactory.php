<?php

namespace Database\Factories;

use App\Enums\SuggestionStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Suggestion>
 */
class SuggestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(3);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->paragraph(),
            'owner_id' => 1,
            'user_id' => User::inRandomOrder()->first()->id,
            'status' => fake()->randomElement(SuggestionStatus::values()),
        ];
    }
}
