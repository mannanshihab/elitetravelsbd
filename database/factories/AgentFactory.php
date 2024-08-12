<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agent>
 */
class AgentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => fake()->name,
            'ceo_name' => fake()->name,
            'email' => fake()->unique()->safeEmail(),
            'mobile' => '01613456789',
            'address' => 'Dhaka, Bangladesh',
            'trade_license_no' => '123456789',
            'nid_no' => '98754368749145',
            'banks_details' => '123456789',
        ];
    }
}
