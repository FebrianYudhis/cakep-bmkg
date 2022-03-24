@extends('layouts.app')

@section('konten')
<div class="card">
    <div class="card-header">
        Generate Formulir Absensi
    </div>
    <div class="card-body">
        <form action="{{ route('admin.formulir') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggalAwal">Tanggal Awal :</label>
                        <input type="date" class="form-control" id="tanggalAwal" name="tanggalAwal" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggalAkhir">Tanggal Akhir :</label>
                        <input type="date" class="form-control" id="tanggalAkhir" name="tanggalAkhir" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group w-100">
                        <label for="nama">Nama :</label>
                        <select class="form-control" id="nama" name="id">
                            @foreach ($user as $u)
                                <option value="{{ $u->id }}">{{ $u->nama }}</option>
                            @endforeach 
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary w-100">Buat</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection