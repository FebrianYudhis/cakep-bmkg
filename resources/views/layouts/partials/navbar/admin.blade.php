@extends('layouts.partials.navbar')

@section('logo')
<a href="{{ route('admin.dashboard') }}">
    <img src="{{ asset('images/logo/logo.png') }}" style="width:12rem;" alt="Cakep" />
</a>
@endsection

@section('navigasi')
<li class="#">
    <a href="{{ route('admin.dashboard') }}">
        <i class="fas fa-tachometer-alt"></i>
        <span class="bot-line"></span>Dashboard</a>
</li>
<li>
    <a href="#">
        <i class="fas fa-user"></i>
        <span class="bot-line"></span>Akun</a>
</li>
<li>
    <a href="#">
        <i class="fas fa-address-book"></i>
        <span class="bot-line"></span>Absen</a>
</li>
@endsection

@section('profile')
<div class="account-wrap">
    <div class="account-item account-item--style2 clearfix js-item-menu">
        <div class="image">
            <img src="{{ asset('images/icon/admin.png') }}" alt="Icon Admin" />
        </div>
        <div class="content">
            <a class="js-acc-btn" href="#">Nama Disini</a>
        </div>
        <div class="account-dropdown js-dropdown">
            <div class="info clearfix">
                <div class="image">
                    <a href="#">
                        <img src="{{ asset('images/icon/admin.png') }}" alt="Icon Admin" />
                    </a>
                </div>
                <div class="content">
                    <h5 class="name">
                        <a href="#">Nama Disini</a>
                    </h5>
                </div>
            </div>
            <div class="account-dropdown__body">
                <div class="account-dropdown__item">
                    <a href="#">
                        <i class="fas fa-key"></i>Ganti Password</a>
                </div>
            </div>
            <div class="account-dropdown__footer">
                <a href="#">
                    <i class="fas fa-power-off"></i>Keluar</a>
            </div>
        </div>
    </div>
</div>
@endsection