<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengguna::factory()->create([
            'nama' => 'Kepala Desa Padang Kalua',
            'nip' => '2004411876',
            'nomor_telepon' => '081987654321',
            'role' => 'kepala_desa',
            'email' => 'kepdes@sipandu.id',
            'password' => 'password',
        ]);
        Pengguna::factory()->create([
            'nama' => 'Admin Sipandu',
            'nip' => '2004411654',
            'nomor_telepon' => '081987654321',
            'role' => 'admin',
            'email' => 'admin@sipandu.id',
            'password' => 'password',
        ]);
    }
}
