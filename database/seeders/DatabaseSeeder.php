<?php

namespace Database\Seeders;

use App\Models\Jenjang;
use App\Models\Konsentrasi;
use App\Models\Pesantren;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create();
        // Pesantren::factory()->count(10)->create();

        $konsentrasis = ["Tahfidz Al-Qur'an", 'Salaf', 'Reguler (Diniyyah Wustho, Ulya, Mahasiswa)', 'Kajian kitab (Fiqih, Hadits, Nahwu, Shorof, Tasawuf, Aqidah, Akhlaq)', 'Kajian Kitab Kuning', "Tilawatul Qur'an", 'Bahasa'];
        for ($i = 0; $i < count($konsentrasis); $i++) {
            Konsentrasi::create([
                'name' => $konsentrasis[$i],
                'slug' => Str::slug($konsentrasis[$i]),
            ]);
        }

        $jenjangs = ['SMP', 'SMA', 'SMK', 'Kuliah', 'Umum'];
        for ($i = 0; $i < count($jenjangs); $i++) {
            Jenjang::create([
                'name' => $jenjangs[$i],
                'slug' => Str::slug($jenjangs[$i]),
            ]);
        }
    }
}