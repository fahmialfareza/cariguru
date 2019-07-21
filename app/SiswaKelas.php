<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kelas;
use App\User;
use App\DaftarSiswa;

class SiswaKelas extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function daftarsiswa() {
        return $this->hasMany(DaftarSiswa::class);
    }
}
