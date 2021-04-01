@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('vendor/datatables/datatables.min.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>
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
            ]
        });
    } );
</script>
@endpush

@section('konten')
<div class="card">
    <div class="card-header">List Akun</div>
    <div class="card-body">
        <table id="akun" class="table table-bordered">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Dibuat Pada</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <td>{{ $d->username }}</td>
                    <td>{{ $d->nama }}</td>
                    <td>{!! ($d->status == 1) ? 'Aktif' : 'Nonaktif'; !!}</td>
                    <td>{{ $d->created_at }}</td>
                    <td>
                        @if ($d->status == 0)
                        <a href="{{ route('admin.akun.aktifkan',$d) }}" class="btn btn-primary w-100">Aktifkan</a>
                        @elseif ($d->status == 1)
                        <a href="{{ route('admin.akun.matikan',$d) }}" class="btn btn-primary w-100">Matikan</a>
                        @endif
                        <a href="{{ route('admin.akun.hapus',$d) }}" class="btn btn-danger w-100 mt-2">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection