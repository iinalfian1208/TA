@extends('template')

@section('home')
<body>
   
    <header class="header_section">

        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="pencarian.html">
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
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ route('index') }}">Beranda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('tentang') }}"> Tentang</a>
                  </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link" href="service.html"> Saran </a>
                  </li> --}}
                  <li class="nav-item">
                      {{-- <a class="nav-link" href="#contactLink">Saran</a> --}}
                    <a class="nav-link" href="{{ route('tampil') }}">Saran</a>
                  </li>
                  <li class="nav-item {{ (request()-> is('infojurnal')) ? 'active' : '' }}">
                    {{-- <a class="nav-link" href="#contactLink">Saran</a> --}}
                  <a class="nav-link" href="{{ route('pencarian') }}">Info Jurnal</a>
                </ul>
              </div>

            </div>
          </nav>
        </div>
      </header>


  <!-- about section -->
   <section class=" slider_section ">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-1 "></div>
                <div class="col-md-6">
                  <div class="detail_box">
                    <h1 class="text-white">
                      Website Jurnal Scraping
                    </h1>
                    <p>
                     Temukan Informasi Selengkapnya
                    </p>
                    <div class="btn-box">
                        <a href="{{ route('login') }}" class="btn-1">
                          Login
                        </a>
                        <a href="{{ route('pencarian') }}" class="btn-2">
                          Info Jurnal
                        </a>
                      </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="img-box">
                    <img src="home/images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item ">
            <div class="container">
              <div class="row">
                <div class="col-md-1 "></div>
                <div class="col-md-6 ">
                   <div class="detail_box">
                    <h1 class="text-white">
                      Website Jurnal Scraping
                    </h1>
                    <p>
                     Temukan Informasi Selengkapnya
                    </p>
                    <div class="btn-box">
                        <a href="{{ route('login') }}" class="btn-1">
                            Login
                          </a>
                          <a href="{{ route('pencarian') }}" class="btn-2">
                            Info Jurnal
                          </a>
                      </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="img-box">
                    <img src="home/images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-container">
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>



  <section class="about_section" id="tentang">
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
            <ul class="list-star">
                <li class="mb-2">
                Website Jurnal Scraping memberikan informasi tentang jadwal publikasi dari berbagai jurnal yang terakreditasi SINTA

                </li>
                 <li class="mb-2">
                    Keseluruhan data didapatkan dari website resmi jurnal terkait
                </li>
                <li class="mb-2">
                    Beberapa jurnal mungkin tidak memiliki data tersebut, sehingga jadwal publikasi bernilai null
                </li>
               </ul>

            <a href="">
              Temukan di Website Sinta
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->


  <!-- service section -->
  <section class="service_section layout_padding">
    <div class="container-fluid">
      <div class="heading_container">
        <h2 class="text-white">
        Tingkatan Dalam Jurnal Sinta
        </h2>
        <p>
            Pembagian kategori berdasarkan dari peringkat akreditasi sebuah jurnal. Akreditasi sebuah jurnal diatur dalam peraturan Kemenristek Republik Indonesia Nomor 9 Tahun 2018 mengenai Akreditasi Jurnal Ilmiah
        </p>
      </div>

      <div class="service_container">
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('images/sinta/s1.png') }}" alt="" height="60px">
          </div>
          <div class="detail-box">
            <h5 class="text-white">
                Sinta 1
            </h5>
            <p>
                Jurnal Dengan Penilaian rentang 85 ≤ hingga 100
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('images/sinta/s2.png') }}" alt="" height="60px">
          </div>
          <div class="detail-box">
            <h5 class="text-white">
                Sinta 2
            </h5>
            <p>
                Jurnal Dengan Penilaian rentang 70 ≤ hingga 85
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('images/sinta/s3.png') }}" alt="" height="60px">
          </div>
          <div class="detail-box">
            <h5 class="text-white">
                Sinta 3
            </h5>
            <p>
                Jurnal Dengan Penilaian rentang 60 ≤ hingga 70
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('images/sinta/s4.png') }}" alt="" height="60px">
          </div>
          <div class="detail-box">
            <h5 class="text-white">
                Sinta 4
            </h5>
            <p>
                Jurnal Dengan Penilaian rentang 50 ≤ hingga 60
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <img src="{{ asset('images/sinta/s5.jpg') }}" alt="" height="60px">
          </div>
          <div class="detail-box">
            <h5 class="text-white">
                Sinta 5
            </h5>
            <p>
                Jurnal Dengan Penilaian rentang 40 ≤ hingga 50
            </p>
          </div>
        </div>
        <div class="box">
            <div class="img-box">
                <img src="{{ asset('images/sinta/s6.png') }}" alt="https://journal.staidenpasar.ac.id/public/site/images/admin/s6.png">
            </div>
            <div class="detail-box">
              <h5 class="text-white">
                  Sinta 6
              </h5>
              <p>
                Jurnal Dengan Penilaian rentang 30 ≤ hingga 40
              </p>
            </div>
          </div>
      </div>
      {{-- <div class="btn-box">
        <a href="">
          Read More
        </a>
      </div> --}}
    </div>
  </section>
  <!-- end service section -->

  <!-- work section -->

  <section class="work_section layout_padding mt-3">
    <div class="container">
      <div class="heading_container mb-2">
        <h2>
          Manfaat
        </h2>
        <p>

        </p>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="detail_container">
            <div class="box b-1">
              {{-- <div class="top-box">
                <div class="icon-box">
                  <img src="home/images/work-i1.png" alt="">
                </div>
                <h5>
                  We Generate A Good Idea First
                </h5>
              </div> --}}
              <div class="bottom-box">
                <p>
                    Kemudahan bagi para peneliti atau penulis artikel ilmiah
                    dalam mendapatkan informasi mengenai jadwal publikasi jurnal terindeks
                    SINTA
                </p>
              </div>
            </div>
            <div class="box b-1">
              {{-- <div class="top-box">
                <div class="icon-box">
                  <img src="home/images/work-i2.png" alt="">
                </div>
                <h5>
                  Then We Start Applying Ideas
                </h5>
              </div> --}}
              <div class="bottom-box">
                <p>
                    Membantu para peneliti atau penulis artikel ilmiah agar tidak kehilangan
                    banyak waktu dalam mencari jurnal yang tepat untuk publikasi
                </p>
              </div>
            </div>
            <div class="box b-1">
                {{-- <div class="top-box">
                  <div class="icon-box">
                    <img src="home/images/work-i2.png" alt="">
                  </div>
                  <h5>
                    Then We Start Applying Ideas
                  </h5>
                </div> --}}
                <div class="bottom-box">
                  <p>
                    Menambah pengetahuan dalam membangun sistem web scraping bagi
                    penulis dan bagi pihak yang berkepentingan
                  </p>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="home/images/work-img.png" alt="">
          </div>
        </div>
      </div>

      {{-- <div class="btn-box">
        <a href="">
          Read More
        </a>
      </div> --}}
    </div>

  </section>
  <!-- end work section -->

  <!-- team section -->


  <!-- end team section -->

  <!-- client section -->


  <!-- end client section -->
  <footer class="navbar navbar-expand-lg custom_nav-container " style="background-color: #081c5c">
    <a class="navbar-brand text-end" href="" style="width: 100%">
        <h6 class="text-right text-white"><strong>Website Jurnal Scraping 2023</strong></h6>
    </a>
</footer>


</body>

</html>
@endsection
