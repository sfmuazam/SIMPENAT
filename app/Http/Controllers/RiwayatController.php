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
            })->editColumn('created_at', function ($data){
                $tgl = $data->created_at;
                return $tgl;
            })->addColumn('checkbox', function ($data) {
                return '<input type="checkbox" class="sub_chk" data-id="' . $data->id . '">';
            })->addColumn('aksi', function ($data) {
                $button = ' <div data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-danger btn-circle mr-2 deleteKelas"><i
          class="bi bi-trash-fill"></i></div>';
                return $button;
            })->rawColumns(['created_at','checkbox', 'aksi', 'nama'])->make(true);
        }
        return view('riwayat', [
            'title' => 'Riwayat',
        ]);
    }

    public function destroy($id)
    {
        Riwayat::find($id)->delete();

        return response()->json(['success'=>'Data Berhasil Dihapus']);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Riwayat::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Products Deleted successfully."]);
    }
}
