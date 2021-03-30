@extends('layouts.auth')

@section('konten')
<h3 class="text-center">Silahkan Masuk</h3>
<form class="mt-4" method="POST" action="{{ route('user.masuk') }}">
    @csrf
    <div class="row font-weight-bold">
        <div class="col-lg-12">
            <div class="form-group">
                <input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username"
                    value="{{ old('username') }}">
                @error('username')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Masukkan Password Anda"
                    name="password" value="{{ old('password') }}">
                @error('password')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    Ingat Saya
                </label>
            </div>
        </div>
        <div class="col-lg-12 text-center mt-4">
            <button type="submit" class="btn btn-block btn-dark">Masuk</button>
        </div>
        <div class="col-lg-12 text-center mt-5">
            Belum Punya Akun ? <a href="{{ route('user.daftar') }}" class="text-danger">Daftar</a>
        </div>
    </div>
</form>
@endsection