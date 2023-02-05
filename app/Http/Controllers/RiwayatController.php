<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\Siswa;
use App\Models\Kelas;
use Yajra\DataTables\Facades\DataTables;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $riwayat = Riwayat::select(['*']);

            return DataTables::of($riwayat)->addColumn('nama', function ($data) {
                $nama_siswa = Siswa::where('nis', $data->nis)->value('nama');
                return $nama_siswa;
            })->rawColumns(['nama'])->make(true);
        }
        return view('riwayat', [
            'title' => 'Riwayat',
        ]);
    }
}
