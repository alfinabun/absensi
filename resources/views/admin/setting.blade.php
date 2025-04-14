@extends('admin.layout')
@section('judul','setting')
@section('content')
    <h2 class="pt-3 pb-2 fw-bold" style="color: #917ECD;">Setting Absen</h2>
          <div class="container-fluid d-flex justify-content-between " style="background-color: #DFCDE1; height:150px; border-radius:5px;">
            <div>
              <span class="fs-2">Pengaturan Jadwal Absensi</span><br>
              <span class="fw-bold" style="color:#917ECD;">Atur Jadwal Jam Masuk & Jam Keluar</span><br>
              <span class="fw-bold" style="color:#917ECD;">Atur Lokasi Absen</span>
            </div>
            <img src="{{ asset('image/settingab.png') }}" alt="" style="height: 350px; margin-top: -7%">
          </div>

            <form class="p-4 rounded" style="margin-bottom: 50px; margin-top: 70px; background-color: #ffffff; border: none; box-shadow: none;">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="email1" class="form-label">Jam Masuk</label>
                <input type="email" class="form-control" style="border-color: #DFCDE1;" id="email1" aria-describedby="emailHelp1">
                <div id="emailHelp1" class="form-text">Jam Masuk Kerja</div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="password1" class="form-label">Jam Keluar</label>
                <input type="password" class="form-control" style="border-color: #DFCDE1;" id="password1">
                <div id="emailHelp1" class="form-text">Jam Keluar / Pulang Kerja</div>
              </div>
            </div>
          
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="email2" class="form-label">Garis Lintang-Bujur</label>
                <input type="email" class="form-control" style="border-color: #DFCDE1;" id="email2" aria-describedby="emailHelp2">
                <div id="emailHelp2" class="form-text">Latitude Longitude / Garis Lintang-Bujur</div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="password2" class="form-label">Batas Jarak</label>
                <input type="password" class="form-control" style="border-color: #DFCDE1;" id="password2">
                <div id="emailHelp2" class="form-text">Jarak tersimpan dalam satuan Meter</div>
              </div>
            </div>
          
            <button type="submit" class="btn btn-primary border-2" style="background-color: #a195c7; border-color: #F5CEFB; padding: 10px;">Submit</button>
          </form>

          <div class="row">
        
            <div class="col-sm-6 mb-3 mb-sm-0">
              <div class="card" style="margin-bottom: 70px; width: 100%; height: 300px; border: none; box-shadow: none; background-color: #B3A6DD;">
                <div class="card-body d-flex justify-content-center align-items-center">
                  <h5 class="card-title fw-bold fs-3">LOKASI</h5>
                </div>
              </div>
            </div>
          
            <div class="col-sm-6 d-flex justify-content-center align-items-center">
              <div class="card" style="margin-bottom: 70px; width: 97%; height: 150px; border: none; box-shadow: none; background-color: #ffffff;">
                <div class="card-body">
                  <h5 class="card-title fs-3">Jadwal Absen</h5>
          
              
                  <div class="card" style="width: 100%; height: 35px; background-color: #917ECD;">
                    <div class="card-body p-0 d-flex justify-content-center align-items-center">
                      <p class="mb-0">Jam Masuk 08:00</p>
                    </div>
                  </div>
        
                  <div class="card mt-2" style="width: 100%; height: 35px; background-color: #917ECD;">
                    <div class="card-body p-0 d-flex justify-content-center align-items-center">
                      <p class="mb-0">Jam Keluar 16:00</p>
                    </div>
                  </div>
          
                </div>
              </div>
            </div>
          </div>
          
@endsection