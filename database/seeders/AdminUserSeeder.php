<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mutiara',
            'email' => 'mutiara@gmail.com',
            'password' => Hash::make('mutiara123'), // Ganti dengan password yang kuat
            'role' => 'admin', // Tentukan role sebagai 'admin'
            'email_verified_at' => now(), // Anggap admin sudah terverifikasi
        ]);
    }
}
