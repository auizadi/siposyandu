<?php

namespace Database\Factories;

use App\Models\DataLansia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DataLansia>
 */
class DataLansiaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $faker;

    protected $model = DataLansia::class;

    public function __construct()
    {
        parent::__construct();
        $this->faker = \Faker\Factory::create('id_ID');
    }

    public function definition(): array
    {
        $jenisKelamin = $this->faker->randomElement(['Laki-laki','Perempuan']);
        $namaLansia = $jenisKelamin === 'Laki-laki' ? $this->faker->firstNameMale() : $this->faker->firstNameFemale();
        return [
            'nik_lansia' => $this->faker->numerify('##############'),
            'nama_lansia' => $namaLansia .= ' ' . $this->faker->lastName(),
            'tanggal_lahir' => $this->faker->dateTimeBetween('-95 years', '-60 years')->format('d-m-Y'),
            'jenis_kelamin' => $jenisKelamin,
            'alamat' => $this->faker->address(),
            'riwayat_kesehatan' => $this->faker->randomElement(['sehat', 'kurang sehat'])
        ];
    }
}
