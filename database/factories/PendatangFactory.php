<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendatang>
 */
class PendatangFactory extends Factory
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
            'nik' => $this->faker->unique()->numerify('###############'),
            'nama' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'tanggal_datang' => $this->faker->date(),
            'nama_pelapor' => $this->faker->name,
        ];
    }
}
