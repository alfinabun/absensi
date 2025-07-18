@extends('user.layout')
@section('judul', 'Absensi Karyawan')
@section('content')

    <h2 class="mb-4" style="color:#917ECD; margin-top:80px;">Absensi</h2>
    <hr style="height: 2px; color:#917ECD;">
    @if ($presensi == 1)
    <div class="row justify-content-center">

        <div class="col-sm-12 mb-3">
                <div class="card" name="absen_masuk"
                style="width: 100%; height: 100px; border: none; box-shadow: none; background-color: #a6f29c;">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <h5 class="card-title fs-4">TIDAK ADA JADWAL PRESENSI</h5>
                </div>
                </div>
        </div>

    </div>  
    @else
    <div class="row justify-content-center">

        <div class="col-sm-4 mb-3">
            <form action="{{ route('masuk') }}" method="POST">
                @csrf
                <div id="demo">
                </div>
                <button class="card" name="absen_masuk"
                style="width: 100%; height: 100px; border: none; box-shadow: none; background-color: #a6f29c;">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <h5 class="card-title fs-4">ABSEN MASUK</h5>
                </div>
                </button>
             </form>
        </div>
        
        <div class="col-sm-4 mb-3">
            <form action="{{ route('keluar') }}" method="POST">
                @csrf
                <div id="demo1">
                </div>
                <button class="card" name="absen_keluar"
                style="width: 100%; height: 100px; border: none; box-shadow: none; background-color: #f86c6c;">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <h5 class="card-title fs-4">ABSEN KELUAR</h5>
                </div>
                </button>
             </form>

        </div>
        {{-- @if ($izin ) --}}
        <div class="col-sm-4 mb-3">
            <div class="card"
                style="width: 100%; height: 100px; border: none; box-shadow: none; background-color: #84c2fc; cursor:pointer;"
                data-bs-toggle="modal" data-bs-target="#izinModal">
                <div class="card-body d-flex justify-content-center align-items-center">
                    <h5 class="card-title fs-4">IZIN</h5>
                </div>
            </div>
        </div>
        {{-- @endif --}}
        

    </div>   
    @endif

    <div class="card p-3 mb-5">
        <h3 class="mb-4">Riwayat Absensi</h3>

        {{-- <form action="" class="row g-3 mb-4">
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
                        <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>
                            {{ $y }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn" style="background-color: #917ECD;">Tampilkan</button>
            </div>
        </form> --}}

        <table id="example" class="table table-bordered table-horver">
            <thead>
                <tr>
                    <th class="text-center" style="background-color: #917ECD;">No</th>
                    <th class="text-center" style="background-color: #917ECD;">Tanggal</th>
                    <th class="text-center" style="background-color: #917ECD;">Absen Masuk</th>
                    <th class="text-center" style="background-color: #917ECD;">Absen Keluar</th>
                    <th class="text-center" style="background-color: #917ECD;">Status</th>
                    <th class="text-center" style="background-color: #917ECD;">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($riwayat as $r)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td class="text-center">{{ $r->tanggal }}</td>
                        <td class="text-center">
                            @if ($r->ket_masuk=='terlambat')
                                
                            <span class="badge bg-danger rounded-0">{{ $r->absen_masuk }}</span>
                            @else
                                
                            <span class="badge bg-success rounded-0">{{ $r->absen_masuk }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($r->ket_keluar == 'cepat pulang')
                                
                            <span class="badge bg-danger rounded-0">{{ $r->absen_keluar }}</span>
                            @else
                                
                            <span class="badge bg-success rounded-0">{{ $r->absen_keluar }}</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($r->status == 'pending')
                                <span class="badge bg-warning rounded-0">{{ $r->status }}</span>
                            @elseif ($r->status == 'izin')
                                <span class="badge bg-danger rounded-0">{{ $r->status }}</span>
                            @else
                                <span class="badge bg-primary rounded-0">{{ $r->status }}</span>
                            
                            @endif
                        </td>
                        <td>{{ $r->ket_izin }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade w-100  " id="izinModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        data-bs-backdrop="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #917ECD;">
                    <h1 class="modal-title fs-3 text-white" id="exampleModalLabel">Pengajuan Izin</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ route('izin') }}" method="POST" class="rounded" style="background-color: #ffffff; border: none; box-shadow: none;"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" 
                                class="form-control" 
                                id="tanggal" 
                                name="tanggal" 
                                value="{{ old('tanggal', date('Y-m-d')) }}">
                            </div>

                            {{-- <div class="mb-3">
                                <label for="alasan" class="form-label">Alasan</label>
                                <select name="alasan" id="alasan" class="form-select">
                                    <option value="">-- Pilih Alasan --</option>
                                    <option value="Sakit">Sakit</option>
                                    <option value="Izin Keluarga">Izin Keluarga</option>
                                    <option value="Keperluan Pribadi">Keperluan Pribadi</option>
                                    <option value="Cuti">Cuti</option>
                                </select>
                            </div> --}}

                            <div class="mb-3">
                                <label for="ket" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="ket" name="ket_izin">
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn border-2"
                                style="background-color: #a195c7; border-color: #F5CEFB; padding: 10px;">Tambah</button>
                            <button type="button" class="btn btn-secondary border-2"
                                style="border-color: #faf7fa; padding: 10px;" data-bs-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
        table
            .buttons(0, null)
            .container()
            .prependTo(table.table().container());
    </script>


@if (session('success'))
    <script>
        Swal.fire({
            title: '{{ session('success') }}',
            text: 'Jarak Anda ke kantor: {{ session('jaraknya') }} meter',
            icon: 'success'
        });
    </script>
@endif
@if (session('warning'))
    <script>
        Swal.fire({
            title: 'Gagal',
            text: 'Anda terlalu jauh dari lokasi kantor untuk melakukan absensi. Jarak Anda ke kantor: {{ session('jaraknya') }} meter',
            icon: 'error'
        });
    </script>
@endif
@if (session('libur'))
    <script>
        Swal.fire({
            title: 'Oopss..',
            text: '{{ session('libur') }}',
            icon: 'warning'
        });
    </script>
@endif
@if (session('hadir'))
    <script>
        Swal.fire({
            title: 'Oopss..',
            text: '{{ session('hadir') }}',
            icon: 'warning'
        });
    </script>
@endif
@if (session('absen'))
    <script>
        Swal.fire({
            title: 'Oopss..',
            text: '{{ session('absen') }}',
            icon: 'warning'
        });
    </script>
@endif
@if (session('izin'))
    <script>
        Swal.fire({
            title: 'Sukses!',
            text: '{{ session('izin') }}',
            icon: 'success'
        });
    </script>
@endif
@if (session('terimaizin'))
    <script>
        Swal.fire({
            title: 'Oopss..!',
            text: '{{ session('terimaizin') }}',
            icon: 'warning'
        });
    </script>
@endif

<script>
    const x = document.getElementById("demo");
    const y = document.getElementById("demo1");
    window.onload = getLocation;
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, error);
            navigator.geolocation.getCurrentPosition(success1, error);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
    
        function success(position) {
            x.innerHTML = "<input type='hidden' name='lat' value='" + position.coords.latitude + 
            "'><input type='hidden' name='long' value='" + position.coords.longitude + "'>";
        }
        function success1(position) {
            y.innerHTML = "<input type='hidden' name='lat' value='" + position.coords.latitude + 
            "'><input type='hidden' name='long' value='" + position.coords.longitude + "'>";
        }
    
    function error() {
        alert("Sorry, no position available.");
    }
</script>


@endsection
