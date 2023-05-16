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
                  {{-- <h4 class="card-title">Data Perguruan Tinggi <a type="button" data-toggle="modal" data-target="#tambah">
                    <button class="btn btn-pill btn-primary btn-sm ml-2 mr-5" style="border-radius: 25px">
                        <i class=" mdi mdi-account-multiple-plus"></i>
                    </button></a></h4> --}}
                    <h4 class="card-title">Chat

                    </h4>
                  <div class="table-responsive" >
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Isi</th>
                          <th>Balas</th>
                          {{-- @if (Auth::user()->level == 1) --}}
                          {{-- <th>Aksi</th> --}}
                          {{-- @endif --}}
                        </tr>
                      </thead>
                      <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($pesan->unique('sender_id') as $d)
                        <tr>
                            <td>{{ $no++ }}</td>
                          <td>{{ $d->sender->nama_admin }}</td>
                          <td>{{ $d->isi }}</td>
                          {{-- @if (Auth::user()->level == 1) --}}
                          <td class="table-action" style="width: 5px">
                            <a  class="btn btn-sm btn-primary" style="border-radius: 5px"  href="{{ route('balas-chat',$d->sender->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M11 9.8v.9l1.7.2c2.6.4 4.5 1.4 5.9 2.7c-1.7-.5-3.5-.8-5.6-.8h-2v1.3L8.8 12L11 9.8M13 5l-7 7l7 7v-4.1c5 0 8.5 1.6 11 5.1c-1-5-4-10-11-11M7 8V5l-7 7l7 7v-3l-4-4"/></svg>
                            </a>

                        </td>
                        {{-- @endif --}}
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
{{-- <div class="card" id="balas">
    <div class="card-body">
      <h4 class="card-title">Default form</h4>
      <p class="card-description">
        Basic form layout
      </p>
      <div class="row mb-3">
          <div class="col-12">

        <div class="col-md-10 col-xl-10 ">

            <div class="row">
            <div class=" d-flex align-items-center justify-content-between mb-2">
                <div>
                    <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
                    biocccsssilmi23@gmail.com
                </div>
                <div>
                    2023-03-07 05:41:03
                </div>
            </div>
            <div class="col-11"></div>
            <a class="block block-rounded mx-5"
                style="border-radius: 0px 35px 35px 35px; background-color: rgb(198, 198, 198);"
                href="javascript:void(0) mx-5">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                    <div class="ms-3 text-start">
                        <p class="fw-semibold text-black mb-0">
                            is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                            industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only
                            five centuries, but also the leap into electronic typesetting, remaining essentially
                            unchanged. It was popularised in the 1960s with the release of Letraset sheets
                            containing Lorem Ipsum passages, and more recently with desktop publishing software like
                            Aldus PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                    <div></div>
                </div>
            </a>
        </div>
        <div class="col-md- col-xl-1 ">
        </div>
    </div>
    </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-1 col-xl-1 ">
        </div>
        <div class="col-md-10 col-xl-10 ">
            <div class="row">
            <div class=" d-flex align-items-center justify-content-between" style="margin-bottom: 5px">
                <div>
                    2023-03-07 05:41:03
                </div>
                <div>
                    biocccsssilmi23@gmail.com
                    <img class="img-xs rounded-circle" src="images/faces/face8.jpg" alt="Profile image">
                </div>
            </div>
            <a class="block block-rounded bg-success" style="border-radius: 35px 0px 35px 35px;"
                href="javascript:void(0)">
                <div class="block-content block-content-full d-flex align-items-center justify-content-between" style="margin-right: 10px">
                    <div></div>
                    <div class="ms-3 text-end">
                        <p class="fw-semibold text-white mb-0">
                            It is a long established fact that a reader will be distracted by the readable content
                            of a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                            more-or-less normal distribution of letters, as opposed to using 'Content here, content
                            here', making it look like readable English. Many desktop publishing packages and web
                            page editors now use Lorem Ipsum as their default model text, and a search for 'lorem
                            ipsum' will uncover many web sites still in their infancy. Various versions have evolved
                            over the years, sometimes by accident, sometimes on purpose (injected humour and the
                            like).
                        </p>
                    </div>
                </div>
            </a>
            </div>
        </div>
        <div class="col-md-1 col-xl-1 ">
            <div class="align-items-center justify-content-between">
                <img class="img-avatar img-avatar48 " src="/assets/media/avatars/avatar14.jpg" alt="">
            </div>
        </div>
    </div>


</div>
    </div> --}}
  </div>
</div>
</div>
@endsection
