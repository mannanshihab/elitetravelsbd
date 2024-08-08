<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vendor_name' => fake()->word,
            'mobile' => fake()->phoneNumber,
            'address' => fake()->address,
            'vendor_type' => fake()->randomElement(['Service Charge', 'Visa Fee']),
            'banks_details' => fake()->bankAccountNumber,
        ];
    }
}
