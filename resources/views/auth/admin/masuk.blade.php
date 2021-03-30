@extends('layouts.auth')

@section('kontenheader')
<h2 class="mt-3 text-center">Masuk Sebagai Admin</h2>
@endsection

@section('konten')
<form class="mt-4" method="POST" action="{{ route('admin.masuk') }}">
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
    </div>
</form>
@endsection