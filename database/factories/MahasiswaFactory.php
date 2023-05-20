<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nim' => $this->faker->randomNumber(8, 10),
            'nama' => $this->faker->name(),
            'prodi' =>$this->faker->randomElement([
                'Akutansi', 
                'Arsitek',
                'Informatika',
                'Manajemen',
                'Sistem Informasi',
            ]),
            'alamat' => $this->faker->address(),
            'jenis_kelamin' => $this->faker->randomElement([
                'Laki-laki', 
                'Perempuan'
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
