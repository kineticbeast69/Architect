<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "email" => fake()->unique()->safeEmail(),
            "phone_number" => fake()->phoneNumber(),
            "subject" => fake()->text(100),
            "message" => fake()->paragraph(),
            "submitted_at" => fake()->dateTime(),
            "status" => fake()->randomElement(["new", "in-progress", "resolved"])
        ];
    }
}
