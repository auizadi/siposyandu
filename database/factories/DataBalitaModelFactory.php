<?php

namespace Database\Factories;

use App\Models\DataBalitaModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DataBalitaModel>
 */
class DataBalitaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $faker;

    protected $model = DataBalitaModel::class;

    public function __construct(){
        parent::__construct();
        $this->faker = \Faker\Factory::create('id_ID');
    }

    public function definition(): array
    {
        $jenisKelamin = $this->faker->randomElement(['Laki-laki','Perempuan']);

        $namaAnak = $jenisKelamin === 'Laki-laki' ? $this->faker->firstNameMale() : $this->faker->firstNameFemale();

        return [
            'nik_anak' => $this->faker->numerify('##############'),
            'nama_anak' => $namaAnak .= ' ' . $this->faker->lastName(),
            'jenis_kelamin' => $jenisKelamin,
            'tanggal_lahir' => $this->faker->dateTimeBetween('-5 years', '-1 years')->format('d-m-Y'),
            'nama_ayah' => $this->faker->firstNameMale(),
            'nama_ibu' => $this->faker->firstNameFemale(),
            'alamat' => $this->faker->address(),
        ];
    }
}
