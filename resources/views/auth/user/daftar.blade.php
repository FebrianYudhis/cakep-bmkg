@extends('layouts.auth')

@section('kontenheader')
<h2 class="mt-3 text-center">Silahkan Daftar</h2>
@endsection

@section('konten')
<form class="mt-4" method="POST" action="{{ route('user.daftar') }}">
    @csrf
    <div class="row font-weight-bold">
        <div class="col-lg-12">
            <div class="form-group">
                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Anda" name="nama"
                    value="{{ old('nama') }}" required>
                @error('nama')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username"
                    value="{{ old('username') }}" required>
                @error('username')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Masukkan Password Anda"
                    name="password" value="{{ old('password') }}" required>
                @error('password')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input type="password" class="form-control" id="password_confirmation"
                    placeholder="Konfirmasi Password Anda" name="password_confirmation"
                    value="{{ old('password_confirmation') }}" required>
                @error('password_confirmation')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <button type="submit" class="btn btn-block btn-dark">Daftar</button>
        </div>
        <div class="col-lg-12 text-center mt-5">
            Sudah Punya Akun ? <a href="{{ route('user.masuk') }}" class="text-danger">Masuk</a>
        </div>
    </div>
</form>
@endsection