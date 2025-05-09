@extends('admin.layout')
@section('judul','Dashboard')
@section('content')
<div class="height-100 bg-light">
    <div class="d-flex pt-4 gap-4">

        <div class="card" style="width: 18rem; height: 185px; background-color:#FFFDBD;">
            <div class="d-flex justify-content-between ">
                <h1 class="card-title mt-3" style="margin-left: 20px;" >0</h1>
                <img src="{{ asset('image/karyawan.svg') }}" alt="" width="30%" style="margin-right: 15px;" >
            </div>
            <h3 class="card-text pt-3 pb-2" style="margin-left: 20px;">Karyawan</h3>
            <div class="py-md-1 position-absolute start-0 end-0 bottom-0" style="background-color:#CCCA97;">
              <span class="ms-3">Lihat Selengkapnya</span>
            </div>
        </div>

        <div class="card" style="width: 18rem; height: 185px; background-color:#B1DFFF;">
            <div class="d-flex justify-content-between ">
                <h1 class="card-title mt-3" style="margin-left: 20px;" >0</h1>
                <img src="{{ asset('image/hadir.svg') }}" alt="" width="30%" style="margin-right: 15px;" >
            </div>
            <h3 class="card-text pt-3 pb-2" style="margin-left: 20px;">Total hadir</h3>
            <div class="py-md-1 position-absolute start-0 end-0 bottom-0" style="background-color:#728EA3;">
              <span class="ms-3">Lihat Selengkapnya</span>
            </div>
        </div>

        <div class="card" style="width: 18rem; height: 185px; background-color:#C7FFBF;">
            <div class="d-flex justify-content-between ">
                <h1 class="card-title mt-3" style="margin-left: 20px;">0</h1>
                <img src="{{ asset('image/izin (2).svg') }}" alt="" width="30%" style="margin-right: 15px;">
            </div>
            <h3 class="card-text pt-3 pb-2" style="margin-left: 20px;">Total Izin</h3>
            <div class="py-md-1 position-absolute start-0 end-0 bottom-0" style="background-color:#9FCC99;">
              <span class="ms-3">Lihat Selengkapnya</span>
            </div>
        </div>

        <div class="card" style="width: 18rem; height: 185px; background-color:#FFC3C3;">
            <div class="d-flex justify-content-between">
                <h1 class="card-title mt-3" style="margin-left: 20px;">0</h1>
                <img src="{{ asset('image/lokasi3.svg') }}" alt="" width="30%" style="margin-right: 15px;">
            </div>
            <h3 class="card-text pt-3 pb-2" style="margin-left: 20px;">Lokasi</h3>
            <div class="py-md-1 position-absolute start-0 end-0 bottom-0" style="background-color:#A37D7D;">
              <span class="ms-3">Lihat Selengkapnya</span>
            </div>
        </div>
       
</div>


@endsection