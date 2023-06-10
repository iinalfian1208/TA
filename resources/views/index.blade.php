@extends('template')
<head>
    <title>Jurnal Scraping</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"> --}}
  <link rel="shortcut icon" href="{{ asset('/images/sinta/21.png') }}" sizes="100x100"/>
  <link rel="stylesheet" href="{{ asset('home/css/login.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('backup/admin/css/light.css') }}"> --}}

</head>
{{-- @section('tentang') --}}
<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
              <span>
                Jurnal Scraping
              </span>
            </a>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="s-1"> </span>
              <span class="s-2"> </span>
              <span class="s-3"> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
                <ul class="navbar-nav  ">
                  <li class="nav-item {{ (request()-> is('/')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('index') }}">Beranda</a>
                  </li>
                  <li class="nav-item {{ (request()-> is('tentang')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('tentang') }}"> Tentang</a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link" href="service.html"> Saran </a>
                  </li> --}}
                  <li class="nav-item {{ (request()-> is('saran')) ? 'active' : '' }}">
                      {{-- <a class="nav-link" href="#contactLink">Saran</a> --}}
                    <a class="nav-link" href="{{ route('tampil') }}">Saran</a>
                  </li>
                  <li class="nav-item {{ (request()-> is('infojurnal')) ? 'active' : '' }}">
                    {{-- <a class="nav-link" href="#contactLink">Saran</a> --}}
                  <a class="nav-link" href="{{ route('pencarian') }}">Info Jurnal</a>
                </li>
                </ul>
              </div>
            </div>
          </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

        <div class="container" style="padding-top: 30px">
            <div class="row d-flex justify-content-center" style="padding-left: 25px; padding-right: 25px;">
                <!-- Side widgets-->
                <div class="col-lg-12 mt-2 mb-3">
                    <form action="{{ route('search') }}" method="GET">
                       <div class="input-group" style="border-radius: 50px">
                            <input class="form-control"style="border-radius: 50px; margin-right: 10px" type="search" placeholder="Lakukan Pencarian Berdasarkan Nama Jurnal, Nama Perguruan Tinggi Atau Lainnya" aria-label="Pencarian" aria-describedby="button-search" name="kata_kunci" value="{{ Route::is('pencarian') ? NULL : old('kata_kunci') }}" />
                                <button class="btn btn-primary" type="submit"style="border-radius: 40px">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Page content-->
        <div class="container mb-5">
            <div class="row" style="padding-left: 25px; padding-right: 25px;">
                <!-- Side widgets-->
                <div class="col-lg-4 mt-2 mb-3" >
                    <div class="sticky-top" style="top:90px;">

                        <!-- Categories widget-->
                        <div class="card mb-4" style="background-color: #d3d7dc">
                            <form action="{{ route('search') }}" method="GET">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-4">
                                                    Filter
                                                </div>
                                                <div class="col-8 text-right">
                                                    <button type="submit" class="btn btn-sm btn-primary" style="border-radius: 40px">Terapkan</button>
                                                    <button type="button" class="btn btn-sm btn-secondary" style="border-radius: 40px" onclick="redirectToIndex()">Refresh</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12 d-flex justify-content-center">
                                            <a data-bs-toggle="collapse" href="#filter" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                <span style="font-weight: 470"><i class="bi bi-arrow-down-up"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path fill="currentColor" d="m11.95 7.95l-1.414 1.414L8 6.828V20H6V6.828L3.466 9.364L2.05 7.95L7 3l4.95 4.95Zm10 8.1L17 21l-4.95-4.95l1.414-1.414l2.537 2.536L16 4h2v13.172l2.536-2.536l1.414 1.414Z"/></svg></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body collapse show" id="filter">

                                    <div class="row">
                                        <div class="col-md-12"  style="background-color: #ccd0d5">
                                            {{-- <a data-bs-toggle="collapse" href="#akreditasi" role="button" aria-expanded="false" aria-controls="collapseExample"> --}}
                                                <span style="font-weight: 470">Jurnal Terakreditasi</span><hr class="mb-0 mt-2 border border-1 border border-primary">
                                            {{-- </a> --}}
                                        </div>
                                    </div>
                                    <div class="row" id="akreditasi">
                                        <div class="col-sm-12">
                                            <input type="hidden" name="kata_kunci" value="{{ Route::is('pencarian') ? NULL : old('kata_kunci') }}">
                                            <div class="row">
                                                @for ($i = 1; $i <= 6; $i++)
                                                    <div class="col-sm-4">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="sinta[]" name="sinta[]" value="{{ $i }}"
                                                                @if(is_array(old('sinta')) && in_array($i, old('sinta')) && !Route::is('pencarian'))
                                                                    checked
                                                                @endif
                                                            >
                                                            <label class="form-check-label" for="inlineCheckbox1">S{{ $i }}</label>
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <hr class="mb-0 mt-2 border border-1 border border-dark"> --}}
                                    <div class="row">
                                        <div class="col-md-12 mb-2 mt-2" style="background-color: #ccd0d5">
                                            <span style="font-weight: 470">Jadwal Publikasi</span><hr class="mb-0 mt-2 border border-1 border border-primary">
                                        </div>
                                    </div>
                                    <div class="row">
                                        @for ($j = 1; $j <= 12; $j++)
                                            @switch($j)
                                                @case(1)
                                                    @php $bln = "Januari"; @endphp
                                                    @break
                                                @case(2)
                                                    @php $bln = "Februari"; @endphp
                                                    @break
                                                @case(3)
                                                    @php $bln = "Maret"; @endphp
                                                    @break
                                                @case(4)
                                                    @php $bln = "April"; @endphp
                                                    @break
                                                @case(5)
                                                    @php $bln = "Mei"; @endphp
                                                    @break
                                                @case(6)
                                                    @php $bln = "Juni"; @endphp
                                                    @break
                                                @case(7)
                                                    @php $bln = "Juli"; @endphp
                                                    @break
                                                @case(8)
                                                    @php $bln = "Agustus"; @endphp
                                                    @break
                                                @case(9)
                                                    @php $bln = "September"; @endphp
                                                    @break
                                                @case(10)
                                                    @php $bln = "Oktober"; @endphp
                                                    @break
                                                @case(11)
                                                    @php $bln = "November"; @endphp
                                                    @break
                                                @case(12)
                                                    @php $bln = "Desember"; @endphp
                                                    @break
                                            @endswitch
                                            <div class="col-sm-6">
                                                <div div class="form-check form-check-inline">
                                                    <input class="form-check-input border"  type="checkbox" id="jadwal[]" name="jadwal[]" value="{{ $j }}"
                                                        @if(is_array(old('jadwal')) && in_array($j, old('jadwal')) && !Route::is('pencarian'))
                                                            checked
                                                        @endif
                                                    >
                                                    <label class="form-check-label" >{{ $bln }}</label>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-2 mt-2"  style="background-color: #ccd0d5">
                                            <span style="font-weight: 470">Kategori Jurnal</span><hr class="mb-0 mt-2 border border-1 border border-primary">
                                        </div>
                                    </div>
                                    <div class="row">
                                        @for ($i = 0; $i < count($kategori); $i++)
                                            <div class="col-sm-6">
                                                <div div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="kategori[]" name="kategori[]" value="{{ $kategori[$i]->nama_kategori }}"
                                                        @if(is_array(old('kategori')) && in_array($kategori[$i]->nama_kategori, old('kategori')) && !Route::is('pencarian')) checked @endif
                                                    >
                                                    <label class="form-check-label">{{ $kategori[$i]->nama_kategori }}</label>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                {{-- <div class="col-lg-8 mt-2" style=" background-color:#7ea2c7;border-radius:5px"> --}}
                <div class="col-lg-8 mt-2" style=" background-color:;border-radius:5px">
                    {{-- <div class=" position-fixed" style="top:100px"> --}}
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-2">
                            <div class="row d-flex justify-content-between">
                                <div class="col-md-5 mt-2">
                                    <span class="text-muted fst-italic text-black" style="text-black"><strong>Total Data : {{ $data->total() }}</strong></span></br>
                                    <span class="text-muted fst-italic text-black">{{ ceil($data->total()/10) }} Halaman</span>
                                </div>
                                <div id="pagi" class="col-md-7 d-flex justify-content-end mt-2">
                                    {{ $data->onEachSide(1)->links() }}
                                    {{-- {{ $data->appends(request()->query())->links('vendor.pagination.custom') }} --}}
                                </div>
                            </div>
                        </header>
                    </article>
                    {{-- </div> --}}
                    <section class="mb-2">
                        {{-- <div class="card border-danger " style="border: 10px;background-color:#7ea2c7;" > --}}
                        <div class="card border-danger " style="border: 10px;background-color:;" >
                            {{-- <div class="card-body"> --}}
                                <div class="row">
                                    @foreach ($data as $key=>$d)
                                        @php
                                            $j_kat = DB::table('t_kategori')->where('id_jurnal', $d->id_jurnal)->get();
                                            $j_jdw = DB::table('t_publikasi_jurnal')->where('id_jurnal', $d->id_jurnal)->get();
                                        @endphp
                                        <div class="col-md-6 mb-3">
                                            <div class="card bg-light border-secondary" style="background-color: #6e90b3">
                                                <div class="card-body p-3 px-4">
                                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 p-2" style="border-radius: 5px"><span>Sinta {{ $d->peringkat }}</span></div>
                                                    <a href="{{ $d->url }}" style="text-decoration: none;" target="_blank"><h6 class="fw-bold">{{ $d->nama_jurnal }}</h6></a>
                                                    {{-- <div class="small text-muted">- Client Name, Location</div> --}}
                                                    <h6 class="mb-0">{{ $d->nama_pt }}</h6><hr class="mb-0 mt-2 border border-1 border border-primary">
                                                    <ul class="list-unstyled mt-1 mb-0">
                                                        <li class="mb-2">
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0"><i class="bi bi-signpost"></i></div>
                                                                <div class="ms-2"><svg xmlns="http://www.w3.org/2000/svg"  width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21 17v-6.9L12 15L1 9l11-6l11 6v8h-2Zm-9 4l-7-3.8v-5l7 3.8l7-3.8v5L12 21Z"/></svg>
                                                                    @if (count($j_kat) == 0 || $d->id_jurnal == null)
                                                                        <span>-</span>
                                                                    @else
                                                                        @for ($i = 0; $i < count($j_kat); $i++)
                                                                            <span>{{ $j_kat[$i]->nama_kategori }}
                                                                            @if ($i+1 != count($j_kat))
                                                                                |
                                                                            @endif
                                                                            </span>
                                                                        @endfor
                                                                    @endif
                                                                    {{-- @foreach ($j_kat as $j_k)
                                                                    <span class="badge bg-secondary">{{ $j_k->nama_kategori }} </span>
                                                                    @endforeach --}}
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="23" height="23" viewBox="0 0 1024 1024"><path fill="currentColor" d="m960 95.888l-256.224.001V32.113c0-17.68-14.32-32-32-32s-32 14.32-32 32v63.76h-256v-63.76c0-17.68-14.32-32-32-32s-32 14.32-32 32v63.76H64c-35.344 0-64 28.656-64 64v800c0 35.343 28.656 64 64 64h896c35.344 0 64-28.657 64-64v-800c0-35.329-28.656-63.985-64-63.985zm0 863.985H64v-800h255.776v32.24c0 17.679 14.32 32 32 32s32-14.321 32-32v-32.224h256v32.24c0 17.68 14.32 32 32 32s32-14.32 32-32v-32.24H960v799.984zM736 511.888h64c17.664 0 32-14.336 32-32v-64c0-17.664-14.336-32-32-32h-64c-17.664 0-32 14.336-32 32v64c0 17.664 14.336 32 32 32zm0 255.984h64c17.664 0 32-14.32 32-32v-64c0-17.664-14.336-32-32-32h-64c-17.664 0-32 14.336-32 32v64c0 17.696 14.336 32 32 32zm-192-128h-64c-17.664 0-32 14.336-32 32v64c0 17.68 14.336 32 32 32h64c17.664 0 32-14.32 32-32v-64c0-17.648-14.336-32-32-32zm0-255.984h-64c-17.664 0-32 14.336-32 32v64c0 17.664 14.336 32 32 32h64c17.664 0 32-14.336 32-32v-64c0-17.68-14.336-32-32-32zm-256 0h-64c-17.664 0-32 14.336-32 32v64c0 17.664 14.336 32 32 32h64c17.664 0 32-14.336 32-32v-64c0-17.68-14.336-32-32-32zm0 255.984h-64c-17.664 0-32 14.336-32 32v64c0 17.68 14.336 32 32 32h64c17.664 0 32-14.32 32-32v-64c0-17.648-14.336-32-32-32z"/></svg></div>
                                                                <div class="ms-2">
                                                                    @if (count($j_jdw) == 0 || $d->id_jurnal == null)
                                                                        <span>-</span>
                                                                    @else
                                                                        @for ($i = 0; $i < count($j_jdw); $i++)
                                                                        @switch($j_jdw[$i]->bulan)
                                                                            @case(1)
                                                                                @php $bln = "Januari"; @endphp @break
                                                                            @case(2)
                                                                                @php $bln = "Februari"; @endphp @break
                                                                            @case(3)
                                                                                @php $bln = "Maret"; @endphp @break
                                                                            @case(4)
                                                                                @php $bln = "April"; @endphp @break
                                                                            @case(5)
                                                                                @php $bln = "Mei"; @endphp @break
                                                                            @case(6)
                                                                                @php $bln = "Juni"; @endphp @break
                                                                            @case(7)
                                                                                @php $bln = "Juli"; @endphp @break
                                                                            @case(8)
                                                                                @php $bln = "Agustus"; @endphp @break
                                                                            @case(9)
                                                                                @php $bln = "September"; @endphp @break
                                                                            @case(10)
                                                                                @php $bln = "Oktober"; @endphp @break
                                                                            @case(11)
                                                                                @php $bln = "November"; @endphp @break
                                                                            @case(12)
                                                                                @php $bln = "Desember"; @endphp @break
                                                                        @endswitch
                                                                            <span>{{ $bln }}
                                                                                @if ($i+1 != count($j_jdw))
                                                                                  |
                                                                                @endif
                                                                            </span>
                                                                        @endfor
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row d-flex justify-content-between">
                                            {{-- <div class="col-md-5">
                                                <span class="text-muted fst-italic">Total Data : {{ $data->total() }}</span></br>
                                                <span class="text-muted fst-italic">{{ ceil($data->total()/10) }} Halaman</span>
                                            </div> --}}
                                            {{-- <div id="pagi2" class="col-md-7 d-flex justify-content-end mt-1"> --}}
                                                {{-- <nav aria-label="Page navigation example"> --}}
                                                {{-- {{ $data->links('vendor.pagination.custom') }} --}}
                                                {{-- {{ $data->onEachSide(1)->links() }} --}}
                                                {{-- {!! $data->onEachSide(3)->links('vendor.pagination.custom') !!} --}}
                                                {{-- </nav> --}}
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                </div>
                            {{-- </div> --}}
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="navbar navbar-expand-lg custom_nav-container " style="background-color: #081c5c">
            <a class="navbar-brand text-right " href="" style="width: 100%">
                <h6 class="text-right text-white"><strong>Website Jurnal Scraping 2023</strong></h6>
            </a>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ url('search/js/scripts.js')}}"></script>
        {{-- <script src="{{ url('js/reload.js')}}"></script> --}}

        <script>
            function redirectToIndex() {
                window.location.href = '{{ route("pencarian") }}';
            }
        </script>
        <script>
            function myFunction(x) {
              if (x.matches) { // If media query matches
              	var element = document.getElementById("pagi");
              	element.classList.remove("justify-content-end");
                element.classList.add("justify-content-center");
                var element2 = document.getElementById("pagi2");
                element2.classList.remove("justify-content-end");
                element2.classList.add("justify-content-center");
              } else {
                var element = document.getElementById("pagi");
              	element.classList.remove("justify-content-center");
                element.classList.add("justify-content-end");
                var element2 = document.getElementById("pagi2");
                element2.classList.remove("justify-content-center");
                element2.classList.add("justify-content-end");
              }
            }

            var x = window.matchMedia("(max-width: 1300px)")
            myFunction(x) // Call listener function at run time
            x.addListener(myFunction) // Attach listener function on state changes
        </script>
    </body>
</html>
{{-- @endsection --}}
