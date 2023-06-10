<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('home/css/login.css') }}">
    <link rel="shortcut icon" href="{{ asset('/images/sinta/21.png') }}" sizes="100x100" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link class="js-stylesheet" href="{{ url('backup/admin/css/light.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('home/css/load.css') }}">
    <style>
        .row2.card.border-0.px-4.py-5 {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    </style>
    	<link class="js-stylesheet" href="{{ url('backup/admin/css/light.css')}}" rel="stylesheet">
        <script src="js/settings.js"></script>
        <style>
            body {
                opacity: 0;
            }
        </style>
        <!-- END SETTINGS -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-120946860-10', { 'anonymize_ip': true });
    </script>
</head>

<body>
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <div class="main">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-lg-6 mt-5">
                    <div class="text-center">
                        <img src="{{ asset('images/sinta/21.png') }}" class="image">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="row2 px-3 mb-2 text-center mt-5">
                            <h4 class="text-center" style="text-align: center"><strong>Lupa Password</strong></h4>
                        </div>
                        {{-- <div class="row2 px-3 mb-3 text-center">
                            <h1 class="h3 mb-4 "><strong>Login</strong></h1>
                        </div> --}}
                        <div class="m-sm-0">
                            @error ('email')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <div class="alert-message">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                        @error ('password')
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <div class="alert-message">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                        {{-- @foreach ($data as $data) --}}
                            <form method="post" action="{{ route('password.update') }}">
                                {{ csrf_field() }}
                                <form method="post" action="{{ route('password.update') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email" id="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password Baru</label>
                                        <input class="form-control form-control-lg" type="password" name="password" required autocomplete="new-password" id="password" minlength="8">
                                        <span class="fst-italic">Password harus mengandung simbol, huruf besar dan huruf kecil</span>
                                    </div>
                                    <div class="mb-1">
                                        <label class="form-label">Konfirmasi Password</label>
                                        <input class="form-control form-control-lg" type="password" id="password-confirm"  name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="row mb-3 px-3 mt-4">
                                        <button type="submit" class="btn btn-lg btn-primary">Reset Password</button>
                                        <!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
                                    </div>
                                </form>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer mt-auto  text-end" style="background-color: #1a237e">
            <h5 class="ml-4 ml-sm-5 mb-2 mr-5 text-white"><strong>Website Jurnal Scraping 2023</strong></h5>
                {{-- <small class="ml-4 ml-sm-5 mb-2 mr-5 text-white mt-5 text-center">Website Jurnal Scraping 2023</small> --}}
        </footer>
    </div>
    {{-- <footer class="footer mt-auto py-3">
        <div class="container-fluid bg-blue py-4">
            <small class="ml-4 ml-sm-5 mb-2 mr-5">Jurnal Scraping 2023</small>
        </div>
    </footer> --}}
</body>
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
  <script>
    $('.loader-wrapper').fadeOut('slow', function() {
        $(this).remove();
    });
</script>








