<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SiswaKelas;

class DaftarSiswa extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $table = 'daftar_siswa';

    public function siswakelas() {
        return $this->belongsTo(SiswaKelas::class);
    }
}
