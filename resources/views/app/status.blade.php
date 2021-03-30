<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Status Akun - {{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
</head>

<body class="bg-secondary">
    <div class="card mt-4 mx-auto w-50 shadow-lg">
        <div class="card-header">
            <h4 class="text-center">Status Akun Anda</h4>
        </div>
        <div class="card-body">
            <p>Halo <span class="font-italic font-weight-bold">{{ $nama }}</span> anda terdaftar disistem pada <span
                    class="font-italic font-weight-bold">{{ $tanggal }}</span>.</p>
            <p>Hingga saat ini akun anda masih belum diaktivasi,silahkan hubungi administrator untuk pengaktifan akun.
            </p>
        </div>
    </div>
</body>

</html>