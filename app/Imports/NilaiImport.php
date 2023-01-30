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
                $input['indo'] = $row['bahasa_indonesia'];
            }
            if (isset($row['bahasa_inggris'])) {
                $input['inggris'] = $row['bahasa_inggris'];
            }
            if (isset($row['matematika'])) {
                $input['mtk'] = $row['matematika'];
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
                $input['eko'] = $row['ekonomi'];
            }
            if (isset($row['geografi'])) {
                $input['geo'] = $row['geografi'];
            }
            if (isset($row['sosiologi'])) {
                $input['sosio'] = $row['sosiologi'];
            }
            if (isset($row['penjaskes'])) {
                $input['penjas'] = $row['penjaskes'];
            }
            if (isset($row['seni_budaya'])) {
                $input['seni'] = $row['seni_budaya'];
            }
            if (isset($row['sejarah_indonesia'])) {
                $input['sejarah'] = $row['sejarah_indonesia'];
            }
            if (isset($row['informatika'])) {
                $input['if'] = $row['informatika'];
            }
            if (isset($row['bahasa_jawa'])) {
                $input['jawa'] = $row['bahasa_jawa'];
            }
            if (isset($row['prakarya'])) {
                $input['prakarya'] = $row['prakarya'];
            }
            if (isset($row['bimbingan_konseling'])) {
                $input['bk'] = $row['bimbingan_konseling'];
            }
            Siswa::where('nis', $row['nis'])->update($input);
        }
    }
}
