<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Absensi;
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

     
        $jaraknya = Helper::howLong($locationA, $locationB);

        return view('user.dashboard', compact('jaraknya','lock'));
    }

    public function data_absen() {
        return view('user.dataabsen');
    } 
    public function masuk(Request $request) {
        $timezone = time();
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

        if($hari == 'Saturday' or $hari == 'Sunday'){
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
        $timezone = time();
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
            if ($jaraknya > $jarakKantor){
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
        $tanggal = gmdate('Y-m-d', time());

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

}
