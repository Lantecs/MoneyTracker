<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserBudgets; // Make sure to import the correct model
use Illuminate\Database\Eloquent\Factories\Factory;

class UserBudgetsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            // 'user_id' => User::factory()->create()->id,  // Create a new user and use its ID
            'budget_type' => $this->faker->text(10), // Use the faker property of the Factory instance
            'category' => $this->faker->randomElement(['Education', 'Entertainment', 'Food', 'Health', 'Miscellaneous', 'Shopping', 'Transportation', 'Utilities']),
            'amount' => $this->faker->randomFloat(2, 0, 999999.99), // Adjust the range as needed
            'date' => now(),
        ];
    }
}
