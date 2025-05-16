@extends('admin.layout')
@section('judul','Hari Libur')
@section('content')

    <h2 class="mb-4" style="color:#917ECD; margin-top:80px;">Hari Libur</h2>
    <hr style="height: 2px; color:#917ECD;">

        <div class="d-flex align-items-center gap-2">
          <button type="button" class="btn text-white" style="background-color: #917ECD;" data-bs-toggle="modal" data-bs-target="#liburModal">
            <img src="{{ asset('image/tambah.svg') }}" alt="" style="width: 20px; margin-right: 8px;">
             Tambah Hari Libur </button>
        </div>
    <table id="example">
    <thead >
      <tr>
        <th class="text-center" scope="col" style="background-color: #917ECD;">No</th>
        <th class="text-center" scope="col" style="background-color: #917ECD;">Tanggal</th>
        <th class="text-center" scope="col" style="background-color: #917ECD;">Keterangan</th>
        <th class="text-center" scope="col" style="background-color: #917ECD;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $dcc=0 ?>
      @foreach($liburs as $y)
          <tr>
              <td class="text-center">{{ ++$dcc }}</td>
              <td class="text-center">{{ $y->tanggal }}</td>
              <td class="text-center">{{ $y->keterangan }}</td>
              <td class="text-center">
                <button type="button" class="btn btn-sm me-1" style="background-color: #f86c6c;" onclick="deleteData({{ $y->id }})">Hapus</button>
              </td>
          </tr>
      @endforeach
      </tbody>
      
  </table>

  <div class="modal fade w-100  " id="liburModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #917ECD;">
          <h1 class="modal-title fs-3 text-white" id="exampleModalLabel">Hari Libur</h1>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('libur') }}" class="rounded" style=" background-color: #ffffff; border: none; box-shadow: none;" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal">
              </div>
              <div class="mb-3">
                <label for="ket" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="ket" name="ket">
              </div>

            <div class="modal-footer">
              <button type="submit" class="btn border-2" style="background-color: #a195c7; border-color: #F5CEFB; padding: 10px;">Tambah</button>
              <button type="cancel" class="btn btn-secondary border-2" style="border-color: #faf7fa; padding: 10px;" data-bs-dismiss="modal">Batal</button>
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
 new DataTable('#example');
</script>

<form id="form-hapus" method="POST" action="" style="display: none;">
  @csrf
  @method('DELETE')
</form>

  <script>
    function deleteData(id) {
      if (confirm('Yakin nich dihapus?')) {
        const form = document.getElementById('form-hapus');
        form.action = "/libur/" + id;
        form.submit();
      }
    }
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

@endsection