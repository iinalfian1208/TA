@extends('admin.template')
@section('chat')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="card">

        <div class="card-body">

            @foreach ( $pesan as $key )

            <div class="row mb-2">
                <div class="col-12">
                  <div class="col-md-12 col-xl-12 ">
                    <div class="row">
                      <div class=" d-flex align-items-center justify-content-between mb-2">
                          @if ($key->sender_id == Auth::user()->id)
                          <div>
                            {{ $key->tanggal }}
                        </div>
                        <div>
                            {{ $key->sender->nama_admin }}
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M8 14.5a6.47 6.47 0 0 0 3.25-.87V11.5A2.25 2.25 0 0 0 9 9.25H7a2.25 2.25 0 0 0-2.25 2.25v2.13A6.47 6.47 0 0 0 8 14.5Zm4.75-3v.937a6.5 6.5 0 1 0-9.5 0V11.5a3.752 3.752 0 0 1 2.486-3.532a3 3 0 1 1 4.528 0A3.752 3.752 0 0 1 12.75 11.5ZM8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16ZM9.5 6a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0Z" clip-rule="evenodd"/></svg>
                        </div>
                          @else
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M8 14.5a6.47 6.47 0 0 0 3.25-.87V11.5A2.25 2.25 0 0 0 9 9.25H7a2.25 2.25 0 0 0-2.25 2.25v2.13A6.47 6.47 0 0 0 8 14.5Zm4.75-3v.937a6.5 6.5 0 1 0-9.5 0V11.5a3.752 3.752 0 0 1 2.486-3.532a3 3 0 1 1 4.528 0A3.752 3.752 0 0 1 12.75 11.5ZM8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16ZM9.5 6a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0Z" clip-rule="evenodd"/></svg>
                            {{ $key->sender->nama_admin }}
                        </div>
                        <div>
                            {{ $key->tanggal }}
                        </div>
                        @endif
                      </div>

                      @if ($key->sender_id == Auth::user()->id)
                      <a class="block block-rounded bg-primary" style="border-radius: 35px 0px 35px 35px;"
                      href="javascript:void(0)">
                     <div class="block-content block-content-full d-flex align-items-center justify-content-between" style="margin-right: 10px">
                       <div>
                       </div>
                       <div class="ms-3 text-end">
                         <p class="fw-semibold text-white mb-2 mt-4 mb-4">
                            {{ $key->isi }}
                         </p>
                       </div>
                     </div>
                   </a>
                      @else
                      <a class="block block-rounded "
                         style="border-radius: 0px 35px 35px 35px; background-color: rgb(198, 198, 198);"
                         href="javascript:void(0)">
                        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                          <div class="ms-3 text-start">
                            <p class="fw-semibold text-black mt-4 mb-4 mr-4">
                              {{ $key->isi }}
                            </p>
                          </div>
                          <div>
                          </div>
                        </div>
                      </a>
                      @endif
                    </div>
                    @if ($key->sender_id == Auth::user()->id)
                    @else
                    <div class="col-md- col-xl-1 ">
                        <div class="align-items-center justify-content-between">
                            <img class="img-avatar img-avatar48 " src="/assets/media/avatars/avatar14.jpg" alt="">
                          </div>
                        </div>
                        @endif
                  </div>
                </div>
              </div>
            @endforeach
        </div>

        <div class="card-footer">

            <form action="{{ route('chat-kirim') }}">
                <input type="hidden" name="id" value="{{ $pengirimUser }}">
    <div class="d-flex">

            <input type="text" class="form-control" name="isi" id="isi"  placeholder="pesan"> <button class="btn btn-sm btn-success" type="submit"> kirim</button>
        </div>
    </form>



        </div>
      </div>
    </div>
  </div>



@endsection
@push('js')
<script>
    $(document).ready(function(){
  setInterval(function(){
      location.reload();
  }, 1000);
});
</script>
@endpush
