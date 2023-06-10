
@extends('admin.template')
@section('daftar_kategori')
<div class="main-panel">
    <div class="content-wrapper">
        <h1 class="h3 mb-2 text-black fw-bold">Data Jurnal</h1>
        @if ($message = Session::get('sukses'))
			<div class="alert alert-success alert-dismissible" role="alert">
				<div class="alert-message">
					<strong>{{ $message }}</strong>
				</div>
			</div>
		@endif
		@if ($message = Session::get('gagal'))
			<div class="alert alert-danger alert-dismissible" role="alert">
				<div class="alert-message">
					<strong>{{ $message }}</strong>
				</div>
			</div>
		@endif
      <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card"></div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Data Jurnal
                <!--@if (Auth::user()->level == 1)-->
				<!--	<a type="button" data-toggle="modal" data-target="#tambah"><button class="btn btn-pill btn-primary btn-sm ml-2"><i class="fas fa-plus"></i></i></button></a>-->
				<!--@endif-->
              </h4>

                <table id="tableDataJurnal" class="table table-striped table-borderless" style="border: 0px">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Peringkat</th>
                        <th class="text-center" style="width: 100%">Nama Jurnal</th>
                        <th class="text-center">Perguruan Tinggi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                </table>
                 {{-- <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $no++ }}</td>
                      <td>S{{ $d->peringkat }}</td>
                      <td>{{ $d->nama_jurnal }}</td>
                      <td style="width: 5%">{{ $d->nama_pt }}</td>
                      <td class="table-action">
                        <a type="button" data-toggle="modal" data-target="">
                            <a href="/detail_jurnal/{{ $d->id_jurnal }}">
                                <button class="btn btn-sm btn-primary" style="border-radius: 5px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M5 23.7q-.825 0-1.413-.587T3 21.7v-14q0-.825.588-1.413T5 5.7h8.925L7 12.625V19.7h7.075L21 12.75v8.95q0 .825-.588 1.413T19 23.7H5Zm4-6v-4.25l7.175-7.175l4.275 4.2l-7.2 7.225H9Zm12.875-8.65L17.6 4.85l1.075-1.075q.6-.6 1.438-.6t1.412.6l1.4 1.425q.575.575.575 1.4T22.925 8l-1.05 1.05Z"/></svg>
                                </button>
                            </a>
                        </a>
                        @if (Auth::user()->level == 1)
                        <a type="button" data-toggle="modal" data-target="#hapus{{ $d->id_jurnal }}">
                            <button type="button" class="btn btn-sm btn-danger" style="border-radius: 5px" data-bs-toggle="modal" data-bs-target="#hapus">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                            </button>
                        </a>
                        @endif
                    </td>
                    </tr> --}}

                    {{-- Modal Hapus --}}
                    {{-- <div class="modal fade" id="hapus{{ $d->id_jurnal }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data Jurnal</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">Yakin ingin menghapus jurnal <strong>{{ $d->nama_jurnal }}</strong>?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <form action="/daftar_jurnal/hapus/{{ $d->id_jurnal }}" method="post">
                                {{ csrf_field() }}
                                @method('delete')
                                <button type="submit" class="btn btn-primary">Hapus</button>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  </tbody> --}}
          </div>

        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Website Jurnal Scarping @2023</span>
        </div>
      </footer>
      <!-- Button trigger modal -->
    <!-- partial -->
  </div>
  </div>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $("#tableDataJurnal").DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            dom: 'lBfrtip',
                buttons: [
                    'copy', 'excel', 'pdf', 'csv', 'print'
                ],
            ajax: "{{ route('daftar_jurnal.json') }}",
            buttons: false,
            searching: true,
            // width: 800,
            scrollY: true,
            scrollX: true,
            responsive :true,
            // retrieve: true,
            columns: [
                {
                    "data": 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'peringkat',
                    name: 'peringkat',
                    render: function(data, type, full, meta) {
                        return 'Sinta ' + data; // Menambahkan "Sinta" pada data peringkat
                    }
                },
                {data: 'nama_jurnal', name: 'nama_jurnal'},
                {data: 'nama_pt', name: 'nama_pt'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

    });
  </script>

  @include('sweetalert::alert')
@endsection
