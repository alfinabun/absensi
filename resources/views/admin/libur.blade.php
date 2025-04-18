@extends('admin.layout')
@section('judul','Dashboard')
@section('content')

    <h2 class="mb-4" style="color:#917ECD; margin-top:80px;">Hari Libur</h2>
    <hr style="height: 2px; color:#917ECD;">


    <div class="d-flex justify-content-between align-items-center mb-2">
        <div class="d-flex align-items-center gap-2">
            <button type="button" class="btn text-white" style="background-color: #917ECD;">Tambah</button>
        </div>
        <div>
            <label class="mb-0">
                Search:
                <input type="search" class="form-control d-inline w-auto" placeholder="">
            </label>
        </div>
    </div>
    <table class="table table-bordered table-striped mb-5">
    <thead class="text-center">
      <tr>
        <th scope="col" style="background-color: #917ECD;">No</th>
        <th scope="col" style="background-color: #917ECD;">Tanggal</th>
        <th scope="col" style="background-color: #917ECD;">Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="text-center">1</td>
        <td>2025-01-01</td>
        <td>Tahun Baru Masehi</td>
      </tr>
      <tr>
        <td class="text-center">2</td>
        <td>2025-03-29</td>
        <td>Hari Raya Nyepi</td>
      </tr>
      <tr>
        <td class="text-center">3</td>
        <td>2025-04-18</td>
        <td>Wafat Isa Almasih</td>
      </tr>
      <tr>
        <td class="text-center">4</td>
        <td>2025-05-01</td>
        <td>Hari Buruh Internasional</td>
      </tr>
      <tr>
        <td class="text-center">5</td>
        <td>2025-05-29</td>
        <td>Kenaikan Isa Almasih</td>
      </tr>
      <tr>
        <td class="text-center">6</td>
        <td>2025-06-01</td>
        <td>Hari Lahir Pancasila</td>
      </tr>
      <tr>
        <td class="text-center">7</td>
        <td>2025-06-06</td>
        <td>Hari Raya Idul Adha 1446 H</td>
      </tr>
      <tr>
        <td class="text-center">8</td>
        <td>2025-06-26</td>
        <td>Tahun Baru Islam 1447 H</td>
      </tr>
      <tr>
        <td class="text-center">9</td>
        <td>2025-08-17</td>
        <td>Hari Kemerdekaan RI</td>
      </tr>
      <tr>
        <td class="text-center">10</td>
        <td>2025-10-06</td>
        <td>Maulid Nabi Muhammad SAW</td>
      </tr>
      <tr>
        <td class="text-center">11</td>
        <td>2025-12-25</td>
        <td>Hari Raya Natal</td>
      </tr>
    </tbody>
  </table>
  


@endsection