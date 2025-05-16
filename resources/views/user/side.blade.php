<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> <a href="#" class="nav_logo"> <img src="{{ asset('image/logokarya.png') }}" alt=""
                    class="navlog"> <span class="nav_logo-name judul">ABSENSI KARYAWAN</span> </a>

            <div class="d-flex gap-3 ps-3 align-items-center">
                <img src="{{ asset('image/' . Auth::user()->foto) }}" alt=""
                    width="35px"class="rounded-circle profile-img">
                <span class="text-white">{{ Auth::user()->nama }}</span>
            </div>
            <hr style="height: 2px;" class="bg-white mx-3">
            <div class="nav_list">

                <a href="{{ route('user.dashboard') }}"
                    class="nav_link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                    <img src="{{ asset('image/dashboard.svg') }}" alt="" width="40%">
                    <span class="nav_name dashboard">Dashboard</span>
                </a>

                <a href="{{ route('data_absen') }}"
                    class="nav_link {{ request()->routeIs('data_absen') ? 'active' : '' }}">
                    <img src="{{ asset('image/kalender.svg') }}" alt="" width="47%">
                    <span class="nav_name kehadiran">Data Absen</span>
                </a>

            </div>


            {{-- </div> <a href="{{ route('logout') }}" class="nav_link active"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a> --}}
    </nav>

</div>
