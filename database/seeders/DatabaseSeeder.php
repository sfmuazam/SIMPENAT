<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'id' => 'admin',
            'password' => bcrypt('admin')
        ]);

        $data_mapel = [
            ['nama_mapel' => 'Fisika'],
            ['nama_mapel' => 'Kimia'],
            ['nama_mapel' => 'Biologi'],
            ['nama_mapel' => 'Ekonomi'],
            ['nama_mapel' => 'Sosiologi'],
            ['nama_mapel' => 'Geografi'],
            ['nama_mapel' => 'Matematika Lanjut'],
            ['nama_mapel' => 'Informatika'],
            ['nama_mapel' => 'Bahasa Jepang'],
            ['nama_mapel' => 'Bahasa Inggris Lanjut'],
        ];

        $mapel = Mapel::insert($data_mapel);

        $data_kelas = [
            ['nama_kelas' => 'XI-01','mapel_peminatan' => 'Biologi, Fisika,Informatika,Kimia','kapasitas' => '36'],
            ['nama_kelas' => 'XI-02','mapel_peminatan' => 'Biologi,Ekonomi,Geografi,Kimia','kapasitas' => '36'],
            ['nama_kelas' => 'XI-03','mapel_peminatan' => '','kapasitas' => '36'],
            ['nama_kelas' => 'XI-04','mapel_peminatan' => '','kapasitas' => '36'],
            ['nama_kelas' => 'XI-05','mapel_peminatan' => '','kapasitas' => '36'],
            ['nama_kelas' => 'XI-06','mapel_peminatan' => '','kapasitas' => '36'],
            ['nama_kelas' => 'XI-07','mapel_peminatan' => '','kapasitas' => '36'],
            ['nama_kelas' => 'XI-08','mapel_peminatan' => '','kapasitas' => '36'],
            ['nama_kelas' => 'XI-09','mapel_peminatan' => '','kapasitas' => '36'],
            ['nama_kelas' => 'XI-10','mapel_peminatan' => '','kapasitas' => '36'],
        ];

        $kelas = Kelas::insert($data_kelas);
    }
}
