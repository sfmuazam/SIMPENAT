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
            if (isset($row['agama_uts'])) {
                $input['agama_uts'] = $row['agama_uts'];
            }
            if (isset($row['pkn_uts'])) {
                $input['pkn_uts'] = $row['pkn_uts'];
            }
            if (isset($row['bahasa_indonesia_uts'])) {
                $input['bahasa_indonesia_uts'] = $row['bahasa_indonesia_uts'];
            }
            if (isset($row['bahasa_inggris_uts'])) {
                $input['bahasa_inggris_uts'] = $row['bahasa_inggris_uts'];
            }
            if (isset($row['matematika_uts'])) {
                $input['matematika_uts'] = $row['matematika_uts'];
            }
            if (isset($row['fisika_uts'])) {
                $input['fisika_uts'] = $row['fisika_uts'];
            }
            if (isset($row['kimia_uts'])) {
                $input['kimia_uts'] = $row['kimia_uts'];
            }
            if (isset($row['biologi_uts'])) {
                $input['biologi_uts'] = $row['biologi_uts'];
            }
            if (isset($row['ekonomi_uts'])) {
                $input['ekonomi_uts'] = $row['ekonomi_uts'];
            }
            if (isset($row['geografi_uts'])) {
                $input['geografi_uts'] = $row['geografi_uts'];
            }
            if (isset($row['sosiologi_uts'])) {
                $input['sosiologi_uts'] = $row['sosiologi_uts'];
            }
            if (isset($row['penjaskes_uts'])) {
                $input['penjaskes_uts'] = $row['penjaskes_uts'];
            }
            if (isset($row['seni_budaya_uts'])) {
                $input['seni_budaya_uts'] = $row['seni_budaya_uts'];
            }
            if (isset($row['sejarah_indonesia_uts'])) {
                $input['sejarah_indonesia_uts'] = $row['sejarah_indonesia_uts'];
            }
            if (isset($row['informatika_uts'])) {
                $input['informatika_uts'] = $row['informatika_uts'];
            }
            if (isset($row['bahasa_jawa_uts'])) {
                $input['bahasa_jawa_uts'] = $row['bahasa_jawa_uts'];
            }
            if (isset($row['prakarya_uts'])) {
                $input['prakarya_uts'] = $row['prakarya_uts'];
            }
            if (isset($row['bimbingan_konseling_uts'])) {
                $input['bimbingan_konseling_uts'] = $row['bimbingan_konseling_uts'];
            }
            if (isset($row['lainya'])) {
                $input['lainya'] = $row['lainya'];
            }
            Siswa::where('nis', $row['nis'])->update($input);
        }
    }
}
