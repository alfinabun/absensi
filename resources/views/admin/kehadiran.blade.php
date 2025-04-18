@extends('admin.layout')
@section('judul','Dashboard')
@section('content') 
    <h2 class="mb-4" style="color:#917ECD; margin-top:80px;">Absensi</h2>
    <hr style="height: 2px; color:#917ECD;">

    <button type="button" class="btn text-black mb-2 fw-bold" style="background-color: #917ECD;">
      Absensi Hari Ini
    </button>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center gap-2">
            <button class="btn btn-secondary btn-sm">Excel</button>
            <label class="mb-0">
                Show 
                <select class="form-select d-inline w-auto">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="50">75</option>
                    <option value="100">100</option>
                </select> entries
            </label>
        </div>
        <div>
            <label class="mb-0">
                Search:
                <input type="search" class="form-control d-inline w-auto" placeholder="">
            </label>
        </div>
    </div>
    
    <table class="table table-bordered table-hover align-middle">
        <thead class=" text-center" >
          <tr>
            <th style="background-color: #917ECD;">ID</th>
            <th style="background-color: #917ECD;" class="col-1" >Foto</th>
            <th style="background-color: #917ECD;">Tanggal</th>
            <th style="background-color: #917ECD;">Nama Karyawan</th>
            <th style="background-color: #917ECD;">Absen Masuk</th>
            <th style="background-color: #917ECD;">Absen Keluar</th>
            <th style="background-color: #917ECD;">Status</th>
            <th style="background-color: #917ECD;">Izin</th>
            <th style="background-color: #917ECD;">Keterangan</th>
            <th style="background-color: #917ECD;">Aksi</th>
        </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center p-4">
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-center">
            </td>
          </tr>
        </tbody>
      </table>
      <div class="d-flex justify-content-between align-items-center w-100 mb-3">
        <div>Showing 1 to 2 of 2 entries</div>
        <div class="ms-auto">
            <nav>
                <ul class="pagination mb-0">
                    <li class="disabled"><a class="page-link" href="#" style="border: none">Prev</a></li>
                    <li class="active"><a class="page-link" href="#" style="background-color: #917ECD; border: none">1</a></li>
                    <li class="disabled"><a class="page-link" href="#" style="border: none">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>


      <div class="card p-3 mb-5">
        <h3 class="mb-4">Riwayat Absensi</h3>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-secondary btn-sm">Excel</button>
                <label class="mb-0">
                    Show 
                    <select class="form-select d-inline w-auto">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="50">75</option>
                        <option value="100">100</option>
                    </select> entries
                </label>
            </div>
            <div>
                <label class="mb-0">
                    Search:
                    <input type="search" class="form-control d-inline w-auto" placeholder="">
                </label>
            </div>
        </div>         
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <a href="" class="btn btn-outline-primary me-2">Riwayat Hari Ini</a>
                <a href="" class="btn btn-outline-secondary">Riwayat Hari Sebelumnya</a>
            </div>
        
        <table class="table table-bordered table-hover">
            <thead class="text-center">
                <tr>
                    <th style="background-color: #917ECD;">ID</th>
                    <th style="background-color: #917ECD;" class="col-1" >Foto</th>
                    <th style="background-color: #917ECD;">Tanggal</th>
                    <th style="background-color: #917ECD;">Nama Karyawan</th>
                    <th style="background-color: #917ECD;">Absen Masuk</th>
                    <th style="background-color: #917ECD;">Absen Keluar</th>
                    <th style="background-color: #917ECD;">Status</th>
                    <th style="background-color: #917ECD;">Izin</th>
                    <th style="background-color: #917ECD;">Keterangan</th>
                    <th style="background-color: #917ECD;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td >1</td>
                    <td><img src="{{ asset('image/download.jpg') }}" alt="Foto Karyawan" width="60px" height="60px"></td>
                    <td>2025-04-17</td>
                    <td>Abun</td>
                    <td>08:00</td>
                    <td>17:00</td>
                    <td>Hadir</td>
                    <td>-</td>
                    <td>-</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-sm me-1" style="background-color: #84c2fc;">Edit</button>
                      <a href="#" class="btn btn-sm " style="background-color:#98faa0;">Detail</a>
                    </td>
                </tr>
                <tr class="text-center">
                  <td >2</td>
                    <td><img src="{{ asset('image/mark lee.jpg') }}" alt="Foto Karyawan" width="60px" height="60px"></td>
                    <td>2025-04-17</td>
                    <td>Mark lee</td>
                    <td>08:00</td>
                    <td>17:00</td>
                    <td>Hadir</td>
                    <td>-</td>
                    <td>-</td>
                    <td class="text-center">
                      <button type="button" class="btn btn-sm me-1" style="background-color: #84c2fc;">Edit</button>
                      <a href="#" class="btn btn-sm " style="background-color:#98faa0;">Detail</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-between align-items-center w-100">
          <div>Showing 1 to 2 of 2 entries</div>
          <div class="ms-auto">
              <nav>
                  <ul class="pagination mb-0">
                      <li class="disabled"><a class="page-link" href="#" style="border: none">Prev</a></li>
                      <li class="active"><a class="page-link" href="#" style="background-color: #917ECD; border: none">1</a></li>
                      <li class="disabled"><a class="page-link" href="#" style="border: none">Next</a></li>
                  </ul>
              </nav>
          </div>
      </div>
    </div>
    
      
      
      
      

@endsection

