<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Siswa;

class NilaiImport implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $input = [];
            if (isset($row['agama'])) {
                $input['agama'] = $row['agama'];
            }
            if (isset($row['pkn'])) {
                $input['pkn'] = $row['pkn'];
            }
            if (isset($row['bahasa_indonesia'])) {
                $input['bahasa_indonesia'] = $row['bahasa_indonesia'];
            }
            if (isset($row['bahasa_inggris'])) {
                $input['bahasa_inggris'] = $row['bahasa_inggris'];
            }
            if (isset($row['matematika'])) {
                $input['matematika'] = $row['matematika'];
            }
            if (isset($row['fisika'])) {
                $input['fisika'] = $row['fisika'];
            }
            if (isset($row['kimia'])) {
                $input['kimia'] = $row['kimia'];
            }
            if (isset($row['biologi'])) {
                $input['biologi'] = $row['biologi'];
            }
            if (isset($row['ekonomi'])) {
                $input['ekonomi'] = $row['ekonomi'];
            }
            if (isset($row['geografi'])) {
                $input['geografi'] = $row['geografi'];
            }
            if (isset($row['sosiologi'])) {
                $input['sosiologi'] = $row['sosiologi'];
            }
            if (isset($row['penjaskes'])) {
                $input['penjaskes'] = $row['penjaskes'];
            }
            if (isset($row['seni_budaya'])) {
                $input['seni_budaya'] = $row['seni_budaya'];
            }
            if (isset($row['sejarah_indonesia'])) {
                $input['sejarah_indonesia'] = $row['sejarah_indonesia'];
            }
            if (isset($row['informatika'])) {
                $input['informatika'] = $row['informatika'];
            }
            if (isset($row['bahasa_jawa'])) {
                $input['bahasa_jawa'] = $row['bahasa_jawa'];
            }
            if (isset($row['prakarya'])) {
                $input['prakarya'] = $row['prakarya'];
            }
            if (isset($row['bimbingan_konseling'])) {
                $input['bimbingan_konseling'] = $row['bimbingan_konseling'];
            }
            Siswa::where('nis', $row['nis'])->update($input);
        }
    }
}
