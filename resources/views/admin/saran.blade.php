@extends('admin.template')
@section('ChatSP')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card"></div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Saran
                    </h4>
                  <div class="table-responsive" >
                    <table class="table table-striped col-12">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Pengguna</th>
                          <th>Review</th>
                          <th>Saran</th>
                           <th>Balasan</th>
                           <th>Balas</th>
                          {{-- @if (Auth::user()->level == 1) --}}
                          {{-- <th>Aksi</th> --}}
                          {{-- @endif --}}
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                         @php
                          $no = 1;
                          @endphp
                            @foreach($data as $d)
                            <td>{{ $no++ }}</td>
                          <td> {{ $d->nama_penulis}}</td>
                          <td>{{ $d->review}}</td>
                          <td>{{ $d->isi}}</td>
                          <td>
                            @if (!empty($d->balas))
                            @foreach ( $d->balas as $item)

                            {{ $item->balas }} <br>
                            @endforeach

                            @endif
                        </td>

                          <td class="table-action" style="width: 5px">
                            <a type="button" data-toggle="modal" data-target="" href="">
                                <button type="button" class="btn btn-sm btn-primary" style="border-radius: 5px" data-bs-toggle="modal" data-bs-target="#balas-{{ $d->idSaran }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M11 9.8v.9l1.7.2c2.6.4 4.5 1.4 5.9 2.7c-1.7-.5-3.5-.8-5.6-.8h-2v1.3L8.8 12L11 9.8M13 5l-7 7l7 7v-4.1c5 0 8.5 1.6 11 5.1c-1-5-4-10-11-11M7 8V5l-7 7l7 7v-3l-4-4"/></svg>

                                </button>
                            </a>
                            <div class="modal fade" id="balas-{{ $d->idSaran }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Berikan Balasan</h5>
                                    <form action="{{ route('balasSaran') }}" method="get">
                                        {{ csrf_field() }}
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id_saran" id="id_saran" value="{{ $d->idSaran }}">
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Nama </label>
                                        <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="" value="{{ $d->nama_penulis}}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Review</label>
                                        <input type="text" class="form-control" id="nama_pt" name="review" placeholder="" value="{{ $d->review}}" readonly>

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Saran</label>
                                        <input type="text" class="form-control" id="nama_pt" name="review" placeholder="" value="{{ $d->isi}}" readonly>

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Balasan</label><br>
                                        <textarea name="balas" type='text' id="balas" cols="62" rows="5"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </div>
                            </form>
                                </div>
                            </div>

                        </td>
                        </tr>
                        @endforeach

                      </tbody>
                      {{-- MODAL EDIT --}}
                    {{-- @foreach($data as $d) --}}


                    {{-- @endforeach --}}
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

  </div>
</div>
</div>
@include('sweetalert::alert')
@endsection
