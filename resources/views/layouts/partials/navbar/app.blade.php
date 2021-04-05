@extends('layouts.partials.navbar')

@section('logo')
<a href="{{ route('user.dashboard') }}">
    <img src="{{ asset('images/logo/logo.png') }}" style="width:12rem;" alt="Cakep" />
</a>
@endsection

@section('navigasidesktop')
<li class="{!! ($aktif == 'dashboard' ) ? 'active' : '' ; !!}">
    <a href="{{ route('user.dashboard') }}">
        <i class="fas fa-tachometer-alt"></i>
        <span class="bot-line"></span>Dashboard</a>
</li>
<li class="has-sub {!! ($aktif == 'absen') ? 'active' : ''; !!}">
    <a href="#">
        <i class="fas fa-book"></i>
        <span class="bot-line"></span>Absen</a>
    <ul class="header3-sub-list list-unstyled">
        <li>
            <a href="{{ route('user.absen.datang') }}">Datang</a>
        </li>
        <li>
            <a href="{{ route('user.absen.pulang') }}">Pulang</a>
        </li>
    </ul>
</li>
@endsection

@section('navigasimobile')
<li>
    <a href="{{ route('user.dashboard') }}">
        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
</li>
<li class="has-sub">
    <a class="js-arrow" href="#">
        <i class="fas fa-book"></i>Absen</a>
    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
        <li>
            <a href="{{ route('user.absen.datang') }}">Datang</a>
        </li>
        <li>
            <a href="{{ route('user.absen.pulang') }}">Pulang</a>
        </li>
    </ul>
</li>
@endsection

@section('profile')
<div class="account-wrap">
    <div class="account-item account-item--style2 clearfix js-item-menu">
        <div class="image">
            <img src="{{ asset('images/icon/user.png') }}" alt="Icon User" />
        </div>
        <div class="content">
            <a class="js-acc-btn" href="#">{{ $akun->username }}</a>
        </div>
        <div class="account-dropdown js-dropdown">
            <div class="info clearfix">
                <div class="image">
                    <a href="#">
                        <img src="{{ asset('images/icon/user.png') }}" alt="Icon User" />
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
                    <a href="{{ route('user.gantipassword') }}">
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