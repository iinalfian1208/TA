<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Jurnal Scraping</title>




  <!-- slider stylesheet -->

  <link rel="shortcut icon" href="{{ asset('/images/sinta/21.png') }}" sizes="500x500"/>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{ asset('/home/css/bootstrap.css') }}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('/home/css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('/home/css/responsive.css') }}" rel="stylesheet" />
</head>

<div class="hero_area">

   @yield('home')
   <div>
    @yield('tentang')
    {{-- @yield('saran') --}}
    @yield('pencarian')
    <!-- end slider section -->
  </div>



    {{-- <div class="footer_bg">

        <!-- contact section -->
        <section class="contact_section layout_padding" id="contactLink">
          <div class="container">
            <div class="heading_container">
              <h2>
                Get In touch
              </h2>
            </div>
          </div>

        </section>


        <!-- end contact section -->

        <!-- info section -->
        <section class="info_section layout_padding2">
          <div class="container">
            <div class="row">
              <div class="col-md-3">
                <div class="info_logo">
                  <h3>
                    Seotech
                  </h3>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor indidunt ut labore et
                    dolore magna
                  </p>
                </div>
              </div>
              <div class="col-md-3">
                <div class="info_links">
                  <h4>
                    BASIC LINKS
                  </h4>
                  <ul class="  ">
                    <li class=" active">
                      <a class="" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="">
                      <a class="" href="about.html"> About</a>
                    </li>
                    <li class="">
                      <a class="" href="service.html"> Services </a>
                    </li>
                    <li class="">
                      <a class="" href="#contactLink">Contact Us</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3">
                <div class="info_contact">
                  <h4>
                    CONTACT DETAILS
                  </h4>
                  <a href="">
                    <div class="img-box">
                      <img src="home/image/telephone-white.png" width="12px" alt="">
                    </div>
                    <p>
                      +01 1234567890
                    </p>
                  </a>
                  <a href="">
                    <div class="img-box">
                      <img src="home/image/envelope-white.png" width="18px" alt="">
                    </div>
                    <p>
                      demo@gmail.com
                    </p>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <div class="info_form ">
                  <h4>
                    NEWSLETTER
                  </h4>
                  <form action="">
                    <input type="email" placeholder="Enter your email">
                    <button>
                      Subscribe
                    </button>
                  </form>
                  <div class="social_box">
                    <a href="">
                      <img src="home/image/info-fb.png" alt="">
                    </a>
                    <a href="">
                      <img src="home/image/info-twitter.png" alt="">
                    </a>
                    <a href="">
                      <img src="home/image/info-linkedin.png" alt="">
                    </a>
                    <a href="">
                      <img src="home/image/info-youtube.png" alt="">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- end info_section -->


        <!-- footer section -->
        <section class="container-fluid footer_section">
          <div class="container">
            <p>
              &copy; <span id="displayYear"></span> All Rights Reserved By
              <a href="https://html.design/">Free Html Templates</a>
            </p>
          </div>
        </section>
        <!-- footer section -->

      </div> --}}
      {{-- {{ url('/home/js/custom.js') }} --}}
      <script type="text/javascript" src="{{ url('/home/js/jquery-3.4.1.min.js') }}"></script>
      <script type="text/javascript" src="{{ url('/home/js/bootstrap.js') }}"></script>
      <script type="text/javascript" src="{{ url('/home/js/custom.js') }}"></script>
