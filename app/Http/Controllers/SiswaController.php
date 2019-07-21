<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\SiswaKelas;
use App\DaftarSiswa;
use Auth;

class SiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('siswa');
    }

    // Kelas Terdaftar
    public function kelasDaftar() {
        $kelas = SiswaKelas::where('user_id', Auth::user()->id)->get();

        return view('siswa.index', compact('kelas'));
    }

    // Daftar Kelas
    public function daftarKelas($id, Request $request) {
        $kelas = Kelas::find($id);
        $user = Auth::user();
        return view('siswa.daftar', compact('kelas', 'user', 'request'));
    }

    public function daftarKelasPost($id, Request $request) {
        $siswakelasid = SiswaKelas::create([
          'kelas_id' => $request->kelas_id,
          'user_id' => $request->user_id,
          'jumlah' => $request->jumlah,
          'total_biaya' => $request->total_biaya,
        ])->id;

        for ($i=1; $i <= $request->jumlah; $i++) {
          $nama = 'nama' . $i;
          DaftarSiswa::create([
            'siswa_kelas_id' => $siswakelasid,
            'nama' => $request->$nama,
          ]);
        }

        $kelas = Kelas::find($id);
        $kelas->tampil = false;
        $kelas->save();

        return redirect('/');
    }
}
