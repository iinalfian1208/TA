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
                                <!--@if (Auth::user()->level == 1)
    -->
                                <!--	<a type="button" data-toggle="modal" data-target="#tambah"><button class="btn btn-pill btn-primary btn-sm ml-2"><i class="fas fa-plus"></i></i></button></a>-->
                                <!--
    @endif-->
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
                        </div>

                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Website Jurnal Scarping
                        @2023</span>
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
                // processing: true,
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
                responsive: true,
                // retrieve: true,
                columns: [{
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
                    {
                        data: 'nama_jurnal',
                        name: 'nama_jurnal'
                    },
                    {
                        data: 'nama_pt',
                        name: 'nama_pt'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        });
    </script>

    @include('sweetalert::alert')
@endsection
