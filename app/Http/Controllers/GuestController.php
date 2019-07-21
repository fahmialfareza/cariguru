<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;

class GuestController extends Controller
{
    // Kelas Buka
    public function kelasBuka() {
        $kelas = Kelas::where('tampil', true)->paginate(12);
        return view('guest.index', compact('kelas'));
    }

    // Info Kelas
    public function infoKelas($id) {
        $kelas = Kelas::find($id);
        return view('guest.detail', compact('kelas'));
    }
}
