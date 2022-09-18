<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PesantrenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $nama = 'PP ' . $this->faker->sentence(3);
        $random_number = rand(100, 600);

        return [
            'nama' => $nama,
            'slug' => Str::slug($nama),
            'pengasuh' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'jarak' => $random_number,
            'konsentrasi' => 'Tahfidz, Salaf, Reguler (Diniyyah Wustho, Ulya, Mahasiswa)',
            'jenjang' => 'SMP, SMA, SMK, Mahasiswa',
            'cp_pendaftaran' => $this->faker->phoneNumber(),
            'instagram' => $nama,
            'facebook' => $nama,
            'youtube' => $nama,
            'website' => $nama,
            'pa_pi' => 'PA/PI',
            'lurah_pa' => $this->faker->name(),
            'lurah_pi' => $this->faker->name(),
            'jumlah_santri_pa' => $random_number,
            'jumlah_santri_pi' => $random_number,
            'image' => $this->faker->imageUrl(640, 480),
            'content' => $this->faker->paragraph(10),
        ];
    }
}