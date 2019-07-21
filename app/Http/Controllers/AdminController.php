<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use Auth;
use File;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    // List Kelas
    public function listKelas() {
        $kelas = Kelas::all();
        return view('admin.index', compact('kelas'));
    }

    // Tambah Kelas
    public function tambahKelas() {
        return view('admin.tambahkelas');
    }

    public function tambahKelasPost(Request $request) {
        $formInput = $request->except('foto');

        $this->validate($request, [
          'nama' => 'required',
          'deskripsi' => 'required',
          'guru' => 'required',
          'mulai' => 'required',
          'sampai' => 'required',
          'groupwa' => 'required',
          'foto' => 'required|image|mimes:png,jpg,jpeg|max:2000',
          'biaya' => 'required',
        ]);

        $foto=$request->foto;
        $location="images/kelas/";
        File::makeDirectory($location, 0777, true, true);
        if ($foto) {
            $imageName1=$foto->getClientOriginalName();
            $foto->move($location, $imageName1);
            $formInput['foto']=$imageName1;
        }

        Kelas::create($formInput);

        return redirect('/listkelas');
    }

    // Update Kelas
    public function updateKelas($id) {
        $kelas = Kelas::find($id);
        return view('admin.editkelas', compact('kelas'));
    }

    public function updateKelasPut($id, Request $request) {
        $kelas = Kelas::find($id);

        $this->validate($request, [
          'nama' => 'required',
          'deskripsi' => 'required',
          'guru' => 'required',
          'mulai' => 'required',
          'sampai' => 'required',
          'groupwa' => 'required',
          'foto' => 'image|mimes:png,jpg,jpeg|max:2000',
          'biaya' => 'required',
        ]);

        $foto=$request->foto;
        $location="images/kelas/";
        File::makeDirectory($location, 0777, true, true);
        if ($foto) {
            $imageName1=$foto->getClientOriginalName();
            $foto->move($location, $imageName1);
            $kelas->foto = $imageName1;
        }

        $kelas->nama = $request->nama;
        $kelas->deskripsi = $request->deskripsi;
        $kelas->guru = $request->guru;
        $kelas->mulai = $request->mulai;
        $kelas->sampai = $request->sampai;
        $kelas->groupwa = $request->groupwa;
        $kelas->tampil = $request->tampil;
        $kelas->biaya = $request->biaya;

        $kelas->save();

        return redirect('/listkelas');
    }
}
