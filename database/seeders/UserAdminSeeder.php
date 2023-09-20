<?php

namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'role' => 'admin',
            'name' => 'Osvaldo',
            'email' => 'osvaldo@petcare.com',
            'password' => Hash::make('//password'),
            'birth_date' => '1990-01-01',
            'phone' => '999999999',
            'address' => '619 Decatur StBrooklyn, NY 11233, EUA',
            'work_period' => 'full_time',
        ]);
    }
}
