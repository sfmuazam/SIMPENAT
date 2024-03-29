<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SeleksiController;
use App\Http\Controllers\RiwayatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// root
Route::get('/', [SeleksiController::class, 'index'])->middleware('auth');

// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'auth'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// profil
Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index')->middleware('auth');
Route::post('/profil/identitas', [ProfilController::class, 'identitas'])->name('profil.identitas')->middleware('admin');
Route::post('/profil/pass', [ProfilController::class, 'change_pass'])->name('profil.pass')->middleware('auth');
Route::post('/profil/cover', [ProfilController::class, 'cover'])->name('profil.cover')->middleware('admin');
Route::post('/profil/buka', [ProfilController::class, 'buka'])->name('profil.buka')->middleware('admin');
Route::post('/profil/tutup', [ProfilController::class, 'tutup'])->name('profil.tutup')->middleware('admin');

// mapel
Route::resource('mapel', MapelController::class)->middleware('admin');
Route::get('/mapel', [MapelController::class, 'index'])->name('mapel.index')->middleware('admin');
Route::delete('/mapel', [MapelController::class, 'deleteAll'])->name('mapel.deleteAll')->middleware('admin');
Route::post('/mapel/import', [MapelController::class, 'import'])->name('mapel.import')->middleware('admin');

// kelas
Route::resource('kelas', KelasController::class)->middleware('admin');
Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index')->middleware('admin');
Route::delete('/kelas', [KelasController::class, 'deleteAll'])->name('kelas.deleteAll')->middleware('admin');
Route::post('/kelas/import', [KelasController::class, 'import'])->name('kelas.import')->middleware('admin');

// siswa
Route::resource('siswa', SiswaController::class)->middleware('admin');
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index')->middleware('admin');
Route::delete('/siswa', [SiswaController::class, 'deleteAll'])->name('siswa.deleteAll')->middleware('admin');
Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswa.import')->middleware('admin');
Route::post('/siswa/import-nilai', [SiswaController::class, 'import_nilai'])->name('siswa.import-nilai')->middleware('admin');
Route::post('/siswa/reset', [SiswaController::class, 'reset'])->name('siswa.reset')->middleware('admin');

// seleksi
Route::resource('seleksi', SeleksiController::class)->middleware('auth');
Route::get('/seleksi', [SeleksiController::class, 'index'])->name('seleksi.index')->middleware('auth');
Route::delete('/seleksi', [SeleksiController::class, 'deleteAll'])->name('seleksi.deleteAll')->middleware('auth');
Route::post('/seleksi/tambah', [SeleksiController::class, 'tambah'])->name('seleksi.tambah')->middleware('admin');
Route::post('/seleksi/import', [SeleksiController::class, 'import'])->name('seleksi.import')->middleware('auth');
Route::post('/seleksi/kick/{siswa:nis}', [SeleksiController::class, 'kick'])->name('seleksi.kick')->middleware('auth');
Route::get('/seleksi/{kelas:nama_kelas}', [SeleksiController::class, 'show'])->name('seleksi.show')->middleware('auth');

// seleksi
Route::resource('riwayat', RiwayatController::class)->middleware('auth');
Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index')->middleware('admin');
Route::delete('/riwayat', [RiwayatController::class, 'deleteAll'])->name('riwayat.deleteAll')->middleware('admin');

