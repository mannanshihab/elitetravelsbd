<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('323232'),
        ]);


        Customer::factory()->create([
            'name' => 'Lucky Akhter',
            'date_of_birth' => '10-02-1996',
            'passport' => '98754368749145',
            'member_id' => '123456789',
            'address' => 'Dhaka, Bangladesh',
            'source' => 'Robi bhai',
            'email' => 'luckyrobictg@gmail.com',
            'mobile' => '01613456789',
            'gender' => 'female',
        ]);
    }
}
