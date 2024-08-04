<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Customer;
use App\Models\User;
use App\Models\Vendor;
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

        Agent::factory()->create([
            'company_name' => 'Robi bhai',
            'ceo_name' => 'Ceo bhai',
            'email' => 'robirobictg@gmail.com',
            'mobile' => '01613456789',
            'address' => 'Dhaka, Bangladesh',
            'trade_license_no' => '123456789',
            'nid_no' => '98754368749145',
            'banks_details' => '123456789',
        ]);

        Vendor::factory()->create([
           'vendor_name' => 'Vendor bhai',
           'mobile' => '01613456789',
           'address' => 'Dhaka, Bangladesh',
           'vendor_type' => 'Visa',
           'banks_details' => '123456789',
        ]);
    }
}
