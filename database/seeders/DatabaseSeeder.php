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
            'password' => bcrypt('admin'),
            'cover' => 'default.jpg',
            'status' => 'Aktif'
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
            ['nama_mapel' => 'Prakarya'],
        ];

        $mapel = Mapel::insert($data_mapel);

        $data_kelas = [
            ['nama_kelas' => 'XI-01', 'mapel_peminatan' => 'Biologi,Fisika,Bahasa Jepang,Kimia', 'mapel_penilaian' => 'biologi,fisika,kimia', 'kapasitas' => '36'],
            ['nama_kelas' => 'XI-02', 'mapel_peminatan' => 'Fisika,Biologi,Bahasa Inggris Lanjut,Kimia', 'mapel_penilaian' => 'fisika,biologi,bahasa_inggris,kimia', 'kapasitas' => '36'],
            ['nama_kelas' => 'XI-03', 'mapel_peminatan' => 'Fisika,Informatika,Matematika Lanjut,Bahasa Jepang', 'mapel_penilaian' => 'fisika,informatika,matematika', 'kapasitas' => '36'],
            ['nama_kelas' => 'XI-04', 'mapel_peminatan' => 'Kimia,Biologi,Sosiologi,Bahasa Inggris Lanjut', 'mapel_penilaian' => 'kimia,biologi,sosiologi,bahasa_inggris', 'kapasitas' => '36'],
            ['nama_kelas' => 'XI-05', 'mapel_peminatan' => 'Informatika,Matematika Lanjut,Biologi,Ekonomi', 'mapel_penilaian' => 'informatika,matematika,biologi,ekonomi', 'kapasitas' => '36'],
            ['nama_kelas' => 'XI-06', 'mapel_peminatan' => 'Geografi,Sosiologi,Biologi,Bahasa Inggris Lanjut', 'mapel_penilaian' => 'geografi,sosiologi,biologi,bahasa_inggris', 'kapasitas' => '36'],
            ['nama_kelas' => 'XI-07', 'mapel_peminatan' => 'Ekonomi,Informatika,Matematika Lanjut, Bahasa Inggris Lanjut', 'mapel_penilaian' => 'ekonomi,informatika,matematika,bahasa_inggris', 'kapasitas' => '36'],
            ['nama_kelas' => 'XI-08', 'mapel_peminatan' => 'Ekonomi,Geografi,Sosiologi,Bahasa Jepang', 'mapel_penilaian' => 'ekonomi,geografi,sosiologi', 'kapasitas' => '36'],
            ['nama_kelas' => 'XI-09', 'mapel_peminatan' => 'Ekonomi,Geografi,Sosiologi,Informatika', 'mapel_penilaian' => 'ekonomi,geografi,sosiologi,informatika', 'kapasitas' => '36'],
            ['nama_kelas' => 'XI-10', 'mapel_peminatan' => 'Ekonomi,Sosiologi,Informatika,Bahasa Inggris Lanjut', 'mapel_penilaian' => 'ekonomi,sosiologi,informatika,bahasa_inggris', 'kapasitas' => '36'],
        ];

        $kelas = Kelas::insert($data_kelas);
    }
}
