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
        <div class="card mb-4">
            <div class="card-header">Filter</div>
            <div class="card-body">
                <form action="{{ route('admin.absen') }}" method="GET">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="mulai">Mulai :</label>
                            <input type="date" class="form-control" id="mulai" name="mulai">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="sampai">Sampai :</label>
                            <input type="date" class="form-control" id="sampai" name="sampai">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="nama">Nama :</label>
                            <select id="nama" class="form-control" name="nama">
                                <option disabled selected>--Pilih--</option>
                                @foreach ($nama as $n)
                                <option value="{{ $n->id }}">{{ $n->username }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Filter</label>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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