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
        if (auth()->user()->id == 0) {
            $nilai = [
                'nis' => '',
                'nisn' => '',
                'nama' => 'Admin',
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
            'riwayat' => $riwayat
        ]);
    }

    public function change_pass(Request $request)
    {
        $user = auth()->user();

        if (!(Hash::check($request->get('old'), $user->password))) {
            // The passwords matches
            return response()->json(['failed' => "Kata sandi lama salah."]);
        }

        if (strcmp($request->get('old'), $request->get('new')) == 0) {
            // Current password and new password same
            return response()->json(['failed' => "Kata sandi baru tidak boleh sama dengan kata sandi lama."]);
        }

        if ($request->get('new') != $request->get('conf')) {
            return response()->json(['failed' => "Kata sandi baru tidak sesuai."]);
        }

        $id = strval(auth()->user()->id);
        // Change Password
        $pass = ['password' => bcrypt($request->new)];
        User::where('id', '=', $id)->update($pass);

        return response()->json(['success' => 'Kata Sandi Berhasil Diperbarui!']);
    }
}
