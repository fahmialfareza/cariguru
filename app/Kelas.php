<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SiswaKelas;

class Kelas extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function siswakelas() {
        return $this->hasOne(SiswaKelas::class);
    }
}
