<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jurnal Scraping</title>
    <link rel="stylesheet" href="{{ asset('home/css/login.css') }}">
    <link rel="shortcut icon" href="{{ asset('/images/sinta/21.png') }}" sizes="100x100" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link class="js-stylesheet" href="{{ url('backup/admin/css/light.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('home/css/load.css') }}">

    <script src="{{ asset('backup/js/settings.js') }}"></script>
    <script src="{{ asset('backup/js/app.js') }}"></script>
    <!-- END SETTINGS -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-120946860-10', {
            'anonymize_ip': true
        });
    </script>
    <style>
        body{
            overflow-y: hidden;
        }
    </style>
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
                        <div class="col-12 text-center mt-5">
                            <h4 class="text-center" style="text-align: center"><strong>LOGIN</strong></h4>
                        </div>
                        {{-- <div class="row2 px-3 mb-3 text-center">
                            <h1 class="h3 mb-4 "><strong>Login</strong></h1>
                        </div> --}}
                        <div class="col-12">
                            <div class="m-sm-0">
                                {{-- @if (session('status'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <div class="alert-message">
                                            <strong>{{ session('status') }}</strong>
                                        </div>
                                    </div>
                                @endif
                                @error('email')
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <div class="alert-message">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    </div>
                                @enderror --}}
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
    @include('sweetalert::alert')
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

</html>
