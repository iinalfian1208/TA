<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jurnal Scraping</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    {{-- <link rel="stylesheet" href="{{ asset('/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('/js/select.dataTables.min.css') }}"> --}}
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('/images/sinta/21.png') }}" sizes="100x100" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    {{-- @livewireStyles --}}
{{-- @stack('js') --}}


</head>

<body>
    
    <div class="container-scroller">
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3" style="background-color: #81B186">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="">
                        <img src="{{ asset('/images/sinta/24.png') }}" alt="image-fluid" style="width: 600px; height:40px;"/>
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="">
                        <img src="{{ asset('/images/sinta/21.png') }}" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0" >
                        <h1 class="welcome-text">Selamat Datang <span class="text-black fw-bold">{{ auth()->user()->nama_admin }}</span></h1>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown d-none d-lg-block"></li>
                    <li class="nav-item d-none d-lg-block">
                        <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                            <span class="input-group-addon input-group-prepend border-right">
                                <span class="icon-calendar input-group-text calendar-icon"></span>
                            </span>
                            <input type="text" class="form-control">
                        </div>
                    </li>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                        aria-labelledby="notificationDropdown">
                    </div>
                    @if (auth()->user()->level == 1)
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                            <i class="icon-mail icon-lg"></i>
                          </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                          aria-labelledby="countDropdown" style="overflow-y:scroll ; height :370px">
                            <a class="dropdown-item py-3" href="{{ route('hapusnotif') }}">
                                <strong><p class="mb-0 font-weight-bold float-left text-bold">Notifikasi Pesan</p></strong>
                                <button class="badge badge-pill badge-danger float-right text-white">Hapus Notifikasi</button>
                            </a>
                            <div class="dropdown-divider"></div>
                            @foreach ( $notifpesan as $item )
                            <a class="dropdown-item preview-item" href="{{ route('daftar-chat') }}"  >
                                <div class="preview-thumbnail">
                                    <img src="{{ asset('images/sinta/pesa.jpg') }}" alt="image" class="">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="widget-media dz-scroll height380">{{ $item->nama }} mengirim chat untuk anda </p>
                                    <p class="widget-media dz-scroll height380 mt-1">Klik untuk membalasnya</p>
                                    <p class="fw-light small-text mb-0"> {{ $item->created_at }}</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </li>
                    @endif
                    @if (auth()->user()->level == 2)
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                          <i class="icon-mail icon-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                            aria-labelledby="countDropdown" style="overflow-y:scroll ; height :370px">
                            <a class="dropdown-item py-3" href="{{ route('hapusnotifpesan') }}">
                                <strong><p class="mb-0 font-weight-bold float-left text-bold">Notifikasi Pesan</p></strong>
                                <button class="badge badge-pill badge-danger float-right text-white">Hapus Notifikasi</button>
                            </a>
                            <div class="dropdown-divider"></div>
                            @foreach ( $notifpesan as $item )
                            <a class="dropdown-item preview-item" href="{{ route('balas-chat',$item->user_id) }}"  >
                                <div class="preview-thumbnail">
                                    <img src="{{ asset('images/sinta/pesa.jpg') }}" alt="image" class="">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="widget-media dz-scroll height380">{{ $item->nama }} mengirim chat untuk anda </p>
                                    <p class="widget-media dz-scroll height380 mt-1">Klik untuk Membalasnya</p>
                                    <p class="fw-light small-text mb-0"> {{ $item->created_at }}</p>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </li>
                    @endif
                    @if (auth()->user()->level == 1)
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                            <i class="icon-bell"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                            aria-labelledby="countDropdown" style="overflow-y:scroll ; height :370px">
                                <a class="dropdown-item py-3" href="{{ route('hapusnotif') }}">
                                    <strong><p class="mb-0 font-weight-bold float-left text-bold">Notifikasi Saran</p></strong>
                                    <button class="badge badge-pill badge-danger float-right text-white">Hapus Notifikasi</button>
                                </a>
                                <div class="dropdown-divider"></div>

                                {{-- @foreach ( $notif as $item ) --}}
                                @foreach ($notif as $item)
                                <a class="dropdown-item preview-item" href="{{ auth()->user()->level == 1 ? route('tampil1') : route('daftar-chat') }}">
                                    <div class="preview-thumbnail">
                                        @if (auth()->user()->level == 1)
                                            <img src="{{ asset('images/sinta/pesa.jpg') }}" alt="image" class="">
                                        @else
                                            <img src="{{ asset('images/sinta/21.jpg') }}" alt="image" class="">
                                        @endif
                                    </div>
                                    <div class="preview-item-content flex-grow py-2">
                                        <p class="widget-media dz-scroll height380">{{ $item->nama }} {{ $item->keterangan }}</p>
                                        <p class="widget-media dz-scroll height380 mt-1">Klik Untuk Membalasnya</p>
                                        <p class="fw-light small-text mb-0">{{ $item->created_at }}</p>
                                    </div>
                                </a>
                                 @endforeach
                        </div>
                    </li>
                      @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img class="img-xs rounded-circle" src="{{ asset('images/faces/profile/profil.png') }}" alt="Profile image"> </a>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                            <img class="img-xs rounded-circle" src="{{ asset('images/faces/profile/profil.png') }}" alt="Profile image">
                        </div>
                         <a class="dropdown-item {{ request()->is('profil') ? 'active' : '' }}"
                            href="{{ route('profil') }}"><i
                                class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> Profil
                            <span class="badge badge-pill badge-danger"></span></a>
                                <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                                 class="dropdown-item-icon mdi mdi-logout text-primary"></i>Keluar</a> </div>
                    </li>
                 </ul>

                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>

        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Keluar?</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Yakin ingin logout / keluar dari sistem?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </div>
            </div>
          </div>



        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border me-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>

            {{-- NAVBAR --}}
            <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #619E67">
                <ul class="nav">
                    <li class="nav-item nav-category">Menu Jurnal</li>
                    <li class="nav-item {{ request()->is('beranda') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('beranda') }}">
                            <i class="mdi mdi-apps  menu-icon"></i>
                            <span class="menu-title text-black" style="text-black">Beranda</span>
                        </a>
                    </li>
                    @if (auth()->user()->level == 1)
                    <li class="nav-item {{ request()->is('data_user') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('data_user') }}">
                            {{-- <i class=" mdi mdi-account-check  menu-icon" data-feather="users"></i> --}}
                            <i class=" mdi mdi-account-check  menu-icon"></i>
                            <span class="menu-title text-black" style="text-black">Data User</span>
                        </a>
                    </li>
                    @endif
                    @if (auth()->user()->level == 1)
                    <li
                    class="nav-item {{ (request()-> is('daftar_pt')) ? 'active' : ((request()-> is('daftar_kategori')) ? 'active' : ((request()-> is('daftar_jurnal')) ? 'active' : '' ))}}">
                    <a data-target="#data_scraping" class="nav-link" data-bs-toggle="collapse" href="#data_scraping"
                        aria-expanded="false" aria-controls="data_scraping">
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title text-black" style="text-black">Data Scraping</span>
                        <i class="menu-arrow"></i>
                    </a>

                    <div class="collapse" id="data_scraping">

                        <ul id="data_scraping"
                            class="nav flex-column sub-menu {{ (request()-> is('daftar_pt' )) ? 'show' : ((request()-> is('daftar_kategori' )) ? 'show' : ((request()-> is('daftar_jurnal' )) ? 'show' : '' ))}}"
                            data-parent="#data_scraping">
                            <li class="nav-item"> <a
                                    class="nav-link  {{ request()->is('daftar_pt') ? 'active' : '' }}"
                                    href="{{ route('daftar_pt') }}" style="text-warning">Data Perguruan Tinggi</a></li>
                            <li class="nav-item"> <a
                                    class="nav-link {{ request()->is('daftar_kategori') ? 'active' : '' }}"
                                    href="{{ route('daftar_kategori') }}">Data Kategori</a></li>
                            <li class="nav-item"> <a
                                    class="nav-link {{ request()->is('daftar_jurnal') ? 'active' : '' }}"
                                    href="{{ route('daftar_jurnal') }}">Data Jurnal</a></li>

                        </ul>
                    </div>
                </li>
                    @endif
                    @if (auth()->user()->level == 2)
                    <li class="nav-item {{ request()->is('daftar_pt*', 'daftar_kategoriadmin*', 'daftar_jurnaladmin*') ? 'active' : '' }}">
                        <a data-target="#data_scraping" class="nav-link" data-bs-toggle="collapse" href="#data_scraping"
                            aria-expanded="false" aria-controls="data_scraping">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title text-black" style="text-black">Data Scraping</span>
                            <i class="menu-arrow"></i>
                        </a>

                        <div class="collapse" id="data_scraping">
                            <ul id="data_scraping" class="nav flex-column sub-menu">
                                <li class="nav-item {{ request()->is('daftar_pt*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('daftar_pt') }}" style="text-warning">Data Perguruan Tinggi</a>
                                </li>
                                <li class="nav-item {{ request()->is('daftar_kategoriadmin*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('daftar_kategori') }}">Data Kategori</a>
                                </li>
                                <li class="nav-item {{ request()->is('daftar_jurnaladmin*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('daftar_jurnal') }}">Data Jurnal</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item {{ request()->is('chatadmin*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('chat-admin') }}">
                            <i class="mdi mdi-message-badge menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M4 4h16v12H5.17L4 17.17V4m0-2c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2H4zm2 10h12v2H6v-2zm0-3h12v2H6V9zm0-3h12v2H6V6z"/>
                                </svg>
                            </i>
                            <span class="menu-title text-black bold" style="text-black">Chat</span>
                        </a>
                    </li>
                @endif


                {{-- @if (auth()->user()->level == 2)
                    <li class="nav-item {{ request()->is('chat*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('chat-admin') }}">
                            <i class="mdi mdi-message-badge menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M4 4h16v12H5.17L4 17.17V4m0-2c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2H4zm2 10h12v2H6v-2zm0-3h12v2H6V9zm0-3h12v2H6V6z"/>
                                </svg>
                            </i>
                            <span class="menu-title text-black bold" style="text-black">Chat</span>
                        </a>
                    </li>
                @endif --}}

                    <li class="nav-item {{ request()->is('riwayat_pencarian') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('riwayat_pencarian') }}">
                            {{-- <i class="mdi mdi-account-search menu-icon"  data-feather="clock"></i> --}}
                            <i class="mdi mdi-account-search menu-icon"></i>
                            <span class="menu-title text-black" style="text-black">Riwayat Pencarian</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('pengaturan') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ Route('pengaturan') }}">
                            {{-- <i class="menu-icon mdi mdi-settings" data-feather="settings"></i> --}}
                            <i class="menu-icon mdi mdi-settings"></i>
                            <span class="menu-title text-black" style="text-black">Pengaturan</span>
                        </a>
                    </li>
                     @if (auth()->user()->level == 1)
                    <li class="nav-item {{ request()->is('saran') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('tampil1') }}">
                            <i class="mdi mdi-message-draw  menu-icon"></i>
                            <span class="menu-title text-black" style="text-black">Saran</span>
                        </a>
                    </li>
                    @endif
                     @if (auth()->user()->level == 1)
                    <li class="nav-item {{ request()->is('chat') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('daftar-chat') }}">
                            <i class="mdi mdi-message-badge  menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4 4h16v12H5.17L4 17.17V4m0-2c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2H4zm2 10h12v2H6v-2zm0-3h12v2H6V9zm0-3h12v2H6V6z"/></svg></i>
                            <span class="menu-title text-black bold" style="text-black">Chat</span>
                        </a>
                    </li>
                    @endif
                     {{-- @if (auth()->user()->level == 2)
                    <li class="nav-item {{ request()->is('chat') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('chat-admin') }}">
                            <i class="mdi mdi-message-badge  menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4 4h16v12H5.17L4 17.17V4m0-2c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2H4zm2 10h12v2H6v-2zm0-3h12v2H6V9zm0-3h12v2H6V6z"/></svg></i>
                            <span class="menu-title text-black-bold" style="text-black">Chat</span>
                        </a>
                    </li>
                    @endif --}}
                    <li class="nav-item">
                        <a class="nav-link" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class=" mdi mmdi mdi-logout  menu-icon"></i>
                            <span class="menu-title text-black" style="text-black">Keluar</span>
                        </a>
                    </li>
                </ul>
            </nav>

            {{--
      NAVBAR END --}}
            <!-- partial -->
            @yield('beranda')
            @yield('data_user')
            @yield('daftar_pt')
            @yield('daftar_jurnal')
            @yield('daftar_kategori')
            @yield('riwayat_pencarian')
            @yield('detail_jurnal')
            @yield('pengaturan')
            @yield('profil')
            @yield('penjadwalan')
            @yield('saran')
            @yield('chat')
            @yield('ChatSP')
            @yield('balas')

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    {{-- @foreach ($saran as $a)
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
    @endforeach --}}
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{ url('/backup/admin/js/app.js')}}"></script>
    <script src="{{ url('/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ url('/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ url('/vendors/progressbar.js/progressbar.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    {{-- {{ url('/vendors/progressbar.js/progressbar.min.js') }} --}}
    <script src="{{ url('/js/off-canvas.js') }}"></script>
    <script src="{{ url('/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('/js/template.js') }}"></script>
    <script src="{{ url('/js/settings.js') }}"></script>
    <script src="{{ url('/js/todolist.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        #loading-spinner {
          display: none; /* Sembunyikan spinner saat tidak ada loading */
        }
      </style>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src=" {{ url('/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ url('/js/dashboard.js') }}"></script>
    <script src="{{ url('/js/Chart.roundedBarCharts.js') }}"></script>
    <!-- End custom js for this page-->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#tableData').DataTable();
        });
    </script>

    <script>
        function previewFile(input){
            var file=$("input[type=file]").get(0).files[0];
            if(file)
            {
                var reader = new FileReader();
                reader.onload = function(){
                    $('#previewImg').attr("src",reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
    <script>
        function back(){
            window.history.back();
        }
    </script>

    {{-- Tab Spesifik --}}
    <script>
        //redirect to specific tab
        $(document).ready(function () {
            $('#tabMenu a[href="#{{ old('tab') }}"]').tab('show')
        });
    </script>

{{-- @livewireScripts --}}

</body>

</html>
