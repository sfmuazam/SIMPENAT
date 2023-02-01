<?php

namespace App\Imports;

use App\Models\Siswa;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements WithHeadingRow, ToCollection
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function model(array $row)
    // {
    //     return new Siswa([
    //         'nis' => $row['nis'],
    //         'nama' => $row['nama'],
    //         'kelas' => $row['kelas'],
    //     ]);
    // }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            User::updateOrCreate(
                ['id' => $row['nis']],
                [
                'id' => $row['nis'],
                'name' => ucwords(strtolower($row['nama'])),
                'password' => bcrypt($row['nis'])
            ]
        );
            Siswa::updateOrCreate(
                [
                    'nis' => $row['nis'],
                ],
                [
                    'nisn' => $row['nisn'],
                    'nama' => ucwords(strtolower($row['nama'])),
                    'kelas' => $row['kelas'],
                ]
            );
        }
    }
}
