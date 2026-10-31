<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Buat Akun Admin
        \App\Models\User::create([
            'name' => 'Admin Pocinu',
            'username' => 'admin',
            'email' => 'admin@pocinu.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Buat Akun Guru
        \App\Models\User::create([
            'name' => 'Budi Guru',
            'username' => 'gurubudi',
            'email' => 'guru@pocinu.com',
            'password' => bcrypt('password'),
            'role' => 'teacher',
        ]);

        // Buat Akun Siswa
        \App\Models\User::create([
            'name' => 'Andi Siswa',
            'username' => 'andisiswa',
            'email' => 'siswa@pocinu.com',
            'password' => bcrypt('password'),
            'role' => 'student',
        ]);
    }
}
