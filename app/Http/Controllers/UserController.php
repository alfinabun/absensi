<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Absensi;
use App\Models\Libur;
use App\Models\SettingAbsen;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    public function index() {
        // dd(Auth::user()->level);
        $lokasikantor = Helper::lokasiKantor();
        $lock = explode(', ', $lokasikantor); 

        $locationA = ['latitude' => $lock[0],  'longitude' => $lock[1]];  
        $locationB = ['latitude' => -5.136902788259322,  'longitude' => 119.47881286468731];  

        $lokasi = SettingAbsen::first();
        $jaraknya = Helper::howLong($locationA, $locationB);
        
        return view('user.dashboard', compact('jaraknya','lock', 'lokasi'));
    }

    public function data_absen() {
        $satuJamLagi = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $timezone = time() + (60 * 60 * 8);
        $tanggal = gmdate('Y-m-d', $timezone);
        $jam    = gmdate('H:i:s', $timezone);
        $jam_kerja = SettingAbsen::first();
        $jamMasukBaru = date('H:i:s', strtotime("1970-01-01 $jam_kerja->jam_masuk -1 hour"));
        $jamKeluarBaru = date('H:i:s', strtotime("1970-01-01 $jam_kerja->jam_keluar +1 hour"));
        $jamKeluar = date('H:i:s', strtotime("1970-01-01 $jam_kerja->jam_keluar"));
        // dd($jamMasukBaru < $jam);
        $libur = Libur::where('tanggal', $tanggal)->exists();
        if(($jamMasukBaru < $jam) and ($jamKeluarBaru > $jam) and !$libur){
            $presensi = '0';
        }else{
            $presensi = '1';
        }
            $izin = $jam < $jamKeluar;
            // dd($izin);
        $riwayat = Absensi::where('user_id', '=', Auth::user()->id)->get();
        return view('user.dataabsen', compact('presensi', 'riwayat', 'izin'));
    } 
    public function masuk(Request $request) {
        $timezone = time()+ (60 * 60 * 8);
        $tanggal = gmdate('Y-m-d', $timezone);
        $jam    = gmdate('H:i:s', $timezone);
        $hari     =  gmdate('l', $timezone);
        $lokasikantor = Helper::lokasiKantor();
        $jarakKantor = Helper::jarakKantor();
        $lock = explode(', ', $lokasikantor); 
        
        $lokasikantor = ['latitude' => $lock[0],  'longitude' => $lock[1]];  
        $lokasiuser = ['latitude' => $request['lat'],  'longitude' => $request['long']];  
        
        $jaraknya = Helper::howLong($lokasikantor, $lokasiuser);

        $hadir = Absensi::where('user_id', '=', Auth::user()->id)->where('tanggal', '=', $tanggal)->first();
        $liburAll = Libur::get();

        $hariIni = date('Y-m-d'); 
        $libur = Libur::where('tanggal', $tanggal)->exists();

        if($hari == 'Saturday' or $hari == 'Monday' or $libur){
            return redirect()->route('data_absen')->with('libur', 'Hari ini tuch libur gais sumpah');
        }
        else{
            if($hadir){
                if($hadir->status == 'izin'){
                    return redirect()->route('data_absen')->with('terimaizin', 'Hari ini anda izin');
        
                }else{
                    
                    return redirect()->route('data_absen')->with('hadir', 'Anda sudah absen masuk!');
                }
            }
            else{
                if ($jaraknya > $jarakKantor){
                    return redirect()->route('data_absen')->with('warning', 'Anda terlalu jauh dari lokasi kantor untuk melakukan absensi. ')->with('jaraknya', $jaraknya);
                }
                else{
                    // dd(Auth::user()->id);
                    // $nugu = Absensi::first();
                    // dd($nugu->user->nama);
                    $absen = new Absensi();
                    $absen->user_id = Auth::user()->id;
                    $absen->tanggal = $tanggal;
                    $absen->absen_masuk = $jam;
                    $absen->lokasi_masuk = $request['lat'].', '.$request['long'];
                    $absen->ket_masuk = 'tepat waktu';
                    $absen->status = 'hadir';
                    $absen->save();
                    return redirect()->route('data_absen')->with('success', 'Anda berhasil absen masuk')->with('jaraknya', $jaraknya);
                }
            }
           
        }
    } 

    public function keluar(Request $request) {
        $timezone = time()+ (60 * 60 * 8);
        $tanggal = gmdate('Y-m-d', $timezone);
        $jam    = gmdate('H:i:s', $timezone);
        $hari     =  gmdate('l', $timezone);
        $lokasikantor = Helper::lokasiKantor();
        $jarakKantor = Helper::jarakKantor();
        $lock = explode(', ', $lokasikantor); 

        $lokasikantor = ['latitude' => $lock[0],  'longitude' => $lock[1]];  
        $lokasiuser = ['latitude' => $request['lat'],  'longitude' => $request['long']];  
        
        $jaraknya = Helper::howLong($lokasikantor, $lokasiuser);

        $hadir = Absensi::where('user_id', '=', Auth::user()->id)->where('tanggal', '=', $tanggal)->first();
        // dd($hadir->id);
        if($hadir){
            if($hadir->status == 'izin'){
                return redirect()->route('data_absen')->with('terimaizin', 'Hari ini anda izin');

            }else{
                if($jaraknya > $jarakKantor){
                    return redirect()->route('data_absen')->with('warning', 'Anda terlalu jauh dari lokasi kantor untuk melakukan absensi. ')->with('jaraknya', $jaraknya);
                }
                else{
                    // dd(Auth::user()->id);
                    // $nugu = Absensi::first();
                    // dd($nugu->user->nama);
                    $absen = Absensi::findOrFail($hadir->id);
                    $absen->absen_keluar = $jam;
                    $absen->lokasi_keluar = $request['lat'].', '.$request['long'];
                    $absen->ket_keluar = 'tepat waktu';
                    $absen->update();
                    return redirect()->route('data_absen')->with('success', 'Anda berhasil absen keluar')->with('jaraknya', $jaraknya);
                }
            }
        }else{
            return redirect()->route('data_absen')->with('absen', 'Anda belum absen masuk!');
        };
        
        if($hari == 'Saturday' or $hari == 'Sunday'){
            return redirect()->route('data_absen')->with('libur', 'Hari ini tuch libur gais sumpah');
        }
        else{
            if ($jaraknya > $jarakKantor){
                return redirect()->route('data_absen')->with('warning', 'Anda terlalu jauh dari lokasi kantor untuk melakukan absensi. ')->with('jaraknya', $jaraknya);
            }
            else{
                // dd(Auth::user()->id);
                // $nugu = Absensi::first();
                // dd($nugu->user->nama);
                $absen = new Absensi();
                $absen->user_id = Auth::user()->id;
                $absen->tanggal = $tanggal;
                $absen->absen_masuk = $jam;
                $absen->lokasi_masuk = $request['lat'].', '.$request['long'];
                $absen->ket_masuk = 'tepat waktu';
                $absen->status = 'hadir';
                // $absen->save();
                return redirect()->route('data_absen')->with('success', 'Anda berhasil absen masuk')->with('jaraknya', $jaraknya);
            }
        }
    } 

    public function izin(Request $request)
    {
        $request->validate([
            'tanggal' => ['required', 'date', 'after_or_equal:today'],
            // 'alasan'  => ['required', 'string'],
            'ket_izin'=> ['required', 'string'],

        ]);
        $tanggal = gmdate('Y-m-d', time() + (60 * 60 * 8));

        $hadir = Absensi::where('user_id', '=', Auth::user()->id)->where('tanggal', '=', $tanggal)->first();
        if($hadir){
            $izin = Absensi::findOrFail($hadir->id);
                    $izin->ket_izin = $request->input('ket_izin');
                    $izin->status     = 'pending';
                    $izin->update();
        }else{
            $izin = new Absensi();
            $izin->user_id    = Auth::user()->id;
            $izin->tanggal    = $request->input('tanggal');
            // $izin->alasan     = $request->input('alasan');
            $izin->ket_izin = $request->input('ket_izin');
            $izin->status     = 'pending';
            $izin->save();
        }

        return redirect()->route('data_absen')->with('izin', 'Pengajuan izin berhasil dikirim!');
                         
    }
    public function profiluser(){
        return view('user.profil');
    }

    public function ubahprofil(Request $request){
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

        return redirect()->route('profiluser')->with('profiluser', 'Profil berhasil diubah');
    }

}
