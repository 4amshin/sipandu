<?php

namespace Database\Seeders;

use App\Models\Pendatang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendatangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pendatang::factory()->count(109)->create();
    }
}
