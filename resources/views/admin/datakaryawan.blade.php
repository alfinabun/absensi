@extends('admin.layout')
@section('judul','Dashboard')
@section('content')

  <div class="d-flex justify-content-between align-items-center">
    <h2 class="mb-4 mt-3" style="color:#917ECD;">Daftar Karyawan</h2>
    <div>
      <button type="button" class="btn text-white" style="background-color: #917ECD;" data-bs-toggle="modal" data-bs-target="#dataModal">
        <img src="{{ asset('image/tambah.svg') }}" alt="" style="width: 20px; margin-right: 8px;">
         Tambah Karyawan </button>
    </div>
  </div>
  

  <hr style="height: 2px; color:#917ECD;">

  <div class="d-flex justify-content-between align-items-center mb-3">
    <div class="d-flex align-items-center gap-2">
        <button class="btn btn-secondary btn-sm">Excel</button>
        <label class="mb-0">
            Show 
            <select class="form-select d-inline w-auto">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
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
      <tr >
        <th style="background-color: #917ECD;" scope="col" class="col-1" >Foto</th>
        <th style="background-color: #917ECD;" scope="col">Nama</th>
        <th style="background-color: #917ECD;" scope="col">Jenis Kelamin</th>
        <th style="background-color: #917ECD;"  scope="col">Alamat</th>
        <th style="background-color: #917ECD;"  scope="col">Jabatan</th>
        <th style="background-color: #917ECD;" scope="col">No Telp</th>
        <th style="background-color: #917ECD;"  scope="col">Email</th>
        <th style="background-color: #917ECD;" scope="col">Password</th>
        <th style="background-color: #917ECD;" scope="col" class="col-2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="text-center">
          <img src="{{ asset('image/download.jpg') }}" alt="Foto Karyawan" width="60px" height="60px">
        </td>
        <td>Abun Sayang</td>
        <td>Laki-laki</td>
        <td>Jakarta</td>
        <td>Sekretaris</td>
        <td>088706059823</td>
        <td>abun@gmail.com</td>
        <td>123</td>
        <td class="text-center">
          <button type="button" class="btn btn-sm me-1" style="background-color: #84c2fc;" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
          <a href="#" class="btn btn-sm " style="background-color:#f86c6c;">Hapus</a>
        </td>
      </tr>
      <tr>
        <td class="text-center">
          <img src="{{  asset('image/mark lee.jpg') }}" alt="Foto Karyawan" width="60px" height="60px">
        </td>
        <td>Mark lee</td>
        <td>Laki-laki</td>
        <td>Busan</td>
        <td>Manajer</td>
        <td>081906806724</td>
        <td>marklee@gmail.com</td>
        <td>12345</td>
        <td class="text-center">
          <button type="button" class="btn btn-sm me-1" style="background-color: #84c2fc;" data-bs-toggle="modal" data-bs-target="#editModal">Edit</button>
          <a href="#" class="btn btn-sm" style="background-color:#f86c6c;">Hapus</a>
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
  
  {{-- tambah --}}
  <div class="modal fade w-100  " id="dataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #917ECD;">
          <h1 class="modal-title fs-3 text-white" id="exampleModalLabel">Tambah Karyawan</h1>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="rounded" style=" background-color: #ffffff; border: none; box-shadow: none;">
            <div class="row">
              <div class="col-sm-6 mb-3">
                <label for="photo" class="form-label">Foto Karyawan</label>
                <input type="file" class="form-control" id="photo">
              </div>
            
            
              <div class="col-sm-6 mb-3">
                <label for="fullName" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" id="fullName" placeholder="Masukkan Nama Karyawan">
              </div>
            
            
              <div class="col-sm-6 mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <select class="form-select" id="gender">
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
            
              
              <div class="col-sm-6 mb-3">
                <label for="address" class="form-label">Alamat</label>
                <textarea class="form-control" id="address" rows="3" placeholder="Masukkan Alamat"></textarea>
              </div>
            
              <div class="col-sm-6 mb-3">
                <label for="position" class="form-label" value="Jabatan">Jabatan</label>
                <select class="form-select" id="position">
                  <option value="">Pilih Jabatan</option>
                  <option value="Sekretaris">Sekretaris</option>
                  <option value="Manajer">Manajer</option>
                  <option value="Staff">Staff</option>
                  <option value="Kepala Departemen">Kepala Departemen</option>
                  <option value="HRD">HRD</option>
                </select>
              </div>
            
              
              <div class="col-sm-6 mb-3">
                <label for="phone" class="form-label">No Telp</label>
                <input type="tel" class="form-control" id="phone" placeholder="Masukkan Nomor Telepon">
              </div>
            
              
              <div class="col-sm-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Masukkan Email">
              </div>
            
            
              <div class="col-sm-6 mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
              </div>
            </div>
            
          
          
         
          </form>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary border-2" style="border-color: #faf7fa; padding: 10px;" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn border-2" style="background-color: #a195c7; border-color: #F5CEFB; padding: 10px;">Tambah</button>
        </div>
      </div>
    </div>
  </div>

  {{-- edit --}}
  <div class="modal fade w-100  " id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #917ECD;">
          <h1 class="modal-title fs-3 text-white" id="exampleModalLabel">Edit Karyawan</h1>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="rounded" style=" background-color: #ffffff; border: none; box-shadow: none;">
          <div class="row">
            <div class="col-sm-6 mb-3">
              <label for="photo" class="form-label">Foto Karyawan</label>
              <input type="file" class="form-control" id="photo">
            </div>
          
          
            <div class="col-sm-6 mb-3">
              <label for="fullName" class="form-label">Nama Karyawan</label>
              <input type="text" class="form-control" id="fullName" placeholder="Masukkan Nama Karyawan">
            </div>
          
          
            <div class="col-sm-6 mb-3">
              <label for="gender" class="form-label">Jenis Kelamin</label>
              <select class="form-select" id="gender">
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
          
            
            <div class="col-sm-6 mb-3">
              <label for="address" class="form-label">Alamat</label>
              <textarea class="form-control" id="address" rows="3" placeholder="Masukkan Alamat"></textarea>
            </div>
          
            
            <div class="col-sm-6 mb-3">
              <label for="position" class="form-label" value="Jabatan">Jabatan</label>
              <select class="form-select" id="position">
                <option value="Sekretaris">Sekretaris</option>
                <option value="Manajer">Manajer</option>
                <option value="Staff">Staff</option>
                <option value="Kepala Departemen">Kepala Departemen</option>
                <option value="HRD">HRD</option>
              </select>
            </div>
          
            
            <div class="col-sm-6 mb-3">
              <label for="phone" class="form-label">No Telp</label>
              <input type="tel" class="form-control" id="phone" placeholder="Masukkan Nomor Telepon">
            </div>
          
            
            <div class="col-sm-6 mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Masukkan Email">
            </div>
          
          
            <div class="col-sm-6 mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Masukkan Password">
            </div>
          </div>
            
          
          
         
          </form>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary border-2" style="border-color: #faf7fa; padding: 10px;" data-bs-dismiss="modal">Batal</button>
          <button type="button" class="btn border-2" style="background-color: #a195c7; border-color: #F5CEFB; padding: 10px;">Simpan</button>
        </div>
      </div>
    </div>
  </div>
    
@endsection



