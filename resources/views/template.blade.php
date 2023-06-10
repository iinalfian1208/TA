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
    <link rel="shortcut icon" href="{{ asset('/images/sinta/21.png') }}" sizes="500x500" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/home/css/bootstrap.css') }}" />
    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('/home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('/home/css/responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('home/css/load.css') }}">
</head>

<body>
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <div class="hero_area">
        @yield('home')
        <div>
            @yield('tentang')
            @yield('pencarian')
        </div>


<script type="text/javascript" src="{{ url('/home/js/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript" src="{{ url('/home/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ url('/home/js/custom.js') }}"></script>
<script>
    $('.loader-wrapper').fadeOut('slow', function() {
        $(this).remove();
    });
</script>

</body>
</html>
