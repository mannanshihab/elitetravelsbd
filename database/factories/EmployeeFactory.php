<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
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
            'email' => fake()->unique()->safeEmail(),
            'designation' => 'CEO',
            'salary' => '20000',
            'ta_da' => '200',
            'mobile' => '01613456789',
            'nid_no' => '870134567',
            'address' => 'Dhaka, Bangladesh',
            'bkash' => '01613456789',
            'banks_details' => '123456789',
        ];
    }
}
