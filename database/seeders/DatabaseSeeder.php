<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Customer;
use App\Models\Employee;
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
            'passport_no' => '98754368749145',
            'member_id' => '123456789',
            'address' => 'Dhaka, Bangladesh',
            'source' => 'Robi bhai',
            'email' => 'luckyrobictg@gmail.com',
            'mobile' => '01613456789',
            'gender' => 'female',
        ]);
        Customer::factory(5)->create();

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
        Agent::factory(5)->create();

        Vendor::factory()->create([
           'vendor_name' => 'Vendor bhai',
           'mobile' => '01613456789',
           'address' => 'Dhaka, Bangladesh',
           'vendor_type' => 'Visa',
           'banks_details' => '123456789',
        ]);
        Vendor::factory(5)->create();

        Employee::factory()->create([
            'name' => 'Employee',
            'email' => 'robirobictg@gmail.com',
            'designation' => 'CEO',
            'salary' => '20000',
            'ta_da' => '200',
            'mobile' => '01613456789',
            'nid_no' => '870134567',
            'address' => 'Dhaka, Bangladesh',
            'bkash' => '01613456789',
            'banks_details' => '123456789',
        ]);

        Employee::factory(5)->create();
    }
}
