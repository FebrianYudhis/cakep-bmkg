@extends('layouts.app')

@section('konten')
<div class="card">
    <div class="card-header">Informasi</div>
    <div class="card-body">
        <div class="row mt-3">
            <div class="col-md-3 col-lg-3">
                <div class="statistic__item statistic__item--red">
                    <h2 class="number text-white">{{ $jumlahakun }} Data</h2>
                    <span class="desc text-white font-italic">Jumlah Akun</span>
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="statistic__item statistic__item--orange">
                    <h2 class="number text-white">{{ $jumlahabsen }} Data</h2>
                    <span class="desc text-white font-italic">Jumlah Data Absen</span>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="statistic__item statistic__item--blue">
                    <h2 class="number text-white">{{ $absendatang }} Kali</h2>
                    <span class="desc text-white font-italic">Belum Absen Datang</span>
                    <div class="icon">
                        <i class="fas fa-sign-in-alt"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">
                <div class="statistic__item statistic__item--green">
                    <h2 class="number text-white">{{ $absenpulang }} Kali</h2>
                    <span class="desc text-white font-italic">Belum Absen Pulang</span>
                    <div class="icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection