<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Riwayat;

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
                $button = '';
                if(auth()->user()->id != '0')
                if(Siswa::where('nis',auth()->user()->id)->value('kelas_tujuan') == null)
                $button .= '<div data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Edit" class="btn btn-sm btn-icon btn-success btn-circle mr-2 edit editKelas"><i class="bi bi-plus-circle"></i></div>';
                $button .= ' <a href="/seleksi/'.$data->nama_kelas.'"><div data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Info" class="btn btn-sm btn-icon btn-primary btn-circle mr-2 infoJurnal"><i class="bi bi-info-circle"></i></div></a>';
                return $button;
            })->rawColumns(['mapel_peminatan', 'nilai', 'mapel_penilaian', 'aksi'])->make(true);
        }
        return view('seleksi', [
            'title' => 'Seleksi',
            'daftar_mapel' => Mapel::orderBy('nama_mapel')->get(),
        ]);
    }

    public function show(Request $request, $nama_kelas)
    {
        if (request()->ajax()) {
            $siswa = Siswa::select(['nis','nisn','nama','siswa.kelas','nilai_akhir','kelas_tujuan'])->where('kelas_tujuan',$nama_kelas);

            return DataTables::of($siswa)
            ->addColumn('checkbox',function ($data) {
                return '<input type="checkbox" class="sub_chk" data-id="'.$data->id.'">';
        })->addColumn('aksi', function ($data) {
                $button = ' <div data-toggle="tooltip" data-id="'.$data->nis.'" data-original-title="Delete" class="btn btn-sm btn-icon btn-danger btn-circle mr-2 deleteKelas"><i
              class="bi bi-trash-fill"></i></div>';
                return $button;
            })->rawColumns(['checkbox','aksi'])->make();
        }

        return view('rekapSeleksi', [
            "title" => "Seleksi",
            'namakelas' => $nama_kelas,
            'datasiswa' => Siswa::select(['nis','nama','kelas'])->get(),
        ]);
    }

    public function store(Request $request)
    {
        Siswa::where('nis',auth()->user()->id)->update(
            [
                'kelas_tujuan' => $request->kelas_tujuan,
                'nilai_akhir' => $request->nilai_akhir,
            ]
        );
        Riwayat::create([
          'nis' => auth()->user()->id,
          'kelas_tujuan' => $request->kelas_tujuan,
          'nilai_akhir' => $request->nilai_akhir,
        ]);
        $passing_grade = Siswa::where('kelas_tujuan', $request->kelas_tujuan)->orderBy('nilai_akhir', 'desc')->get();

        if($passing_grade->count() > 36){
        Siswa::where('nis',$passing_grade[$request->kapasitas]->nis)->update(
            [
                'kelas_tujuan' => null,
                'nilai_akhir' => '0',
            ]
        );
        
    }

        return response()->json(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function kick($id)
    {
        Siswa::where('nis',$id)->update(
            [
                'kelas_tujuan' => null,
                'nilai_akhir' => 0,
            ]
        );

        return response()->json(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function edit($id)
    {
        $kelas = Kelas::find($id);
        $siswa = Siswa::where('nis', auth()->user()->id)->first();
        $mapel_dinilai = explode(",", Kelas::where('nama_kelas',$kelas->nama_kelas)->value('mapel_penilaian'));
        sort($mapel_dinilai);
        $nilai = array();
        $i = 0;
        $kelas->jumlah_akhir = 0;
        foreach ($mapel_dinilai as $row) {
            $nama = $kelas->row;
            $nilai[$i] = $siswa->$row;
            $kelas->jumlah_akhir += $siswa->$row;
            $i++;
        }
        $i = 0;
        foreach ($mapel_dinilai as $row) {
            $mapel_uts = $row.'_uts';
            $nilai[$i] += $siswa->$mapel_uts;
            $kelas->jumlah_akhir += $siswa->$mapel_uts;
            $i++;
        }
        $kelas->lainya = $siswa->lainya;
        $kelas->nilai = $nilai;
        $kelas->jumlah_akhir += $siswa->lainya;
        return response()->json($kelas);
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        Siswa::where('nis',$id)->update(
            [
                'kelas_tujuan' => null,
                'nilai_akhir' => 0,
            ]
        );

        return response()->json(['success' => 'Data Berhasil Ditambahkan!']);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Kelas::whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Products Deleted successfully."]);
    }
}
