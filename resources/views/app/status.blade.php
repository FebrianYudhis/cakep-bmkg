@extends('layouts.app')

@section('konten')
<div class="card mt-4 mx-auto shadow-lg container w-75">
    <div class="card-header">
        <h4 class="text-center">Status Akun Anda</h4>
    </div>
    <div class="card-body">
        <p>Halo <span class="font-italic font-weight-bold">{{ $akun->nama }}</span> anda terdaftar disistem pada <span
                class="font-italic font-weight-bold">{{ $tanggal }}</span>.</p>
        <p>Hingga saat ini akun anda memiliki status <span class="font-italic font-weight-bold">{!! ($akun->status == 1)
                ?
                'Aktif' : 'Nonaktif' !!}</span>.
        </p>
        <p>Silahkan hubungi administrator untuk informasi lebih lanjut</p>
    </div>
</div>
@endsection