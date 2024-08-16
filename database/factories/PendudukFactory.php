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
        $faker = FakerFactory::create('id_ID');

        return [
            'nik' => $faker->numerify('################'),
            'no_kk' => $faker->numerify('################'),
            'nama' => $faker->name,
            'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
            'tempat_lahir' => $faker->city,
            'tanggal_lahir' => $faker->date(),
            'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
            'status_pernikahan' => $faker->randomElement(['kawin', 'belum_kawin']),
            'pendidikan' => $faker->company,
            'pekerjaan' => $faker->jobTitle,
            'rt' => $faker->numberBetween(1, 20),
            'rw' => $faker->numberBetween(1, 20),
            'dusun' => $faker->streetName,
            'nama_ayah' => $this->faker->name('male'),
            'nama_ibu' => $this->faker->name('female'),
        ];
    }
}
