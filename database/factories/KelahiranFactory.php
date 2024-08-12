<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelahiran>
 */
class KelahiranFactory extends Factory
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
            'nama' => $faker->name,
            'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
            'tempat_lahir' => $faker->city,
            'tanggal_lahir' => $faker->date,
            'jam_lahir' => $faker->time,
            'nama_ayah' => $faker->name('male'),
            'nama_ibu' => $faker->name('female'),
        ];
    }
}
