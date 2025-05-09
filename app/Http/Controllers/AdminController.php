<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Libur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }

    public function setting() {
        return view('admin.setting');
    }

    // pegawai
    public function datapegawai() {
        $data = User::all();
        return view('admin.datakaryawan', compact('data'));
    }

    public function tambahpegawai(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
            'nik' => 'required',
            'foto' => 'required',
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'notelp' => 'required',
            'email' => 'required',
        ]);

        $pegawai = new User();
        $pegawai->email = $request->email;
        $pegawai->password = $request->password;
        $pegawai->level = $request->level;
        $pegawai->nik = $request->nik;
        $pegawai->nama = $request->nama;
        $pegawai->jenisKelamin = $request->jenisKelamin;
        $pegawai->alamat = $request->alamat;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->notelp = $request->notelp;
        $pegawai->email = $request->email;

        if ($request->hasFile('foto')) {
            $namaasli = $request->file('foto')->getClientOriginalName();
            $namaunik = time() . '_' . $namaasli;
            $request->file('foto')->move(public_path('image'), $namaunik);
            $pegawai->foto = $namaunik;
        } else {
            return redirect()->back()->with('error', 'foto tidak ditemukan!');
        }

       
        $pegawai->password = Hash::make('12345678'); 
        $pegawai->level = 'pegawai'; 

        $pegawai->save();
        session()->flash('success_message', 'Data berhasil ditambahkan!');
        return redirect()->route('data_pegawai');
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'level' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'alamat' => 'required',
            'jabatan' => 'required',
            'notelp' => 'required',
        ]);

        $pegawai = User::findOrFail($id);

        $pegawai->email = $request->email;
        $pegawai->password = $request->password;
        $pegawai->level = $request->level;
        $pegawai->nik = $request->nik;
        $pegawai->nama = $request->nama;
        $pegawai->jenisKelamin = $request->jenisKelamin;
        $pegawai->alamat = $request->alamat;
        $pegawai->jabatan = $request->jabatan;
        $pegawai->notelp = $request->notelp;

        if ($request->hasFile('foto')) {
            $namaasli = $request->file('foto')->getClientOriginalName();
            $namaunik = time() . '_' . $namaasli;
            $request->file('foto')->move(public_path('image'), $namaunik);
            $pegawai->foto = $namaunik;
        }

        $pegawai->update();
        session()->flash('success_message', 'Data berhasil diubah!');
        return redirect()->route('data_pegawai');
    }

    public function delete(string $id) {
        $pegawai = User::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('data_pegawai');
    }

    public function akun() {
        return view('admin.account');
    }

    public function kehadiran() {
        $absen = User::all();
        return view('admin.kehadiran', compact('absen'));
    }

    public function libur() {
        $liburs = Libur::orderBy('tanggal')->get();
        return view('admin.libur', compact('liburs'));
    }

    public function simpan_libur(Request $request) {
    $request->validate([
        'tanggal' => 'required|date',
        'ket' => 'required|string|max:255',
    ]);

    Libur::create([
        'tanggal' => $request->tanggal,
        'keterangan' => $request->ket,
    ]);

    return redirect()->route('libur')->with('success_message', 'Hari libur berhasil ditambahkan!');
    
    }

    public function delete_libur(string $id)
    {
        $libur = Libur::findOrFail($id);
        $libur->delete();
        return redirect()->route('libur');
    }

}
