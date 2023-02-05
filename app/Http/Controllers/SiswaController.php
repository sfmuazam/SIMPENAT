<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Imports\SiswaImport;
use App\Imports\NilaiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Riwayat;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $kelas = Siswa::select(['*']);

            return DataTables::of($kelas)
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="sub_chk" data-id="' . $data->id . '">';
                })->addColumn('aksi', function ($data) {
                    $button = '<div data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Nilai" class="btn btn-sm btn-icon btn-info btn-circle mr-2 nilai"><i style="color:white;" class="bi bi-grid"></i></div>';
                    $button .= ' <div data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Edit" class="btn btn-sm btn-icon btn-success btn-circle mr-2 edit editKelas"><i class="bi bi-pencil-square"></i></div>';
                    $button .= ' <div data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-danger btn-circle mr-2 deleteKelas"><i
              class="bi bi-trash-fill"></i></div>';
                    return $button;
                })->rawColumns(['checkbox', 'aksi'])->make(true);
        }
        return view('siswa', [
            'title' => 'Siswa',
            'daftar_mapel' => Siswa::all(),

        ]);
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        // membuat nama file unik
        $nama_file = $file->hashName();
        //temporary file
        $path = $file->storeAs('public/excel/', $nama_file);
        // import data
        $import = Excel::import(new SiswaImport(), storage_path('app/public/excel/' . $nama_file));
        //remove from server
        Storage::delete($path);
        Storage::delete('app/public/excel/' . $nama_file);
        Storage::delete('public/excel/' . $nama_file);
        if ($import) {
            //redirect
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Diimport!']);
        }
    }

    public function import_nilai(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
        $file = $request->file('file');
        // membuat nama file unik
        $nama_file = $file->hashName();
        //temporary file
        $path = $file->storeAs('public/excel/', $nama_file);
        // import data
        $import = Excel::import(new NilaiImport(), storage_path('app/public/excel/' . $nama_file));
        //remove from server
        Storage::delete($path);
        Storage::delete('app/public/excel/' . $nama_file);
        Storage::delete('public/excel/' . $nama_file);
        if ($import) {
            //redirect
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Diimport!']);
        }
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    public function store(Request $request)
    {
        $tes = Siswa::where('id', $request->id_siswa)->get();
        if ($tes->count() == 0) {
            $input = [
                'id' => $request->nis,
                'name' => $request->nama,
                'password' => bcrypt($request->nis)
            ];
            User::create($input);
        } else {
            $t2 = $tes->first();
            if ($t2->nis != $request->nis) {
                $update = ['id' => $request->nis];
                User::where('id', $t2->nis)->update($update);
            }
        }
        Siswa::updateOrCreate(
            ['id' => $request->id_siswa],
            [
                'nis' => $request->nis,
                'nisn' => $request->nisn,
                'nama' => $request->nama,
                'kelas' => $request->asal_kelas,
                'agama' => $request->n_agama,
                'pkn' => $request->n_pkn,
                'bahasa_indonesia' => $request->n_bahasa_indonesia,
                'bahasa_inggris' => $request->n_bahasa_inggris,
                'matematika' => $request->n_matematika,
                'fisika' => $request->n_fisika,
                'kimia' => $request->n_kimia,
                'biologi' => $request->n_biologi,
                'ekonomi' => $request->n_ekonomi,
                'geografi' => $request->n_geografi,
                'sosiologi' => $request->n_sosiologi,
                'penjaskes' => $request->n_penjaskes,
                'seni_budaya' => $request->n_seni_budaya,
                'sejarah_indonesia' => $request->n_sejarah_indonesia,
                'informatika' => $request->n_informatika,
                'bahasa_jawa' => $request->n_bahasa_jawa,
                'prakarya' => $request->n_prakarya,
                'bimbingan_konseling' => $request->n_bimbingan_konseling,
                'agama_uts' => $request->n_agama_uts,
                'pkn_uts' => $request->n_pkn_uts,
                'bahasa_indonesia_uts' => $request->n_bahasa_indonesia_uts,
                'bahasa_inggris_uts' => $request->n_bahasa_inggris_uts,
                'matematika_uts' => $request->n_matematika_uts,
                'fisika_uts' => $request->n_fisika_uts,
                'kimia_uts' => $request->n_kimia_uts,
                'biologi_uts' => $request->n_biologi_uts,
                'ekonomi_uts' => $request->n_ekonomi_uts,
                'geografi_uts' => $request->n_geografi_uts,
                'sosiologi_uts' => $request->n_sosiologi_uts,
                'penjaskes_uts' => $request->n_penjaskes_uts,
                'seni_budaya_uts' => $request->n_seni_budaya_uts,
                'sejarah_indonesia_uts' => $request->n_sejarah_indonesia_uts,
                'informatika_uts' => $request->n_informatika_uts,
                'bahasa_jawa_uts' => $request->n_bahasa_jawa_uts,
                'prakarya_uts' => $request->n_prakarya_uts,
                'bimbingan_konseling_uts' => $request->n_bimbingan_konseling_uts,
                'lainya' => $request->n_lainya,
            ]
        );

        return response()->json(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function show(Siswa $kelas)
    {
        //
    }

    public function edit($id)
    {
        $kelas = Siswa::find($id);
        $kelas->riwayat = Riwayat::where('nis', $kelas->nis)->get();
        return response()->json($kelas);
    }

    public function update($id)
    {
        //
    }

    public function reset(Request $request)
    {
        $siswa = User::where('id', $request->auth)->first();
        $update = [
            'password' => bcrypt($siswa->id)
        ];
        User::where('id', $request->auth)->update($update);
        return response()->json(['success' => 'Kata sandi berhasil direset']);
    }

    public function destroy($id)
    {
        $nis = Siswa::where('id', $id)->first()->nis;

        User::destroy($nis);
        Siswa::find($id)->delete();

        return response()->json(['success' => 'Data Berhasil Dihapus']);
    }

    public function deleteAll(Request $request)
    {
        $niss = $request->niss;
        User::whereIn('id', explode(",", $niss))->delete();
        Siswa::whereIn('nis', explode(",", $niss))->delete();
        return response()->json(['success' => "Products Deleted successfully."]);
    }
}
