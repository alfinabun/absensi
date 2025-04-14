@extends('admin.layout')
@section('judul','Dashboard')
@section('content') 
    <h2 class="mb-4" style="color:#917ECD; margin-top:80px;">Absensi</h2>
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

@endsection

