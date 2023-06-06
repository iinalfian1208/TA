<link rel="stylesheet" href="{{ asset('home/css/login.css') }}">
<link rel="shortcut icon" href="{{ asset('/images/sinta/21.png') }}" sizes="100x100" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<style>
    .row2.card.border-0.px-4.py-5 {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
</style>
{{-- <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<link rel="canonical" href="https://demo.adminkit.io/pages-sign-up.html" />

	<title>Reset Password</title>

	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet"> --}}

	<!-- Choose your prefered color scheme -->
	<!-- <link href="css/light.css" rel="stylesheet"> -->
	<!-- <link href="css/dark.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- Remove this after purchasing -->
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
</script></head>
<!--
  HOW TO USE:
  data-theme: default (default), dark, light, colored
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-layout: default (default), compact
-->

<div class="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <div class="card card border-0 ">
        <div class="row d-flex">
            <div class="col-lg-6 mt-5">
                <div class="card1">

                    <div class="row px-5 justify-content-center mt-5 border-line">
                        <img src="{{ asset('images/sinta/21.png') }}" class="image">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="ro mb-4 px-3"></div>
                    <div class="row2 px-3 mb-2 text-center">
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
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Reset Password</button>
                                    <!-- <button type="submit" class="btn btn-lg btn-primary">Sign up</button> -->
                                </div>
                            </form>
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

{{--
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<main class="d-flex w-100 h-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="card">
							<div class="card-body">
                                <h1 class="h3 mb-4 text-center"><strong>Reset Password</strong></h1>
								<div class="m-sm-4">
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
											<div class="text-center mt-3">
												<button type="submit" class="btn btn-lg btn-primary">Reset Password</button>

											</div>
										</form>}}
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

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
</script></body>

</html> --}}
