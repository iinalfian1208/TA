@extends('template')
<head>
    <title>Jurnal Scraping</title>

  <link rel="shortcut icon" href="{{ asset('/images/sinta/sintalogo.png') }}" />

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
                    {{-- <a class="nav-link" href="about.html"> Tentang</a> --}}
                    <a class="nav-link" href="#tentang"> Tentang</a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link" href="service.html"> Saran </a>
                  </li> --}}
                  <li class="nav-item {{ (request()-> is('saran')) ? 'active' : '' }}">
                      {{-- <a class="nav-link" href="#contactLink">Saran</a> --}}
                    <a class="nav-link" href="{{ route('tampil') }}">Saran</a>
                  </li>
                  <li class="nav-item {{ (request()-> is('infojurnal')) ? 'active' : '' }}">
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

  <!-- about section -->

  <section class="about_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="img-box">
            <img src="home/images/about-img2.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
                 Tentang
                </h2>
              </div>
              <p>
                  Website Jurnal Scraping memberikan informasi tentang jadwal publikasi dari berbagai jurnal yang terakreditasi SINTA
              </p>
              <a href="https://sinta.kemdikbud.go.id/">
                Read More
              </a>
            </div>
          </div>
      </div>
    </div>
  </section>

  <!-- end about section -->


  <div class="footer_bg">

    <!-- contact section -->


  </div>


</body>

</html>
