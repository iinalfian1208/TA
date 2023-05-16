@extends('admin.template')
@section('daftar_pt')
<div class="main-panel">
    <div class="content-wrapper">
        <h1 class="h3 mb-2 text-black fw-bold">Data Perguruan Tinggi</h1>
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
              {{-- <h4 class="card-title">Data Perguruan Tinggi <a type="button" data-toggle="modal" data-target="#tambah">
                <button class="btn btn-pill btn-primary btn-sm ml-2 mr-5" style="border-radius: 25px">
                    <i class=" mdi mdi-account-multiple-plus"></i>
                </button></a></h4> --}}
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
                <table id="tableData" class="table dt-responsive nowrap">

                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Perguruan Tinggi</th>
                      <th>Alamat</th>
                      @if (Auth::user()->level == 1)
                      <th>Aksi</th>
                      @endif
                    </tr>
                  </thead>
                  {{-- <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($data as $d)
                    <tr>
                        <td>{{ $no++ }}</td>
                      <td>{{ $d->nama_pt}}</td>
                      <td>{{ $d->alamat }}</td>
                      @if (Auth::user()->level == 1)
                      <td class="table-action" style="width: 5px">
                        <a type="button" data-toggle="modal" data-target="">
                            <button type="button" class="btn btn-sm btn-primary" style="border-radius: 5px" data-bs-toggle="modal" data-bs-target="#edit{{ $d->id_pt }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M5 23.7q-.825 0-1.413-.587T3 21.7v-14q0-.825.588-1.413T5 5.7h8.925L7 12.625V19.7h7.075L21 12.75v8.95q0 .825-.588 1.413T19 23.7H5Zm4-6v-4.25l7.175-7.175l4.275 4.2l-7.2 7.225H9Zm12.875-8.65L17.6 4.85l1.075-1.075q.6-.6 1.438-.6t1.412.6l1.4 1.425q.575.575.575 1.4T22.925 8l-1.05 1.05Z"/></svg>

                            </button>
                        </a>
                        <a type="button" data-toggle="modal" data-target="">
                            <button type="button" class="btn btn-sm btn-danger" style="border-radius: 5px" data-bs-toggle="modal" data-bs-target="#hapus{{ $d->id_pt }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                            </button>
                        </a>
                    </td>
                    @endif
                    </tr> --}}
                    {{-- MODAL EDIT --}}
                    <div class="modal fade" id="editPT" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Perguruan Tinggi</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            {{-- <form action="/detail_pt/edit/{{ $d->id_pt }}" method="post"> --}}
                                {{-- {{ csrf_field() }} --}}
                                <div class="modal-body m-2">
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Nama Perguruan Tinggi</label>
                                        <input type="text" class="form-control" id="nama_pt" name="nama_pt" placeholder="Nama Perguruan Tinggi" value="" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Alamat</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" id="txt_empid" value="0">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary"  id="btn_save">Simpan Perubahan</button>
                                </div>
                            {{-- </form> --}}
                          </div>
                        </div>
                      </div>
                      {{-- Modal Hapus --}}
                      <div class="modal fade" id="hapusPT" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data Perguruan Tinggi</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">Yakin ingin menghapus perguruan tinggi <strong></strong>?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              {{-- <form action="/detail_pt/hapus/{{ $d->id_pt }}" method="post">
                                {{ csrf_field() }}
                                @method('delete') --}}
                                    <button type="submit" class="btn btn-primary">Hapus</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- @endforeach
                  </tbody> --}}
                </table>
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
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
        </div>
      </footer>
    <!-- partial -->
  </div>
  </div>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
        $("#tableData").DataTable({
            // processing: true,
            serverSide: true,
            ordering: true,
            ajax: "{{ route('daftar_pt.json') }}",
            buttons: false,
            searching: true,
            // width: 800,
            scrollY: true,
            scrollX: true,
            // retrieve: true,
            columns: [
                {
                    "data": 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {data: 'nama_pt', name: 'nama_pt'},
                {data: 'alamat', name: 'alamat'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#tableData').on('click','.editPT',function(){
            var id = $(this).data('id_pt');

            $('#txt_empid').val(id);

            // AJAX request
            $.ajax({
                url: "{{ route('get_pt') }}",
                type: 'post',
                data: {_token: CSRF_TOKEN,id: id_pt},
                dataType: 'json',
                success: function(response){

                    if(response.success == 1){

                         $('#nama_pt').val(response.nama_pt);
                         $('#alamat').val(response.alamat);

                         tableData.ajax.reload();
                    }else{
                         alert("Invalid ID.");
                    }
                }
            });

       });

       // Save user
       $('#btn_save').click(function(){
            var id = $('#txt_empid').val();

            var nama_pt = $('#nama_pt').val().trim();
            var alamat = $('#alamat').val().trim();

            if(nama_pt !='' && alamat != ''){

                 // AJAX request
                 $.ajax({
                     url: "{{ route('edit_pt') }}",
                     type: 'post',
                     data: {_token: CSRF_TOKEN,id: id_pt,nama_pt: nama_pt, alamat: alamat},
                     dataType: 'json',
                     success: function(response){
                         if(response.success == 1){
                              alert(response.msg);

                              // Empty and reset the values
                              $('#nama_pt','#alamat');
                            //   $('#gender').val('Male');
                              $('#txt_empid').val(0);

                              // Reload DataTable
                              tableData.ajax.reload();

                              // Close modal
                              $('#editPT').modal('toggle');
                         }else{
                              alert(response.msg);
                         }
                     }
                 });

            }else{
                 alert('Please fill all fields.');
            }
       });

       // Delete record
       $('#tableData').on('click','.hapusPT',function(){
            var id = $(this).data('id_pt');

            // var deleteConfirm = confirm("Apakah Anda ingin Menghapusnya?");
            if (deleteConfirm == true) {
                 // AJAX request
                 $.ajax({
                     url: "{{ route('hapus_pt') }}",
                     type: 'post',
                     data: {_token: CSRF_TOKEN,id: id_pt},
                     success: function(response){
                          if(response.success == 1){
                               alert("Record deleted.");

                               // Reload DataTable
                               tableData.ajax.reload();
                          }else{
                                alert("Invalid ID.");
                          }
                     }
                 });
            }

       });
    });
  </script>
  @include('sweetalert::alert')
@endsection


