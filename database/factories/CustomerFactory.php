<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'date_of_birth' => fake()->date,
            'passport_no' => '98754368749145',
            'member_id' => '123456789',
            'address' => 'Dhaka, Bangladesh',
            'source' => 'Robi bhai',
            'email' => fake()->unique()->safeEmail(),
            'mobile' => '01613456789',
            'gender' => fake()->randomElement(['female', 'male']),
        ];
    }
}
