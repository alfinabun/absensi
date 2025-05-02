@extends('admin.layout')
@section('judul','Data Karyawan')
@section('content')

<div class="d-flex justify-content-between align-items-center" style="margin-top: 80px;">
  <h2 class="mb-4" style="color: #917ECD;">Daftar Karyawan</h2>
  
  <div class="d-flex align-items-center gap-2">
    <button 
      type="button" 
      class="btn text-white" 
      style="background-color: #917ECD;" 
      data-bs-toggle="modal" 
      data-bs-target="#dataModal"
    >
      <img 
        src="{{ asset('image/tambah.svg') }}" 
        alt="Tambah" 
        style="width: 20px; margin-right: 8px;"
      >
      Tambah Karyawan
    </button>
  </div>
</div>

<hr style="height: 2px; color:#917ECD;">

<table id="example" class="stripe" >
  <thead class=" text-center">
    <tr>
      <th style="background-color: #917ECD;" scope="col">No</th>
      <th style="background-color: #917ECD;" scope="col" class="col-1">Foto</th>
      <th style="background-color: #917ECD;" scope="col">Nik</th>
      <th style="background-color: #917ECD;" scope="col">Nama</th>
      <th style="background-color: #917ECD;" scope="col">Jenis Kelamin</th>
      <th style="background-color: #917ECD;" scope="col">Jabatan</th>
      <th style="background-color: #917ECD;" scope="col">No Telp</th>
      <th style="background-color: #917ECD;" scope="col">Level</th>
      <th style="background-color: #917ECD;" scope="col" class="col-2">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $dcc=0 ?>
    @foreach ($data as $a)
      <tr>
        <td class="text-center">{{ ++$dcc }}</td>
        <td class="text-center">
          <img src="{{ asset('image/'.$a->foto) }}" alt="Foto Karyawan" width="60px" height="60px">
        </td>
        <td>{{ $a->nik }}</td>
        <td>{{ $a->nama }}</td>
        <td>{{ $a->jenisKelamin }}</td>
        <td>{{ $a->jabatan }}</td>
        <td>{{ $a->notelp }}</td>
        <td>{{ $a->level }}</td>
        <td class="text-center">
          <button type="button" class="btn btn-sm me-1" style="background-color: #c5a3fc;" data-bs-toggle="modal" data-bs-target="#detailModal{{ $a->id }}">Detail</button>
          <button type="button" class="btn btn-sm me-1" style="background-color: #84c2fc;" data-bs-toggle="modal" data-bs-target="#editModal{{ $a->id }}">Edit</button>
          <button type="button" class="btn btn-sm me-1" style="background-color: #f86c6c;" onclick="hapusData({{ $a->id }})">Hapus</button>
        </td>
      </tr>

      <!-- Modal Detail -->
      <div class="modal fade w-100" id="detailModal{{ $a->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $a->id }}" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #917ECD;">
              <h5 class="modal-title text-white" id="detailModalLabel{{ $a->id }}">Detail Karyawan</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-4 text-center">
                  <img src="{{ asset('image/'.$a->foto) }}" alt="Foto Karyawan" class="img-fluid rounded" width="150">
                </div>
                <div class="col-md-8">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>NIK:</strong> {{ $a->nik }}</li>
                    <li class="list-group-item"><strong>Nama:</strong> {{ $a->nama }}</li>
                    <li class="list-group-item"><strong>Jenis Kelamin:</strong> {{ $a->jenisKelamin }}</li>
                    <li class="list-group-item"><strong>Alamat:</strong> {{ $a->alamat }}</li>
                    <li class="list-group-item"><strong>Jabatan:</strong> {{ $a->jabatan }}</li>
                    <li class="list-group-item"><strong>No Telp:</strong> {{ $a->notelp }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $a->email }}</li>
                    <li class="list-group-item"><strong>Level:</strong> {{ $a->level }}</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Edit -->
      <div class="modal fade w-100" id="editModal{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #917ECD;">
              <h1 class="modal-title fs-3 text-white" id="exampleModalLabel">Edit Karyawan</h1>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('update', $a->id) }}" class="rounded" style="background-color: #ffffff; border: none; box-shadow: none;" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="row">
                  <div class="col-sm-6 mb-3">
                    <label for="photo" class="form-label">Foto Karyawan</label>
                    <input type="file" class="form-control" id="photo" name="foto">
                    <input type="hidden" name="old_foto" value="{{ $a->foto }}">
                  </div>

                  <div class="col-sm-6 mb-3">
                    <label for="nik" class="form-label">Nik</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan Nik" value="{{ $a->nik }}">
                  </div>

                  <div class="col-sm-6 mb-3">
                    <label for="fullName" class="form-label">Nama Karyawan</label>
                    <input type="text" class="form-control" id="fullName" name="nama" placeholder="Masukkan Nama Karyawan" value="{{ $a->nama }}">
                  </div>

                  <div class="col-sm-6 mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" id="gender" name="jenisKelamin">
                      <option value="Laki-laki" {{ $a->jenisKelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                      <option value="Perempuan" {{ $a->jenisKelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                  </div>

                  <div class="col-sm-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$a->email}}" placeholder="Masukkan Email">
                  </div>

                  <div class="col-sm-6 mb-3">
                    <label for="position" class="form-label">Jabatan</label>
                    <select class="form-select" id="position" name="jabatan">
                      <option value="Sekretaris" {{ $a->jabatan == 'Sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                      <option value="Manajer" {{ $a->jabatan == 'Manajer' ? 'selected' : '' }}>Manajer</option>
                      <option value="Staff" {{ $a->jabatan == 'Staff' ? 'selected' : '' }}>Staff</option>
                    </select>
                  </div>

                  <div class="col-sm-6 mb-3">
                    <label for="phoneNumber" class="form-label">No Telp</label>
                    <input type="text" class="form-control" id="phoneNumber" name="notelp" placeholder="Masukkan No Telp" value="{{ $a->notelp }}">
                  </div>

                  <div class="col-sm-6 mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="address" name="alamat" placeholder="Masukkan Alamat" value="{{ $a->alamat }}">
                  </div>

                  <div class="col-sm-6 mb-3">
                    <label for="level" class="form-label">Level</label>
                    <select class="form-select" id="level" name="level">
                      <option value="Admin" {{ $a->level == 'Admin' ? 'selected' : '' }}>Admin</option>
                      <option value="User" {{ $a->level == 'User' ? 'selected' : '' }}>User</option>
                    </select>
                  </div>

                  <div class="col-sm-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn" style="background-color: #917ECD; color: white;">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </tbody>
</table>

<!-- Modal Tambah -->
<div class="modal fade w-100" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true" data-bs-backdrop="false" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #917ECD;">
        <h5 class="modal-title text-white" id="dataModalLabel">Tambah Karyawan</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('tambah_pegawai') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-sm-6 mb-3">
              <label for="foto" class="form-label">Foto Karyawan</label>
              <input type="file" class="form-control" id="foto" name="foto" required>
            </div>
            <div class="col-sm-6 mb-3">
              <label for="nik" class="form-label">Nik</label>
              <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan Nik" required>
            </div>
            <div class="col-sm-6 mb-3">
              <label for="nama" class="form-label">Nama Karyawan</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Karyawan" required>
            </div>
            <div class="col-sm-6 mb-3">
              <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
              <select class="form-select" id="jenisKelamin" name="jenisKelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="col-sm-6 mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
            </div>
            <div class="col-sm-6 mb-3">
              <label for="jabatan" class="form-label">Jabatan</label>
              <select class="form-select" id="jabatan" name="jabatan" required>
                <option value="Sekretaris">Sekretaris</option>
                <option value="Manajer">Manajer</option>
                <option value="Staff">Staff</option>
              </select>
            </div>
            <div class="col-sm-6 mb-3">
              <label for="notelp" class="form-label">No Telp</label>
              <input type="text" class="form-control" id="notelp" name="notelp" placeholder="Masukkan No Telp" required>
            </div>
            <div class="col-sm-6 mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
            </div>
            <div class="col-sm-6 mb-3">
              <label for="level" class="form-label">Level</label>
              <select class="form-select" id="level" name="level" required>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
              </select>
            </div>
            <div class="col-sm-6 mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn" style="background-color: #917ECD; color: white;">Tambah Karyawan</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<form id="form-hapus" method="POST" action="" style="display: none;">
  @csrf
  @method('DELETE')
</form>

<script>
  function hapusData(id) {
    if (confirm('Yakin mau hapus?')) {
      const form = document.getElementById('form-hapus');
      form.action = "/delete/" + id;
      form.submit();
    }
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
 
 new DataTable.Buttons(table, {
     buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
 });
  
 table
     .buttons(0, null)
     .container()
     .prependTo(table.table().container());

</script>

@if(session('success_message'))
    <script>
        Swal.fire({
            title: 'Sukses!',
            icon: 'success',
            text: '{{ session("success_message") }}'
        });
    </script>
@endif

@if(session('success_message'))
    <script>
        Swal.fire({
            title: 'Sukses!',
            icon: 'success',
            text: '{{ session("success_message") }}'
        });
    </script>
@endif

@endsection
