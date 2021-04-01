@extends('layouts.partials.navbar')

@section('logo')
<a href="{{ route('admin.dashboard') }}">
    <img src="{{ asset('images/logo/logo.png') }}" style="width:12rem;" alt="Cakep" />
</a>
@endsection

@section('navigasidesktop')
<li class="{!! ($aktif == 'dashboard' ) ? 'active' : '' ; !!}">
    <a href="{{ route('admin.dashboard') }}">
        <i class="fas fa-tachometer-alt"></i>
        <span class="bot-line"></span>Dashboard</a>
</li>
<li class="{!! ($aktif == 'akun' ) ? 'active' : '' ; !!}">
    <a href="{{ route('admin.akun') }}">
        <i class="fas fa-user"></i>
        <span class="bot-line"></span>Akun</a>
</li>
<li class="{!! ($aktif == 'absen' ) ? 'active' : '' ; !!}">
    <a href="#">
        <i class="fas fa-address-book"></i>
        <span class="bot-line"></span>Absen</a>
</li>
@endsection

@section('navigasimobile')
<li>
    <a href="{{ route('admin.dashboard') }}">
        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
</li>
<li>
    <a href="{{ route('admin.akun') }}">
        <i class="fas fa-user"></i>Akun</a>
</li>
<li>
    <a href="#">
        <i class="fas fa-address-book"></i>Absen</a>
</li>
@endsection

@section('profile')
<div class="account-wrap">
    <div class="account-item account-item--style2 clearfix js-item-menu">
        <div class="image">
            <img src="{{ asset('images/icon/admin.png') }}" alt="Icon Admin" />
        </div>
        <div class="content">
            <a class="js-acc-btn" href="#">{{ $akun->username }}</a>
        </div>
        <div class="account-dropdown js-dropdown">
            <div class="info clearfix">
                <div class="image">
                    <a href="#">
                        <img src="{{ asset('images/icon/admin.png') }}" alt="Icon Admin" />
                    </a>
                </div>
                <div class="content">
                    <p class="name">
                        {{ $akun->nama }}
                    </p>
                </div>
            </div>
            <div class="account-dropdown__body">
                <div class="account-dropdown__item">
                    <a href="{{ route('admin.gantipassword') }}">
                        <i class="fas fa-key"></i>Ganti Password</a>
                </div>
            </div>
            <div class="account-dropdown__footer">
                <a class="dropdown-item" href="{{ route('keluar') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off"></i>Keluar
                </a>
                <form id="logout-form" action="{{ route('keluar') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection