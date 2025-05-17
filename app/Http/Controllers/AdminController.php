<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Libur;
use App\Models\Absensi;
use App\Models\SettingAbsen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        $tanggal = gmdate('Y-m-d', time() + (60 * 60 * 8));

        $jumlahKaryawan = User::count();

        $totalHadir = Absensi::where('tanggal', '=', $tanggal)->where('status', '=', 'hadir')->count(); 
        $totalIzin = Absensi::where('tanggal', '=', $tanggal)->where('status', '=', 'izin')->count();;  
        $totalAbsen = $jumlahKaryawan - $totalHadir - $totalIzin; 

        return view('admin.dashboard', compact('jumlahKaryawan', 'totalHadir', 'totalIzin', 'totalAbsen'));
    }

    public function setting() {
        $lokasi = SettingAbsen::first();

        return view('admin.setting', compact('lokasi'));
    }

    // pegawai
    public function datapegawai() {
        $data = User::orderBy('nama')->get();
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


        if ($request->hasFile('foto')) {
            $namaasli = $request->file('foto')->getClientOriginalName();
            $namaunik = time() . '_' . $namaasli;
            $request->file('foto')->move(public_path('image'), $namaunik);
            $pegawai->foto = $namaunik;
        } else {
            return redirect()->back()->with('error', 'foto tidak ditemukan!');
        }
        dd($request->password);

        $pegawai->save();
        session()->flash('tambah_data', 'Data berhasil ditambahkan!');
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
        session()->flash('edit_data', 'Data berhasil diubah!');
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
        $tanggal = gmdate('Y-m-d', time()+ (60 * 60 * 8));

        $absen = User::leftJoin('absensis as b', function($join) use ($tanggal) {
            $join->on('users.id', '=', 'b.user_id')
                 ->whereDate('b.tanggal', '=', $tanggal);
            })
        ->select('users.*', 'b.*')
        ->get();

        $riwayat = DB::table('absensis')
        ->join('users', 'absensis.user_id', '=', 'users.id')
        ->select('users.nama', 'absensis.*')
        ->orderBy('absensis.tanggal', 'desc')
        ->get();

        return view('admin.kehadiran', compact('absen', 'riwayat'));
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

    public function delete_libur($id)
    {
        $libur = Libur::findOrFail($id);
        $libur->delete();

        return redirect()->route('libur')->with('success', 'Data libur berhasil dihapus.');
    }

    public function settingabsen(Request $request)
    {
        
        $validated = $request->validate([
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'required|date_format:H:i',
            'lokasi' => 'required|string',
            'batas_jarak' => 'required|numeric',
        ]);

        // dd($validated);
        $setting = SettingAbsen::first();
        if ($setting) {
            $setting->update($validated);
        } else {
            SettingAbsen::create($validated);
        }


        return redirect()->route('setting')->with('success', 'Pengaturan Absensi berhasil disimpan!');
    }

    public function terimaizin(Request $request)
    {
        $request->validate([
            'alasan'  => ['required', 'string'],

        ]);
        $tanggal = gmdate('Y-m-d', time() + (60 * 60 * 8));


        $hadir = Absensi::where('user_id', '=', $request->user_id)->where('tanggal', '=', $tanggal)->first();
        // dd($hadir);
        $izin = Absensi::findOrFail($hadir->id);
            $izin->status     = $request->alasan;
            $izin->update();


        return redirect()->route('kehadiran');
                         
    }
    public function profiladmin(){
        return view('admin.profil');
    }
    public function updateprofil(Request $request){
        $user = Auth::user();

        $validated = $request->validate([
            'nama'     => 'required',
            'email'    => 'required|email',
            'password' => 'required|string',
            'foto'     => 'nullable|image',   
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->nama = $validated['nama'];
        $user->email = $validated['email'];
        $user->password=$validated['password'];
        if ($request->hasFile('foto')) {
            $namaasli = $request->file('foto')->getClientOriginalName();
            $namaunik = time() . '_' . $namaasli;
            $request->file('foto')->move(public_path('image'), $namaunik);
            $user->foto = $namaunik;
        }
        $user->update();

        return redirect()->route('profiladmin')->with('profiladmin', 'Profil berhasil diubah');
    }
}
