<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'username' => 'superadmin',
            'nama' => 'Admin Utama',
            'password' => bcrypt('absen.admin1'),
            'role' => 'admin',
        ]);
    }
}
