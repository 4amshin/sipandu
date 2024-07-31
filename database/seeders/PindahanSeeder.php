<?php

namespace Database\Seeders;

use App\Models\Pindahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PindahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pindahan::factory()->count(24)->create();
    }
}
