@extends('admin.template')
@section('daftar_kategori')
<div class="main-panel">
    <div class="content-wrapper">
        <h1 class="h3 mb-2 text-black fw-bold">Data Kategori</h1>
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
                <h4 class="card-title">Data Kategori
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
                        <form action="/daftar_kategori/tambah" method="POST">
                            {{ csrf_field() }}
                            <div class="modal-body m-1">
                                <div class="mb-2">
                                    <label class="form-label" for="inputUsername">Nama Kategori</label>
                                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" required>

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
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th >No</th>
                      <th >Nama Kategori</th>
                      <th>Total Jurnal</th>
                      @if (Auth::user()->level == 1)
                      <th>Aksi</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @php
                     $no = 1;
                    @endphp
                     @foreach($data as $d)
                    <tr>
                        <td>{{ $no++ }}</td>
                      <td>{{ $d->nama_kategori}}</td>
                      @php
					    if ($d->total == 1) {
						    $cek = DB::table('t_kategori')->where('nama_kategori', $d->nama_kategori)->first();
							$cek->id_jurnal == NULL ? $total = 0 : $total = $d->total;
						} else {
							    $total = $d->total;
						}
					@endphp
                      <td>{{ $total }}</td>
                      @if (Auth::user()->level == 1)


                      <td class="table-action" style="width: 5px">
                        <a type="button" data-toggle="modal" data-target="">
                            <button type="button" class="btn btn-sm btn-primary" style="border-radius: 5px" data-bs-toggle="modal" data-bs-target="#edit{{ $no }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M5 23.7q-.825 0-1.413-.587T3 21.7v-14q0-.825.588-1.413T5 5.7h8.925L7 12.625V19.7h7.075L21 12.75v8.95q0 .825-.588 1.413T19 23.7H5Zm4-6v-4.25l7.175-7.175l4.275 4.2l-7.2 7.225H9Zm12.875-8.65L17.6 4.85l1.075-1.075q.6-.6 1.438-.6t1.412.6l1.4 1.425q.575.575.575 1.4T22.925 8l-1.05 1.05Z"/></svg>

                            </button>
                        </a>
                        <a type="button" data-toggle="modal" data-target="">
                            <button type="button" class="btn btn-sm btn-danger" style="border-radius: 5px" data-bs-toggle="modal" data-bs-target="#hapus{{ $no }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z"/></svg>
                            </button>
                        </a>
                    </td>
                    @endif

                    {{-- MODAL EDIT --}}
                    <div class="modal fade" id="edit{{ $no }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/detail_kategori/edit/{{ $d->nama_kategori }}" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Nama Kategori</label>
                                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" value="{{  $d->nama_kategori  }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Total Jurnal</label>
                                        <input type="text" class="form-control" id="total_jurnal" name="total_jurnal" placeholder="-" value="{{ $total }}" readonly>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      {{-- Modal Hapus --}}

                      <div class="modal fade" id="hapus{{ $no }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data Kategori</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">Yakin ingin menghapus kategori <strong>{{ $d->nama_kategori }}</strong>?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <form action="/detail_kategori/hapus/{{ $d->nama_kategori }}/{{ $total }}" method="post">
                                {{ csrf_field() }}
                                @method('delete')
                              <button type="submit" class="btn btn-primary">Hapus</button>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </tr>
                    @endforeach
                  </tbody>
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
@endsection


