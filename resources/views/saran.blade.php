@extends('template')

<head>
    <title>Jurnal Scraping</title>

    <link rel="shortcut icon" href="{{ asset('/images/sinta/21.png') }}" sizes="500x500"/>
    <style type="text/css">
        .italic {
            font-style: italic;
        }
    </style>
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('coba3/style.css') }}">

</head>
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
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="s-1"> </span>
                        <span class="s-2"> </span>
                        <span class="s-3"> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
                            <ul class="navbar-nav  ">
                                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('index') }}">Beranda</a>
                                </li>
                                <li class="nav-item {{ request()->is('tentang') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('tentang') }}"> Tentang</a>
                                </li>
                                <li class="nav-item {{ request()->is('saran') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('tampil') }}">Saran</a>
                                </li>
                                <li class="nav-item {{ request()->is('infojurnal') ? 'active' : '' }}">
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
    <section class="service_section layout_padding" style="background-color: white; height:90vh">
        <div class="container-fluid">

            <div class="heading_container" style="color:black ">
                <h2>
                    Berikan Saran Anda
                </h2>
                <p>
                    Berikan Kontribusi Pada Website Jurnal Scraping Agar Meningkatkan Kinerja Dalam Memberikan Informasi
                </p>
                <div class="btn-box">
                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">Tambahkan
                        Saran</a>
                </div>
            </div>
            <div class="row mt-4">
                @foreach($data as $d)
                <div class="col-md-6">
                    <div class="card border border-primary mb-2" style="border: blue; ">
                        <ul class="list-unstyled">
                            <!--FOURTH LIST ITEM-->

                            <li class="media my-2">

                                <span class="round "><img
                                        src="https://img.icons8.com/office/100/000000/user-group-man-man--v1.png"
                                        class="align-self-start mr-3"></span>
                                <div class="media-body">
                                    <div class="row d-flex">
                                        <div class="col-md-6">
                                            <div class="text-left">
                                                <h6 class="user">   {{ $d->nama_penulis}}</h6>
                                            </div>
                                            <div class="text-left">
                                                <h6 class="user">   {{ $d->created_at}}</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-right" style="padding-right: 65px">
                                                <h6 class="user italic">~~ {{ $d->review}} ~~</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-1 ">
                                        <div class="media mt-1 comment" style="background-color: #7d746c">
                                        <h5 class="user mt-3 mb-3">{{ $d->isi}}
                                        </h5>
                                        </div>
                                    {{-- </div> --}}
                                </div>
                                    @if (!empty($d->balas))
                                    @foreach ( $d->balas as $item)

                                    <div class="media mt-3 comment" style="background-color: #6c757d"> <a
                                            href="#"><img
                                                src="https://img.icons8.com/bubbles/100/000000/lock-male-user.png"
                                                class="align-self-center"></a>

                                        <div class="media-body mt-3 mb-1">
                                            <p class="reply text-left">   {{ $item->balas }}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Modal Ber saran --}}
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Berikan Saran</h5>
        </div>
        <form action="{{ route('saran1') }}" method="get">
            {{ csrf_field() }}
        <div class="modal-body">
            <div class="mb-2">
                <label class="form-label" for="inputUsername">Nama</label>
                <input type="text" class="form-control" id="nama_penulis" name="nama_penulis" placeholder="" value="" required>
            </div>
        <div class="mb-3">
            <label class="form-label" for="inputUsername">Review</label>
            <select class="form-control" id="review" name="review" required>
                <option value="Sangat Membantu">Sangat Membantu</option>
                <option value="Membantu">Membantu</option>
                <option value="Cukup Membantu">Cukup Membantu</option>
                <option value="Tidak Membantu">Tidak Membantu</option>
            </select>
        </div>
        <div class="mb-2">
            <label class="form-label" for="inputUsername">Saran</label><br>
            <textarea name="isi" id="isi" cols="57" rows="1" class="form-control"></textarea>
        </div>
        <div class="mb-2">
            <label for="captcha" class="form-label">Captcha</label>
            <div class="col-md-6 captcha">
                <span>{!! captcha_img('math') !!}</span>
                <button type="button" class="btn btn-danger reload" class="reload" id="reload">
                &#x21bb;
                </button>
            </div>
        </div>
        <div class="mb-2">
            <label for="captcha" class="form-label">Enter Captcha</label>
                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha" required >
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary" id="liveToastBtn">Kirim</button>
        </div>
    </div>
        </form>
    </div>
    </div>
    </div>
    <footer class="navbar navbar-expand-lg custom_nav-container " style="background-color: #081c5c">
        <a class="navbar-brand text-right" href="" style="width: 100%">
            <h6 class="text-right text-white"><strong>Website Jurnal Scraping 2023</strong></h6>
        </a>
    </footer>

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
 // <script>
     $('#reload').click(function () {
         $.ajax({
             type: 'GET',
             url: 'reload-captcha',
             success: function (data) {
                 $(".captcha span").html(data.captcha);
             }
         });
     });
 </script>
@endpush
@include('sweetalert::alert')
@stack('scripts')

</body>
