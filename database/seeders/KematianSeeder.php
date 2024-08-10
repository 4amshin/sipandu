<?php

namespace Database\Seeders;

use App\Models\Kematian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KematianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kematian::factory()->count(10)->create();
    }
}
