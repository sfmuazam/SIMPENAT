<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SeleksiController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('mapel', MapelController::class);
Route::get('/mapel', [MapelController::class, 'index'])->name('mapel.index');
Route::delete('/mapel', [MapelController::class, 'deleteAll'])->name('mapel.deleteAll');
Route::post('/mapel/import', [MapelController::class, 'import'])->name('mapel.import');

Route::resource('kelas', KelasController::class);
Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::delete('/kelas', [KelasController::class, 'deleteAll'])->name('kelas.deleteAll');
Route::post('/kelas/import', [KelasController::class, 'import'])->name('kelas.import');

Route::resource('siswa', SiswaController::class);
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::delete('/siswa', [SiswaController::class, 'deleteAll'])->name('siswa.deleteAll');
Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswa.import');

Route::resource('seleksi', SeleksiController::class);
Route::get('/seleksi', [SeleksiController::class, 'index'])->name('seleksi.index');
Route::delete('/seleksi', [SeleksiController::class, 'deleteAll'])->name('seleksi.deleteAll');
Route::post('/seleksi/import', [SeleksiController::class, 'import'])->name('seleksi.import');
