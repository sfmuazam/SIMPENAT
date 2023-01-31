<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Siswa;

class SeleksiController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $kelas = Kelas::select(['*']);

            return DataTables::of($kelas)->editColumn('mapel_peminatan', function ($data) {
                $list_mapel = explode(",", $data->mapel_peminatan);
                sort($list_mapel);
                $mapel = '';
                foreach ($list_mapel as $row) {
                    $mapel .= ' <span class="badge bg-light-success">' . $row . '</span>';
                }
                return $mapel;
            })->editColumn('kapasitas', function ($data) {
                $peminat = Siswa::where('kelas_tujuan', $data->nama_kelas)->count();
                return $peminat . "/" . $data->kapasitas;
            })->editColumn('mapel_penilaian', function ($data) {
                $list_mapel = explode(",", $data->mapel_penilaian);
                sort($list_mapel);
                $mapel = '';
                foreach ($list_mapel as $row) {
                    $mapel .= ' <span class="badge bg-light-danger">' . ucwords(str_replace('_', ' ', $row)) . '</span>';
                }
                return $mapel;
            })->addColumn('nilai', function ($data) {
                $passing_grade = Siswa::where('kelas_tujuan', $data->nama_kelas)->orderBy('nilai_akhir', 'desc')->take($data->kapasitas)->get()->last();
                if (auth()->user()->id == "0") {
                    if ($passing_grade)
                        return $passing_grade->nilai_akhir;
                    else
                        return '0';
                } else {
                    $nilai_seleksi = Siswa::where('nis', auth()->user()->id)->first();
                    $mapel_dinilai = explode(",", $data->mapel_penilaian);
                    sort($mapel_dinilai);
                    $nilai = 0;
                    foreach ($mapel_dinilai as $row) {
                        $nilai += $nilai_seleksi->$row;
                    }
                    if ($passing_grade)
                        return $nilai . "/" . $passing_grade->nilai_akhir;
                    else
                        return '0';
                }
            })->addColumn('aksi', function ($data) {
                $button = '<div data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Edit" class="btn btn-sm btn-icon btn-success btn-circle mr-2 edit editKelas"><i class="bi bi-pencil-square"></i></div>';
                return $button;
            })->rawColumns(['mapel_peminatan', 'nilai', 'mapel_penilaian', 'aksi'])->make(true);
        }
        return view('seleksi', [
            'title' => 'Seleksi',
            'daftar_mapel' => Mapel::orderBy('nama_mapel')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $nilai_seleksi = Siswa::where('nis', auth()->user()->id)->first();
        $mapel_dinilai = explode(",", Kelas::where('nama_kelas',$request->nama_kelas)->value('mapel_penilaian'));
        $nilai = 0;
        foreach ($mapel_dinilai as $row) {
            $nilai += $nilai_seleksi->$row;
        }

        Siswa::where('nis',auth()->user()->id)->update(
            [
                'kelas_tujuan' => $request->nama_kelas,
                'nilai_akhir' => $nilai,
            ]
        );

        return response()->json(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function show(Kelas $kelas)
    {
        //
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);
        $nilai_seleksi = Siswa::where('nis', '13610')->first();
        $mapel_dinilai = explode(",", Kelas::where('nama_kelas',$kelas->nama_kelas)->value('mapel_penilaian'));
        sort($mapel_dinilai);
        $nilai = array();
        $i = 0;
        foreach ($mapel_dinilai as $row) {
            $nama = $kelas->row;
            $nilai[$i] = $nilai_seleksi->$row;
            $i++;
        }
        $kelas->nilai = $nilai;
        return response()->json($kelas);
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        Kelas::find($id)->delete();

        return response()->json(['success' => 'Data Berhasil Dihapus']);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Kelas::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Products Deleted successfully."]);
    }
}
