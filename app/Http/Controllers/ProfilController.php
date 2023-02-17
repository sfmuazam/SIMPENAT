<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $status = User::where('id', 'admin')->first()->status;
        if (auth()->user()->id === 0) {
            $nilai = [
                'nis' => '',
                'nisn' => '',
                'nama' => User::where('id', 'admin')->first()->name,
                'kelas' => '',
                'agama' => '',
                'pkn' => '',
                'bahasa_indonesia' => '',
                'bahasa_inggris' => '',
                'matematika' => '',
                'fisika' => '',
                'kimia' => '',
                'biologi' => '',
                'ekonomi' => '',
                'geografi' => '',
                'sosiologi' => '',
                'penjaskes' => '',
                'seni_budaya' => '',
                'sejarah_indonesia' => '',
                'informatika' => '',
                'bahasa_jawa' => '',
                'prakarya' => '',
                'bimbingan_konseling' => '',
                'agama_uts' => '',
                'pkn_uts' => '',
                'bahasa_indonesia_uts' => '',
                'bahasa_inggris_uts' => '',
                'matematika_uts' => '',
                'fisika_uts' => '',
                'kimia_uts' => '',
                'biologi_uts' => '',
                'ekonomi_uts' => '',
                'geografi_uts' => '',
                'sosiologi_uts' => '',
                'penjaskes_uts' => '',
                'seni_budaya_uts' => '',
                'sejarah_indonesia_uts' => '',
                'informatika_uts' => '',
                'bahasa_jawa_uts' => '',
                'prakarya_uts' => '',
                'bimbingan_konseling_uts' => '',
                'lainya' => '',
            ];
            $riwayat = [];
        } else {
            $nilai = Siswa::where('nis', auth()->user()->id)->first();
            $riwayat = Riwayat::where('nis', auth()->user()->id)->get();
        }
        return view('profil', [
            'title' => 'Profil',
            'nilai' => $nilai,
            'riwayat' => $riwayat,
            'status' => $status
        ]);
    }

    public function identitas(Request $request) {
        $admin = User::where('id', 'admin')->first();
        $update = [
            'name' => $request->nama
        ];
        if($request->file('logo') != null) {
            $file = $request->file('logo');
            if ($file->getSize() > 5000000) {
                return back()->with('gagal', 'Ukuran maksimal foto adalah 5MB.');
            }
            if ($file->getMimeType() != 'image/jpeg' and $file->getMimeType() != 'image/png') {
                return back()->with('gagal', 'Format file yang di perbolehkan adalah png, jpg, atau jpeg.');
            }
            if ($admin['logo'] != 'logo-default.png') {
                unlink(public_path("images/$admin->logo"));
            }
            $filename = 'logo.' . pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            $file->move(public_path('images'), $filename);
            $update = [
                'name' => $request->nama,
                'logo' => $filename
            ];
        }
        User::where('id', 'admin')->update($update);
        return back()->with('sukses', 'Data berhasil diperbarui.');
    }

    public function change_pass(Request $request)
    {
        $user = auth()->user();

        if (!(Hash::check($request->get('old'), $user->password))) {
            // The passwords matches
            return response()->json(['failed' => "Kata Sandi Gagal Diperbarui!"]);
        }

        if (strcmp($request->get('old'), $request->get('new')) == 0) {
            // Current password and new password same
            return response()->json(['failed' => "Kata Sandi Gagal Diperbarui!"]);
        }

        if ($request->get('new') != $request->get('conf')) {
            return response()->json(['failed' => "Kata Sandi Gagal Diperbarui!"]);
        }

        $id = strval(auth()->user()->id);
        if (auth()->user()->id === 0) {
            $id = 'admin';
        }
        // Change Password
        $pass = ['password' => bcrypt($request->new)];
        User::where('id', '=', $id)->update($pass);

        return response()->json(['success' => 'Kata Sandi Berhasil Diperbarui!']);
    }

    public function cover(Request $request)
    {
        $change = User::where('id', 'admin')->first();
        if ($request->reset == 1) {
            unlink(public_path("images/$change->cover"));
            $input = [
                'cover' => 'default.jpg'
            ];
            User::where('id', 'admin')->update($input);
        } else {
            $file = $request->file('image');
            if ($file->getSize() > 5000000) {
                return back()->with('gagal', 'Ukuran maksimal foto adalah 5MB.');
            }
            if ($file->getMimeType() != 'image/jpeg' and $file->getMimeType() != 'image/png') {
                return back()->with('gagal', 'Format file yang di perbolehkan adalah png, jpg, atau jpeg.');
            }
            if ($change->cover != 'default.jpg') {
                unlink(public_path("images/$change->cover"));
            }
            $filename = 'cover.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            $file->move(public_path('images'), $filename);

            $input = [
                'cover' => $filename
            ];
            User::where('id', 'admin')->update($input);
        }
        return back()->with('sukses', 'Foto sampul berhasil diperbarui.');
    }

    public function buka()
    {
        User::where('id', 'admin')->update([
            'status' => 'Aktif'
        ]);
        Riwayat::where('status', 'Diterima')->update([
            'status' => 'Proses Seleksi'
        ]);
        return back()->with('sukses', 'Seleksi berhasil dibuka.');
    }

    public function tutup()
    {
        User::where('id', 'admin')->update([
            'status' => 'Tidak Aktif'
        ]);
        Riwayat::where('status', 'Proses Seleksi')->update([
            'status' => 'Diterima'
        ]);
        return back()->with('sukses', 'Seleksi berhasil ditutup.');
    }
}
