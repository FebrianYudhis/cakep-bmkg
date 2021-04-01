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
    <div class="card mt-4 mx-auto shadow-lg container w-75">
        <div class="card-header">
            <h4 class="text-center">Status Akun Anda</h4>
        </div>
        <div class="card-body">
            <p>Halo <span class="font-italic font-weight-bold">{{ $nama }}</span> anda terdaftar disistem pada <span
                    class="font-italic font-weight-bold">{{ $tanggal }}</span>.</p>
            <p>Hingga saat ini akun anda memiliki status <span class="font-italic font-weight-bold">{!! ($status == 1) ?
                    'Aktif' : 'Nonaktif' !!}</span>.
            </p>
            <p>Silahkan hubungi administrator untuk informasi lebih lanjut</p>
        </div>
    </div>
</body>

</html>