@extends('layouts.app')

@section('konten')
<div class="card">
    <div class="card-header">Absen Datang</div>
    <div class="card-body">
        <form action="{{ route('user.absen.datang') }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="tanggal">Tanggal :</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                @error('tanggal')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Sudah Datang</button>
        </form>
    </div>
</div>
@endsection