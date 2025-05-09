@extends('user.layout')
@section('judul','Data Karyawan')
@section('content')

<h2 class="mb-4" style="color:#917ECD; margin-top:80px;">Absensi</h2>
<hr style="height: 2px; color:#917ECD;">
<div class="row justify-content-center">    
  <div class="col-sm-4 mb-3">
    <div class="card" style="width: 100%; height: 100px; border: none; box-shadow: none; background-color: #a6f29c;">
      <div class="card-body d-flex justify-content-center align-items-center">
        <h5 class="card-title fs-4">ABSEN MASUK</h5>
      </div>
    </div>
  </div>
  <div class="col-sm-4 mb-3">
    <div class="card" style="width: 100%; height: 100px; border: none; box-shadow: none; background-color: #f86c6c;">
      <div class="card-body d-flex justify-content-center align-items-center">
        <h5 class="card-title fs-4">ABSEN KELUAR</h5>
      </div>
    </div>
  </div>
  <div class="col-sm-4 mb-3">
    <div class="card" style="width: 100%; height: 100px; border: none; box-shadow: none; background-color: #84c2fc; cursor:pointer;" data-bs-toggle="modal" data-bs-target="#izinModal">
      <div class="card-body d-flex justify-content-center align-items-center">
        <h5 class="card-title fs-4">IZIN</h5>
      </div>
    </div>
  </div>  
</div>

<div class="card p-3 mb-5">
    <h3 class="mb-4">Riwayat Absensi</h3>
    <form action="" class="row g-3 mb-4">
        <div class="col-auto">
          <label for="bulan" class="col-form-label">Bulan:</label>
        </div>
        <div class="col-auto">
          <select name="bulan" id="bulan" class="form-select">
            @for ($m = 1; $m <= 12; $m++)
              <option value="{{ $m }}" {{ request('bulan') == $m ? 'selected' : '' }}>
                {{ DateTime::createFromFormat('!m', $m)->format('F') }}
              </option>
            @endfor
          </select>
        </div>
        <div class="col-auto">
          <label for="tahun" class="col-form-label">Tahun:</label>
        </div>
        <div class="col-auto">
          <select name="tahun" id="tahun" class="form-select">
            @for ($y = date('Y'); $y >= 2020; $y--)
              <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>{{ $y }}</option>
            @endfor
          </select>
        </div>
        <div class="col-auto">
          <button type="submit" class="btn" style="background-color: #917ECD;">Tampilkan</button>
        </div>
      </form>
    
    <table id="example" >
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
                  <a href="#" class="btn btn-sm " style="background-color:#98faa0;">Detail</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="modal fade w-100  " id="izinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #917ECD;">
          <h1 class="modal-title fs-3 text-white" id="exampleModalLabel">Pengajuan Izin</h1>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" class="rounded" style="background-color: #ffffff; border: none; box-shadow: none;" enctype="multipart/form-data">
                <div class="row">
                  <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                  </div>
                  <div class="mb-3">
                    <label for="alasan" class="form-label">Alasan</label>
                    <select name="alasan" id="alasan" class="form-select">
                      <option value="">-- Pilih Alasan --</option>
                      <option value="Sakit">Sakit</option>
                      <option value="Izin Keluarga">Izin Keluarga</option>
                      <option value="Keperluan Pribadi">Keperluan Pribadi</option>
                      <option value="Cuti">Cuti</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="ket" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="ket" name="ket">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn border-2" style="background-color: #a195c7; border-color: #F5CEFB; padding: 10px;">Tambah</button>
                  <button type="button" class="btn btn-secondary border-2" style="border-color: #faf7fa; padding: 10px;" data-bs-dismiss="modal">Batal</button>
                </div>
              </form>                        
        </div>
      </div>
    </div>
  </div>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.3/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.html5.min.js"></script>

<script>
let table = new DataTable('#example');
 table
     .buttons(0, null)
     .container()
     .prependTo(table.table().container());

</script>
@endsection
