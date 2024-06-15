<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penduduk>
 */
class PendudukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = FakerFactory::create('id_ID'); // Menggunakan locale Indonesia

        return [
            'nik' => $faker->numerify('################'), // 16 digit angka
            'no_kk' => $faker->numerify('################'), // 16 digit angka
            'nama' => $faker->name,
            'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
            'rt' => $faker->numberBetween(1, 20),
            'rw' => $faker->numberBetween(1, 20),
            'kelurahan' => $faker->streetName,
            'kecamatan' => $faker->streetName,
            'kota' => $faker->city,
            'provinsi' => $faker->state,
        ];
    }
}
