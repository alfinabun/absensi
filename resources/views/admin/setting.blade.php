@extends('admin.layout')
@section('judul', 'setting')
@section('content')
    <h2 class="pt-3 pb-2 fw-bold" style="color: #917ECD;">Setting Absen</h2>
    <div class="container-fluid d-flex justify-content-between "
        style="background-color: #DFCDE1; height:150px; border-radius:5px;">
        <div>
            <span class="fs-2">Pengaturan Jadwal Absensi</span><br>
            <span class="fw-bold" style="color:#917ECD;">Atur Jadwal Jam Masuk & Jam Keluar</span><br>
            <span class="fw-bold" style="color:#917ECD;">Atur Lokasi Absen</span>
        </div>
        <img src="{{ asset('image/settingab.png') }}" alt="" style="height: 350px; margin-top: -7%">
    </div>

    <form action="{{ route('setting.absen') }}" method="POST" class="p-4 rounded"
        style="margin-bottom: 50px; margin-top: 70px; background-color: #ffffff; border: none; box-shadow: none;">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Jam Masuk</label>
                <input type="time" name="jam_masuk" class="form-control" style="border-color: #DFCDE1;">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Jam Keluar</label>
                <input type="time" name="jam_keluar" class="form-control" style="border-color: #DFCDE1;">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Garis Lintang-Bujur</label>
                <input type="text" name="lokasi" class="form-control" style="border-color: #DFCDE1;" value="{{ $lokasi->lokasi }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Batas Jarak (Meter)</label>
                <input type="number" name="batas_jarak" class="form-control" style="border-color: #DFCDE1;" value="{{ $lokasi->batas_jarak }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary border-2"
            style="background-color: #a195c7; border-color: #F5CEFB; padding: 10px;">Submit</button>
    </form>

    <div class="row">

        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card"
          style="margin-bottom: 70px; width: 100%; height: 300px; border: none; box-shadow: none; background-color: #B3A6DD;">
                <div class="card-body d-flex justify-content-center align-items-center">
                <iframe class="p-3" style="left:0;top:0;height:100%;width:100%;position:absolute;" src="https://maps.google.com/maps?q={{ $lokasi->lokasi }}&output=embed" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
              
            </div>
        </div>
        <div class="col-sm-6 d-flex justify-content-center align-items-center">
            <div class="card"
                style="margin-bottom: 70px; width: 97%; height: 150px; border: none; box-shadow: none; background-color: #ffffff;">
                <div class="card-body">
                    <h5 class="card-title fs-3">Jadwal Absen</h5>

                   
                    @if ($lokasi)
                        <div class="card" style="width: 100%; height: 35px; background-color: #917ECD;">
                            <div class="card-body p-0 d-flex justify-content-center align-items-center">
                                <p class="mb-0">Jam Masuk {{ $lokasi->jam_masuk }}</p>
                            </div>
                        </div>

                        <div class="card mt-2" style="width: 100%; height: 35px; background-color: #917ECD;">
                            <div class="card-body p-0 d-flex justify-content-center align-items-center">
                                <p class="mb-0">Jam Keluar {{ $lokasi->jam_keluar }}</p>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            title: 'Sukses!',
            icon: 'success',
            text: '{{ session("success") }}'
        });
    </script>
@endif

@endsection
