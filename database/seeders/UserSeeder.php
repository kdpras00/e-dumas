<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rt = \App\Models\Rt::where('rt', '01')->first();
        
        if (!$rt) {
            return;
        }

        // Admin
        \App\Models\User::firstOrCreate(
            ['username' => 'admin'],
            [
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'nama_lengkap' => 'Admin System',
                'user_level_id' => \App\Models\UserLevel::where('user_level', 'Admin')->first()->id,
                'rt_id' => $rt->id,
                'alamat' => 'Kantor Kelurahan',
                'no_hp' => '081234567890',
                'nik' => '1234567890123456',
            ]
        );

        // Petugas
        \App\Models\User::firstOrCreate(
            ['username' => 'petugas'],
            [
                'email' => 'petugas@example.com',
                'password' => bcrypt('password'),
                'nama_lengkap' => 'Petugas Infrastruktur',
                'user_level_id' => \App\Models\UserLevel::where('user_level', 'Petugas')->first()->id,
                'kategori_id' => \App\Models\Kategori::where('kategori', 'Infrastruktur')->first()->id,
                'rt_id' => $rt->id,
                'alamat' => 'Kantor Kelurahan',
                'no_hp' => '081234567891',
                'nik' => '1234567890123457',
            ]
        );

        // Warga
        \App\Models\User::firstOrCreate(
            ['username' => 'warga'],
            [
                'email' => 'warga@example.com',
                'password' => bcrypt('password'),
                'nama_lengkap' => 'Warga Biasa',
                'user_level_id' => \App\Models\UserLevel::where('user_level', 'Masyarakat')->first()->id,
                'rt_id' => $rt->id,
                'alamat' => 'Jl. Warga No. 1',
                'no_hp' => '081234567892',
                'nik' => '1234567890123458',
            ]
        );

        // Kepala Kelurahan
        \App\Models\User::firstOrCreate(
            ['username' => 'kepala'],
            [
                'email' => 'kepala@example.com',
                'password' => bcrypt('password'),
                'nama_lengkap' => 'Pak Lurah',
                'user_level_id' => \App\Models\UserLevel::where('user_level', 'Kepala Kelurahan')->first()->id,
                'rt_id' => $rt->id,
                'alamat' => 'Rumah Dinas',
                'no_hp' => '081234567893',
                'nik' => '1234567890123459',
            ]
        );
    }
}
