@extends('user.layout')
@section('judul', 'Dashboard user')
@section('content')
    <h2 class="mb-4" style="color:#917ECD; margin-top:80px;">Welcome, {{ Auth::user()->nama }}</h2>
    <hr style="height: 2px; color:#917ECD;">
    <div class="container px-4">
        <div class="row">
            <div class="col-sm-4 mt-3 mb-3">
                <div class="card" style="padding: 20px; border: none; background-color:#DFCDE1; width: 100%;">
                    <div class="text-center pt-4">
                        <img src="{{ asset('image/' . Auth::user()->foto) }}" alt="Foto" width="100%"
                            class="rounded-circle profile-imgg" style="max-width: 250px;">
                    </div>

                    <div class="card my-4" style="height: 50px; background-color: #917ECD;">
                        <div class="card-body p-0 d-flex align-items-center">
                            <div class="px-3">
                                <i class="bi bi-person-vcard text-white fs-4"></i>
                            </div>
                            <span class="text-white">Nik - {{ Auth::user()->nik }}</span>
                        </div>
                    </div>

                    <div class="card mb-4" style="height: 50px; background-color: #917ECD;">
                        <div class="card-body p-0 d-flex align-items-center">
                            <div class="px-3">
                                <i class="bi bi-person-circle text-white fs-4"></i>
                            </div>
                            <span class="text-white">Nama - {{ Auth::user()->nama }}</span>
                        </div>
                    </div>

                    <div class="card" style="height: 50px; background-color: #917ECD;">
                        <div class="card-body p-0 d-flex align-items-center">
                            <div class="px-3">
                                <i class="bi bi-briefcase text-white fs-4"></i>
                            </div>
                            <span class="text-white">Jabatan - {{ Auth::user()->jabatan }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-8 mt-3">
                <div class="card mb-2" style="height: 300px; border: none; background-color: #B3A6DD; width: 100%;">
                    <div class="card-body d-flex justify-content-center align-items-center" id="demo">
                        {{-- <iframe class="p-3" style="left:0;top:0;height:100%;width:100%;position:absolute;"
                            src="https://maps.google.com/maps?q=-5.026052709502253, 119.46774814238094&output=embed"
                            width="800" height="600" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                    </div>
                </div>
                {{-- <button class="btn btn-sm border-2 text-white" style="background-color: #a195c7; border-color: #F5CEFB; padding: 10px;" onclick="getLocation()">Lokasi anda</button> --}}



                <div class="card mt-2 mb-3" style="height: 175px; border: none; background-color: #ffffff; width: 100%;">
                    <div class="card-body">
                        <h5 class="card-title fs-4">Jadwal Absen</h5>
                        <div class="card" style="height: 35px; background-color: #917ECD;">
                            <div class="card-body p-0 d-flex justify-content-center align-items-center">
                                <p class="mb-0 text-white">Jam Masuk 08:00</p>
                            </div>
                        </div>
                        <div class="card mt-2" style="height: 35px; background-color: #917ECD;">
                            <div class="card-body p-0 d-flex justify-content-center align-items-center">
                                <p class="mb-0 text-white">Jam Keluar 16:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const x = document.getElementById("demo");
        window.onload = getLocation;
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(success, error);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function success(position) {
            x.innerHTML =
                "<iframe class='p-3' style='left:0;top:0;height:100%;width:100%;position:absolute;' src='https://maps.google.com/maps?q=" +
                position.coords.latitude + ", " + position.coords.longitude +
                "&output=embed' width='800' height='600' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>";
        }

        function error() {
            alert("Sorry, no position available.");
        }
    </script>

@endsection
