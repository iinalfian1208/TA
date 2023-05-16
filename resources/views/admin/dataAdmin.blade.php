@extends('admin.template')
@section('data_user')
    <div class="main-panel">
        <div class="content-wrapper">
            <h1 class="h3 mb-1 text-black fw-bold">Data User</h1>
            {{-- @if(session()->has('sukses'))
			<div class="alert alert-success alert-dismissible" role="alert">
				<div class="alert-message">
					{{ session()->get('sukses') }}
				</div>
			</div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div class="alert-message">
                        @foreach ($errors->all() as $error)
                            {{ $error }}</br>
                        @endforeach
                    </div>
                </div>
            @endif --}}
            <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                    <div class="card"></div>
                </div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data User
                                <button type="button" class="btn btn-pill btn-primary btn-sm ml-2 mr-3"
                                    style="border-radius: 25px" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class=" mdi mdi-account-multiple-plus"></i>
                                </button></a>
                            </h4>
                            {{-- MODAL TAMBAH --}}
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data User</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ Route('tambah_admin') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="modal-body m-2">
                                                <div class="mb-2">
                                                    <label class="form-label" for="inputUsername">Nama User</label>
                                                    <input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Nama User" maxlength="25" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label" for="inputUsername">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        placeholder="Email" maxlength="40" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label" for="inputUsername">Level</label>
                                                    <select name="level" id="level" class="form-control" required>
                                                        <option value="1">Super Admin</option>
                                                        <option value="2">Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Tambahkan Data</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @php $no = 1; @endphp
									@foreach ($data as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_admin }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>{{ $data->level == 1 ? 'Super Admin' : 'Admin' }}</td>
                                            <td class="table-action" style="width: 5px">
                                                <a type="button" data-toggle="modal" data-target="">
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        style="border-radius: 5px" data-bs-toggle="modal"
                                                        data-bs-target="#edit{{ $no }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="28"
                                                         viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M5 23.7q-.825 0-1.413-.587T3 21.7v-14q0-.825.588-1.413T5 5.7h8.925L7 12.625V19.7h7.075L21 12.75v8.95q0 .825-.588 1.413T19 23.7H5Zm4-6v-4.25l7.175-7.175l4.275 4.2l-7.2 7.225H9Zm12.875-8.65L17.6 4.85l1.075-1.075q.6-.6 1.438-.6t1.412.6l1.4 1.425q.575.575.575 1.4T22.925 8l-1.05 1.05Z" />
                                                        </svg>

                                                    </button>
                                                </a>
                                                <a type="button" data-toggle="modal" data-target="">
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        style="border-radius: 5px" data-bs-toggle="modal"
                                                        data-bs-target="#hapus{{ $no }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="28"
                                                         viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M7 21q-.825 0-1.413-.588T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.588 1.413T17 21H7ZM17 6H7v13h10V6ZM9 17h2V8H9v9Zm4 0h2V8h-2v9ZM7 6v13V6Z" />
                                                        </svg>
                                                    </button>
                                                </a>
                                            </td>

                                            {{-- MODAL EDIT --}}
                                            <div class="modal fade" id="edit{{ $no }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data
                                                                User</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ Route('edit_admin', $data->id) }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <div class="mb-2">
                                                                    <label class="form-label" for="inputUsername">Nama
                                                                        User</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama_admin" name="nama_admin"
                                                                        placeholder="Nama User" value="{{ $data->nama_admin }}"
                                                                        maxlength="25" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="inputUsername">Email</label>
                                                                    <input type="text" class="form-control"
                                                                        id="email" name="email" placeholder="Email"
                                                                        value="{{ $data->email }}" maxlength="40" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label"
                                                                        for="inputUsername">Level</label>
                                                                    <select name="level" id="level"
                                                                        class="form-control" required>
                                                                        <option value="{{ $data->level }}" selected>{{ $data->level == 1 ? 'Super Admin' : 'Admin' }}</option>
																	    <option value="1">Super Admin</option>
																	    <option value="2">Admin</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Simpan
                                                                    Perubahan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Modal Hapus --}}
                                            <div class="modal fade" id="hapus{{ $no }}" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus
                                                                Data User</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="mb-0">Yakin ingin menghapus data user dengan nama
                                                                <strong>{{ $data->nama_admin }}</strong>?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                                <form action="{{ Route('hapus_admin', $data->id) }}" method="post">
                                                                    {{ csrf_field() }}
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                                </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                    </tbody>
                                    @endforeach
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
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights
                    reserved.</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
    </div>
    @include('sweetalert::alert')
@endsection
