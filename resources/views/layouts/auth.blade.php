<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Catatan Kehadiran Pegawai BMKG Kotim">
    <meta name="author" content="Febrian Yudhistira">

    <title>{{ $judul }} - {{ env('APP_NAME') }}</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/app/css/theme.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/app/css/animsition.min.css') }}">

</head>

<body class="bg-secondary animsition">
    @include('sweetalert::alert')
    <div class="container">
        <div class="login-wrap">
            <div class="login-content">
                <div class="login-logo">
                    <a href="#">
                        <img src="{{ asset('images/logo/logo.png') }}" alt="Cakep Logo">
                    </a>
                </div>
                <div class="login-form">
                    @yield('konten')
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('vendor/app/js/animsition.min.js') }}"></script>

    <script src="{{ asset('vendor/app/js/main.js') }}"></script>

</body>

</html>