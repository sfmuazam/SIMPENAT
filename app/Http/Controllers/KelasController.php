<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

use App\Models\Mapel;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
                $kelas = Kelas::select(['id','nama_kelas','kapasitas','mapel_peminatan']);

            return DataTables::of($kelas)->editColumn('mapel_peminatan',function ($data) {
                $list_mapel = explode(",", $data->mapel_peminatan);
                $mapel = '';
                foreach($list_mapel as $row){
                    $mapel .= ' <span class="badge bg-light-primary">'.$row.'</span>';
                }
                return $mapel;
            })
            ->addColumn('checkbox',function ($data) {
                return '<input type="checkbox" class="sub_chk" data-id="'.$data->id.'">';
        })->addColumn('aksi', function ($data) {
                $button = '<div data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Edit" class="btn btn-sm btn-icon btn-success btn-circle mr-2 edit editKelas"><i class="bi bi-pencil-square"></i></div>';
                $button .= ' <div data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Delete" class="btn btn-sm btn-icon btn-danger btn-circle mr-2 deleteKelas"><i
              class="bi bi-trash-fill"></i></div>';
                return $button;
            })->rawColumns(['checkbox','mapel_peminatan','aksi'])->make(true);
        }
        return view('kelas', [
            'title' => 'Kelas',
            'daftar_mapel' => Mapel::all(),
        ]);
    }

    // public function import(StoreKelasRequest $request)
    // {
    //     $this->validate($request, [
    //         'file' => 'required|mimes:csv,xls,xlsx'
    //     ]);
    //     $file = $request->file('file');
    //     // membuat nama file unik
    //     $nama_file = $file->hashName();
    //     //temporary file
    //     $path = $file->storeAs('public/excel/',$nama_file);
    //     // import data
    //     $import = Excel::import(new KelasImport(), storage_path('app/public/excel/'.$nama_file));
    //     //remove from server
    //     Storage::delete($path);
    //     Storage::delete('app/public/excel/'.$nama_file);
    //     Storage::delete('public/excel/'.$nama_file);
    //     if($import) {
    //         //redirect
    //         return redirect()->route('kelas.index')->with(['success' => 'Data Berhasil Diimport!']);
    //     } else {
    //         //redirect
    //         return redirect()->route('kelas.index')->with(['error' => 'Data Gagal Diimport!']);
    //     }
    // }

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
        $list_mapel = implode(",",$request->mapel_peminatan);
        Kelas::updateOrCreate(
            ['id' => $request->id_kelas],
            [
                'nama_kelas' => $request->nama_kelas,
                'mapel_peminatan' => $list_mapel,
                'kapasitas' => $request->kapasitas,
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
        return response()->json($kelas);
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        Kelas::find($id)->delete();

        return response()->json(['success'=>'Data Berhasil Dihapus']);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Kelas::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}
