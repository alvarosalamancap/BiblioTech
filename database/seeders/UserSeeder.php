<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'rut' => '20259624-K',
            'name' => 'Francisco',
            'lastname' => 'Riquelme',
            'email' => 'pipipi@gmail.com',
            'password' => Hash::make('20259624K'),
            'phone' => '+56954545454',
            'role' => 'admin',  
            'register_date' => '0',   
        ]);
    }
}
