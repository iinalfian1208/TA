<link rel="stylesheet" href="{{ asset('home/css/login.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
{{-- https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css
https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-120946860-10', { 'anonymize_ip': true });
  </script>
<div class="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <div class="card card border-0 ">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row">
                        <img src="{{ asset('images/sinta/sintalogo.png') }}" class="logo" style="border-radius: 10%;">
                    </div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
                        <img src="{{ asset('home/images/login.png') }}" class="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3"></div>
                    <div class="row px-3 mb-3">
                        <h1 class="h3 mb-4 text-center"><strong>Login</strong></h1>
                    </div>
                    <div class="m-sm-0">
                        @if ($message = Session::get('sukses'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <div class="alert-message">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @endif
                        @if ($message = Session::get('gagal'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <div class="alert-message">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                        <div class="row px-3">
                            <label class="mb-3"><h6 class="mb-0 text-sm">Email </h6></label>
                            <input class="mb-4" type="text" name="email" id="email" placeholder="Masukkan Email" required>
                        </div>
                        <div class="row px-3">
                            <label class="mb-3"><h6 class="mb-0 text-sm">Password</h6></label>
                            <input type="password" name="password" placeholder="Masukkan Password"  id="password" required>
                        </div>
                        <div class="row px-3 mb-3">
                            <a href="{{ route('password.request') }}" class="ml-auto mb-0 text-sm">Lupa Password?</a>
                        </div>
                        <div class="row mb-3 px-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="bg-blue py-4 mt-4">
            <div class="row px-3">
                <div class="social-contact ml-2 ml-sm-auto">
                    <small class="ml-4 ml-sm-5 mb-2 mr-5">Jurnal Scraping 2023</small>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
          setTimeout(function(){
            if(localStorage.getItem('popState') !== 'shown'){
              window.notyf.open({
                type: "success",
                message: "Get access to all 500+ components and 45+ pages with AdminKit PRO. <u><a class=\"text-white\" href=\"https://adminkit.io/pricing\" target=\"_blank\">More info</a></u> 🚀",
                duration: 10000,
                ripple: true,
                dismissible: false,
                position: {
                  x: "left",
                  y: "bottom"
                }
              });

              localStorage.setItem('popState','shown');
            }
          }, 15000);
        });
      </script>
</div>
