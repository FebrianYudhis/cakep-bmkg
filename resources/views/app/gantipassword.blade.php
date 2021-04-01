@extends('layouts.app')

@section('konten')
<div class="card mx-auto">
    <div class="card-header">Ganti Password</div>
    <div class="card-body">
        <form action="{{ route('user.gantipassword') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="password_lama">Password Lama :</label>
                <input type="password" class="form-control" id="password_lama" placeholder="Masukkan Password Lama"
                    name="password_lama">
                @error('password_lama')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_baru">Password Baru :</label>
                <input type="password" class="form-control" id="password_baru" placeholder="Masukkan Password Baru"
                    name="password_baru">
                @error('password_baru')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_baru_confirmation">Konfirmasi Password Baru :</label>
                <input type="password" class="form-control" id="password_baru_confirmation"
                    placeholder="Masukkan Kembali Password Baru" name="password_baru_confirmation">
                @error('password_baru_confirmation')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Ganti</button>
        </form>
    </div>
</div>
@endsection