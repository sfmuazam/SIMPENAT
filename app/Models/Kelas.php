<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = ['nama_kelas','mapel_peminatan','mapel_penilaian','kapasitas'];

    public function siswa(){
        return $this->hasMany(Siswa::class, 'nama_kelas', 'kelas_tujuan');
    }
}
