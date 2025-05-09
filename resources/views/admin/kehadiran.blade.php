@extends('admin.layout')
@section('judul','Kehadiran')
@section('content') 
    <h2 class="mb-4" style="color:#917ECD; margin-top:80px;">Absensi</h2>
    <hr style="height: 2px; color:#917ECD;">

    
    <table id="example1" class="table table-bordered table-hover align-middle">
      <thead class="text-center">
        <tr>
          <th style="background-color: #917ECD;">No</th>
          <th style="background-color: #917ECD;" class="col-1">Foto</th>
          <th style="background-color: #917ECD;">Nama Karyawan</th>
          <th style="background-color: #917ECD;">Absen Masuk</th>
          <th style="background-color: #917ECD;">Absen Keluar</th>
          <th style="background-color: #917ECD;">Status</th>
          <th style="background-color: #917ECD;">Izin</th>
          <th style="background-color: #917ECD;">Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php $dcc=0 ?>
        @foreach ($absen as $k)
        <tr>
          <td class="text-center">{{ ++$dcc }}</td>
          <td class="text-center">
            <img src="{{ asset('image/'.$k->foto) }}" alt="Foto Karyawan" width="60px" height="60px">
          </td>
          <td>{{ $k->nama }}</td>
          <td class="text-center">
            @if ($k->absen_masuk)
              <span class="badge bg-success">{{ $k->absen_masuk }}</span>
            @else
              <span class="badge bg-warning">Belum Absen</span>
            @endif
          </td>
          
          <td class="text-center">
            @if ($k->absen_keluar)
              <span class="badge bg-success">{{ $k->absen_keluar }}</span>
            @else
              <span class="badge bg-warning">Belum Absen</span>
            @endif
          </td>          
          <td></td>
          <td class="text-center">
            @if ($k->izin)
              <span class="badge bg-success">{{ $k->izin }}</span>
            @else
              <span class="badge bg-primary">Tidak</span>
            @endif
          </td>   
          <td></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    


      <div class="card p-3 mb-5">
        <h3 class="mb-4">Riwayat Absensi</h3>
              
        
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
        new DataTable('#example1');
    let table = new DataTable('#example');
     
     new DataTable.Buttons(table, {
         buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
     });
      
     table
         .buttons(0, null)
         .container()
         .prependTo(table.table().container());
    
    </script>  
      
      
      

@endsection

