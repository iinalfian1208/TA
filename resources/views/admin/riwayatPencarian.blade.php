
@extends('admin.template')
@section('riwayat_pencarian')
<div class="main-panel">
    <div class="content-wrapper">
        <h1 class="h3 mb-2 text-black fw-bold">Riwayat Pencarian</h1>
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
                <div class="col-sm-12">
                    <label><h5 class="card-title">Riwayat Pencarian</label>
                </div>

                <form action="{{ Route('riwayat_pencarian') }}" method="GET" class="row g-2">
                    <div class="col-auto">
                        <span>Periode :</span>
                    </div>
                    <div class="col-auto">
                        <div class="input-group mb-3">
                            <input class="form-control form-control-md bg-light border-0" type="month" name="periode" value={{ date('Y-m') }}>
                            <button type="submit" class="btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z"/></svg></button>
                        </div>
                    </div>

                </form>
            {{-- </div> --}}
              <div class="table-responsive">
                <table id="example" class="table table-sm table-striped" style="width:100%">
                  <thead>
                    <tr>
                        <th class="text-center">No</th>
						<th>IP Address</th>
						<th>Kata Kunci</th>
						<th>Waktu Pencarian</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach($data as $d)
                    <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $d->ip_address }}</td>
                    <td>{{ $d->kata_kunci }}</td>
                    <td>{{ $d->tgl_pencarian }}</td>
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
