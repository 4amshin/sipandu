<?php

namespace Database\Seeders;

use App\Models\Kelahiran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelahiranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelahiran::factory()->count(10)->create();
    }
}
