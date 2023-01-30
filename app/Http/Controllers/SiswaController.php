<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use App\Imports\SiswaImport;
use App\Imports\NilaiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Siswa;

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
        Siswa::updateOrCreate(
            ['id' => $request->id_siswa],
            [
                'nis' => $request->nis,
                'nisn' => $request->nisn,
                'nama' => $request->nama,
                'asal_kelas' => $request->asal_kelas,
                'agama' => $request->n_agama,
                'pkn' => $request->n_pkn,
                'indo' => $request->n_indo,
                'inggris' => $request->n_inggris,
                'mtk' => $request->n_mtk,
                'fisika' => $request->n_fisika,
                'kimia' => $request->n_kimia,
                'biologi' => $request->n_biologi,
                'eko' => $request->n_eko,
                'geo' => $request->n_geo,
                'sosio' => $request->n_sosio,
                'penjas' => $request->n_penjas,
                'seni' => $request->n_seni,
                'sejarah' => $request->n_sejarah,
                'if' => $request->n_if,
                'jawa' => $request->n_jawa,
                'prakarya' => $request->n_prakarya,
                'bk' => $request->n_bk,
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
        return response()->json($kelas);
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        Siswa::find($id)->delete();

        return response()->json(['success' => 'Data Berhasil Dihapus']);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Siswa::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Products Deleted successfully."]);
    }
}
