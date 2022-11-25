@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
@endpush

@push('scripts')
<script>
    $(document).ready(function () {
       $('#absen').DataTable({
            paging: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route('data.absen.pribadi') }}',
            columns: [
                { data: 'tanggal', name: 'tanggal' },
                { data: 'jam_masuk', name: 'jam_masuk' },
                { data: 'jam_keluar', name: 'jam_keluar' }
            ],
            order: [[ 0, 'desc' ]],
            "columnDefs": [
                { "searchable": false, "targets": [1,2] }
            ]
        });
     });
</script>
@endpush

@section('konten')
<div class="card">
    <div class="card-header">Informasi</div>
    <div class="card-body">
        <marquee>
            <p class="text-danger font-weight-bold font-italic">Mohon perhatikan kembali tanggal shift sebelum absen |
                Jika ada kendala dengan aplikasi, silahkan hubungi administrator</p>
        </marquee>
        <div class="row mt-3">
            <div class="col-md-6 col-lg-6">
                <a class="btn btn-warning w-100" href="{{ route('user.absen.datang') }}">Datang</a>
                <div class="statistic__item statistic__item--blue">
                    <h2 class="number text-white">{{ $absendatang }} Kali</h2>
                    <span class="desc text-white font-italic">Belum Absen Datang (Bulan Ini)</span>
                    <div class="icon">
                        <i class="fas fa-sign-in-alt"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6">
                <a class="btn btn-warning w-100" href="{{ route('user.absen.pulang') }}">Pulang</a>
                <div class="statistic__item statistic__item--green">
                    <h2 class="number text-white">{{ $absenpulang }} Kali</h2>
                    <span class="desc text-white font-italic">Belum Absen Pulang (Bulan Ini)</span>
                    <div class="icon">
                        <i class="fas fa-sign-out-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">Daftar Absen Anda</div>
    <div class="card-body table-responsive-sm">
        <table class="table table-bordered" id="absen">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection