<header class="header bgheader" id="header">
  <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
  <div class="jamw" id="waktu"></div>
  
  
  <div class="dropdown me-3">
    <div class="dropdown-toggle" data-bs-toggle="dropdown" style="cursor: pointer; position: relative;">
      <img src="{{ asset('image/' . Auth::user()->foto) }}" alt="Foto Profil" class="rounded-circle profile-img">
    </div>
    <ul class="dropdown-menu dropdown-menu-end">
      <li><span class="dropdown-item-text fw-bold">{{ Auth::user()->nama }}</span></li>
      <li><hr class="dropdown-divider"></li>
      <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Setting Profil</a></li>
      <li><a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
    </ul>
  </div>
</header>
