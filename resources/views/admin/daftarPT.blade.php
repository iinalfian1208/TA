@extends('admin.template')
@section('daftar_pt')
{{-- <style>
    .table-align-center td,
    .table-align-center th {
        border: none;
    }
</style> --}}

<div class="main-panel">
    <div class="content-wrapper">
        <h1 class="h3 mb-2 text-black fw-bold">Data Perguruan Tinggi</h1>

      <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card"></div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Perguruan Tinggi
                    @if (Auth::user()->level == 1)
                    <button type="button" class="btn btn-pill btn-primary btn-sm ml-2 mr-3" style="border-radius: 25px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M19 11h-4v4h-2v-4H9V9h4V5h2v4h4m1-7H8a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2M4 6H2v14a2 2 0 0 0 2 2h14v-2H4V6Z"/></svg>
                    </button></a>
                    @endif
                </h4>

                {{-- MODAL TAMBAH --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><strong>Tambah Kategori</strong></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ Route('pt_tambah') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="mb-1">
                                    <div class="mb-2">
                                        <label class="form-label" for="inputUsername">Nama Perguruan Tinggi</label>
                                        <input type="text" class="form-control" id="nama_pt" name="nama_pt" placeholder="Nama Perguruan Tinggi" required>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label" for="inputUsername">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="100" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>
              <div>
                <div class="table-responsive">
                <table id="tableData" class="table table-striped table-borderless " style="border: 0px">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center" style="width: 100%">Nama Perguruan Tinggi</th>
                      <th class="text-center">Alamat</th>
                      {{-- <th></th> --}}
                      @if (Auth::user()->level == 1)
                      <th class="text-center">Aksi</th>
                      @endif
                    </tr>
                  </thead>
                </table>
                </div>
              </div>
            </div>
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
    <!-- partial -->
  </div>
  </div>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
   $(document).ready(function () {
    var table = $("#tableData").DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: "{{ route('daftar_pt.json') }}",
        buttons: false,
        searching: true,
        scrollY: true,
        scrollX: true,
        responsive: true,
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nama_pt', name: 'nama_pt' },
            { data: 'alamat', name: 'alamat' },
            @if (Auth::user()->level == 1)
                { data: 'action', name: 'action', orderable: false, searchable: false },
            @endif
        ],
        createdRow: function (row, data, dataIndex) {
            // Menambahkan gaya pada setiap data dalam tabel hanya untuk admin
            if ("{{ Auth::user()->level == 2}}") {
                $(row).find('td').css('padding', '2%');
            }
        }
    });
});

</script>
  @include('sweetalert::alert')
@endsection
{{-- <style>
    .table-align-center td,
    .table-align-center th {
        border: none;
    }
</style> --}}


