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

        $noKKList = [
            '1234567890123456', '2345678901234567', '3456789012345678', '4567890123456789',
            // '5678901234567890', '6789012345678901', '7890123456789012', '8901234567890123',
            // '9012345678901234', '0123456789012345', '2233445566778899', '3344556677889900',
            // '4455667788990011', '5566778899001122', '6677889900112233', '7788990011223344',
            // '8899001122334455', '9900112233445566', '0011223344556677', '1122334455667788',
            // '2233445566778899', '3344556677889900', '4455667788990011', '5566778899001122',
            // '6677889900112233'
        ];

        return [
            'nik' => $faker->numerify('################'),
            // 'no_kk' => $faker->numerify('################'),
            'no_kk' => $faker->randomElement($noKKList),
            'nama' => $faker->name,
            'role' => $faker->randomElement(['kepala_keluarga', 'anggota_keluarga']),
            'jenis_kelamin' => $faker->randomElement(['laki-laki', 'perempuan']),
            'tempat_lahir' => $faker->city,
            'tanggal_lahir' => $faker->date(),
            'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
            'status_pernikahan' => $faker->randomElement(['kawin', 'belum_kawin']),
            'pendidikan' => $faker->company,
            'pekerjaan' => $faker->jobTitle,
            'rt' => $faker->numberBetween(1, 20),
            'rw' => $faker->numberBetween(1, 20),
            'dusun' => $faker->randomElement(['Salu Patani', 'Batu Tongkon', 'Toro']),
            'nama_ayah' => $this->faker->name('male'),
            'nama_ibu' => $this->faker->name('female'),
        ];
    }
}
