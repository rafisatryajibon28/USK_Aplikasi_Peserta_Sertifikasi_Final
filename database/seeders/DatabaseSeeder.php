<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Skema;
use App\Models\Peserta;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin default
        User::create([
            'name'     => 'Administrator',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role'     => 'admin',
        ]);

        // User biasa
        User::create([
            'name'     => 'User Demo',
            'email'    => 'user@gmail.com',
            'password' => Hash::make('user123'),
            'role'     => 'user',
        ]);

        // Data skema contoh
        $skema1 = Skema::create([
            'kode_skema' => 'JWD-001',
            'nama_skema' => 'Junior Web Developer',
            'deskripsi'  => 'Skema sertifikasi untuk kemampuan pemrograman web dasar.',
        ]);

        $skema2 = Skema::create([
            'kode_skema' => 'JMD-001',
            'nama_skema' => 'Junior Mobile Developer',
            'deskripsi'  => 'Skema sertifikasi pengembangan aplikasi mobile.',
        ]);

        $skema3 = Skema::create([
            'kode_skema' => 'JDA-001',
            'nama_skema' => 'Junior Data Analyst',
            'deskripsi'  => 'Skema sertifikasi analisis data dasar.',
        ]);

        // Data peserta contoh
        Peserta::create([
            'nama'     => 'Muhammad Rafi Satrya',
            'nik'      => '00936571823',
            'email'    => 'rafisatrya57@gmail.com',
            'no_hp'    => '085780192110',
            'alamat'   => 'Jatiwaringin',
            'skema_id' => $skema1->id,
        ]);

        Peserta::create([
            'nama'     => 'Fayola Evangeline Sidik',
            'nik'      => '008230071621',
            'email'    => 'fayyyola0@gmail.com',
            'no_hp'    => '085432572818',
            'alamat'   => 'Pondok Bambu',
            'skema_id' => $skema3->id,
        ]);

        Peserta::create([
            'nama'     => 'Haura Ruzi Resandriya',
            'nik'      => '00876557718',
            'email'    => 'hauraruzi@gmail.com',
            'no_hp'    => '08315267498',
            'alamat'   => 'Lubang Buaya',
            'skema_id' => $skema2->id,
        ]);
    }
}
