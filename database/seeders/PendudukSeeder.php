<?php

namespace Database\Seeders;

use App\Models\Penduduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penduduk::factory()->count(4)->create();
    }
}
