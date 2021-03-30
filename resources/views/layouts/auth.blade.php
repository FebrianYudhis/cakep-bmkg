<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Catatan Kehadiran Pegawai BMKG Kotim">
    <meta name="author" content="Febrian Yudhistira">

    <title>{{ $judul }} - {{ env('APP_NAME') }}</title>
    <link href="{{ asset('vendor/auth/css/style.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative shadow-lg px-4"
            style="background:url({{ asset('images/bg/auth-bg.jpg') }}) no-repeat center center;">
            <div class="auth-box row text-center">
                <div class="col-lg-5 col-md-3 modal-bg-img" style="background: rgb(190, 81, 81);">
                </div>
                <div class="col-lg-7 col-md-9 bg-white">
                    <div class="p-3">
                        <img src="../assets/images/big/icon.png" alt="wrapkit">
                        @yield('kontenheader')
                        @yield('konten')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(".preloader").fadeOut();
    </script>
</body>

</html>