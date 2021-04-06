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
            order: [[ 0, 'desc' ]]
        });
     });
</script>
@endpush

@section('konten')
<div class="card">
    <div class="card-header">Daftar Absen Anda</div>
    <div class="card-body">
        <table class="table table-bordered table-responsive-sm" id="absen">
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