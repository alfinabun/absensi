@extends('admin.layout')
@section('judul','Update Profil')
@section('content')
<div class="row">
    <div class="col-sm-4 mt-3 mb-3 d-flex">
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

    <div class="col-sm-8 mt-3 mb-3">
        <div class="card" style="padding: 20px;">
            <h4 style="color:#917ECD;">Update Profil</h4>
            <hr style="height: 2px; color:#917ECD;">

            <form action="{{ route('updateprofil') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" value="{{ old('nama', Auth::user()->nama) }}" class="form-control" required>
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" class="form-control" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="konfir_pw" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file" name="foto" class="form-control">
                    @error('foto')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn border-2" style="background-color: #a195c7; border-color: #F5CEFB; padding: 10px;">Simpan perubahan</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary ms-2" style="padding: 10px;">Batal</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('profiladmin'))
    <script>
        Swal.fire({
            title: 'Sukses',
            text: '{{ session('profiladmin') }}',
            icon: 'success'
        });
    </script>
@endif
@endsection
