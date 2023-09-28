<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => '12341234',
            'role_id' => 1,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => '12341234',
            'role_id' => 2,
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'admin'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'user'
        ]);
        \App\Models\Siswa::factory()->create([
            'fullname' => 'aku budi',
            'nisn' => '0998898665',
            'nik' => '0987968565',
            'no_telp' => '09537808695',
            'asal_sekolah' => 'smp',
            'tinggal_bersama' => 'ortu',
            'alamat_siswa' => 'jl. batu',
            'nama_wali' => 'bapak budi',
            'alamat_wali' => 'jl. batu',    
            'domisili' => 'ponorogo',    
            'no_aktif' => '089889654654',    
            'id_jurusan' => 1,   
        ]);
        \App\Models\Jurusan::factory()->create([
            'name' => 'RPL',
            'image1' => 'no_image.jpg',
            'image2' => 'no_image.jpg',
            'image3' => 'no_image.jpg',
            'keterangan' => 'aku RPL'
        ]);
    }
}
