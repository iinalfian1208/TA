@extends('admin.template')
@section('profil')
<div class="main-panel">
    <div class="content-wrapper">
        <h1 class="h3 mb-2 text-black fw-bold">Pengaturan Profil & Password</h1>
        @if(session()->has('sukses'))
			<div class="alert alert-success alert-dismissible" role="alert">
				<div class="alert-message">
					{{ session()->get('sukses') }}
				</div>
			</div>
		@endif
		@if(session()->has('error'))
			<div class="alert alert-danger alert-dismissible" role="alert">
				<div class="alert-message">
					{{ session()->get('error') }}
				</div>
			</div>
		@endif
		@if (count($errors) > 0)
			<div class="alert alert-danger alert-dismissible" role="alert">
				<div class="alert-message">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
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
                    <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="profil-tab" data-bs-toggle="tab" data-bs-target="#profil-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Profil</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Password</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="profil-tab-pane" role="tabpanel" aria-labelledby="profil-tab" tabindex="0">
                    @foreach ($data as $data)
                    <form action="{{ Route('edit_profil') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label class="form-label" for="inputUsername">Email</label>
                            <input type="text" class="form-control" id="email" name='email' placeholder="Email" value="{{ $data->email }}" maxlength="40" required>
                        </div>
                        <div class=" mb-3">
                            <label class="form-label" for="inputUsername">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_admin" name="nama_admin"  placeholder="Nama Lengkap" value="{{ $data->nama_admin }}" maxlength="25" required>
                        </div>
                        <div class=" mb-3">
                            <label class="form-label" for="inputUsername">Posisi</label>
                            <input type="text" class="form-control" id="level" name='level' value="{{ $data->level == 1 ? 'Super Admin' : 'Admin' }}" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="password-tab-pane" role="tabpanel" aria-labelledby="password-tab" tabindex="0">
                    <form action="{{ Route('edit_password') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label class="form-label">Password Lama</label>
                            <input type="password" class="form-control" id="password" name='password' required>
                            {{-- <small><a href="/lupa_pass">Lupa password?</a></small> --}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputPasswordNew">Password Baru</label>
                            <input type="password" class="form-control" id="password_baru" name="password_baru" minlength="8" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="inputPasswordNew2">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="password-confirm" name="konfirmasi_password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>

              </div>
        </div>
            </div>
        </div>
    </div>
</div>
<div>
  @endsection
