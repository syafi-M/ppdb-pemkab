<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => fake(),
            'nisn' => fake(),
            'nik' => fake(),
            'no_telp' => fake(),
            'asal_sekolah' => fake(),
            'tinggal_bersama' => fake(),
            'alamat_siswa' => fake(),
            'nama_wali' => fake(),
            'alamat_wali' => fake(),    
            'domisili' => fake(),    
            'no_aktif' => fake(),    
            'id_jurusan' => fake(),    
        ];
    }
}
