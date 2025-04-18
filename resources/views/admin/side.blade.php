<div class="l-navbar" id="nav-bar">
  <nav class="nav">
      <div> <a href="#" class="nav_logo"> <img src="{{ asset('image/logokarya.png') }}" alt="" class="navlog"> <span class="nav_logo-name judul">ABSENSI KARYAWAN</span> </a>

          <div class="d-flex gap-3 ps-3 align-items-center">
              <img src="{{ asset('image/fila.jpg') }}" alt="" width="35px"class="rounded-circle">
              <p class="mt-3 text-white"> Nafilah Diasty </p>
          </div><hr style="height: 2px;" class="bg-white mx-3">
          <div class="nav_list"> 
      
            <a href="#" class="nav_link active"> <img src="{{ asset('image/dashboard.svg') }}" alt="" width="40%"> <span class="nav_name dashboard">Dashboard</span> </a>
              
            <a href="#" class="nav_link"> <img src="{{ asset('image/kalender.svg') }}" alt="" width="47%"><span class="nav_name  kehadiran">Kehadiran</span> </a>

              <a class="nav_link d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#submenuMasterData" role="button" aria-expanded="false" aria-controls="submenuMasterData">
                <div class="d-flex align-items-center">
                  <img src="{{ asset('image/master data.svg') }}" alt="" width="11%">
                  <span class="nav_name masterdata ms-3">Master Data</span>
                  <i  style="margin-left: 20px;" class="bi bi-chevron-left toggle-icon"></i>
                </div>
              </a>
              
              <div class="collapse ps-4" id="submenuMasterData">
                <a href="#" class="nav_link d-flex align-items-center gap-2">
                  <img src="{{ asset('image/user.svg') }}" alt="" width="11%">
                  <span class="nav_name kar ms-2">Data Karyawan</span>
                </a>
                <a href="#" class="nav_link d-flex align-items-center gap-2">
                  <img src="{{ asset('image/cuti.svg') }}" alt="" width="11%">
                  <span class="nav_name kar ms-2">Hari Libur</span>
                </a>
              </div>
              
            
              <a href="#" class="nav_link"> <img src="{{ asset('image/setting.svg') }}" alt="" width="40%"> <span class="nav_name setting">Setting Absen</span> </a> 

          </div>

          
      </div> <a href="{{ route('logout') }}" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
  </nav>
  
</div>

{{-- <a href="#" class="nav_link active"> <img src="{{ asset('image/dashboard.svg') }}" alt="" width="40%"> <span class="nav_name dashboard">Dashboard</span> </a>
              
              <a href="#" class="nav_link"> <img src="{{ asset('image/kalender.svg') }}" alt="" width="47%"><span class="nav_name  kehadiran">Kehadiran</span> </a>

              <a href="#" class="nav_link"> <img src="{{ asset('image/master data.svg') }}" alt="" width="40%"> <span class="nav_name masterdata">Master Data</span> </a>
              <a href="#" class="nav_link"> <img src="{{ asset('image/user.svg') }}" alt="" width="40%"> <span class="nav_name kar">Data Karyawan</span> </a>
              <a href="#" class="nav_link"> <img src="{{ asset('image/cuti.svg') }}" alt="" width="40%"> <span class="nav_name cuti">Cuti</span> </a>
              
              <a href="#" class="nav_link"> <img src="{{ asset('image/setting.svg') }}" alt="" width="40%"> <span class="nav_name setting">Setting Absen</span> </a>  --}}