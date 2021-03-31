<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $judul }} - {{ env('APP_NAME') }}</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/app/css/animsition.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/app/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/app/css/hamburgers.min.css') }}">
    @stack('styles')

    <link href="{{ asset('vendor/app/css/theme.css') }}" rel="stylesheet">
</head>

<body class="animsition">
    @include('layouts.partials.navbar.admin')

    <div class="konten mt-4">
        <div class="container-fluid">
            @yield('konten')
            <div class="shadow-lg py-2 text-center mt-4 wow bounceInUp">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">Template from <a href="https://colorlib.com">Colorlib</a>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">App created by <a
                            href="https://github.com/febrianyudhis">Febrian
                            Yudhis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/fontawesome/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('vendor/app/js/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/app/js/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/app/js/custom.js') }}"></script>
    @stack('scripts')

    <script src="{{ asset('vendor/app/js/main.js') }}"></script>

</body>

</html>