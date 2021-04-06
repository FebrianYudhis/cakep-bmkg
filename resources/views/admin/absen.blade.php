@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('vendor/sweetalert/sw2.min.js') }}"></script>
@endpush

@push('scripts')
<script>
    $(document).ready(function() {
        $('#akun').DataTable({
            dom: 'lBfrtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }   
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }   
                },
                'colvis'
            ],
            order: [[ 1, 'desc' ]],
            "columnDefs": [
                { "searchable": false, "targets": [2,3] }
            ]
        });
    } );
</script>
@endpush

@section('konten')
<div class="card">
    <div class="card-header">List Akun</div>
    <div class="card-body">
        <table id="akun" class="table table-bordered table-responsive-sm">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <td>{{ $d->user->username }}</td>
                    <td>{{ $d->tanggal }}</td>
                    <td>{{ ($d->jam_masuk == null) ? 'Belum Absen' : $d->jam_masuk }}</td>
                    <td>{{ ($d->jam_keluar == null) ? 'Belum Absen' : $d->jam_keluar }}</td>
                    <td>
                        <a href="{{ route('admin.absen.edit',$d) }}" class="w-100 btn btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection