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
            ]
        });
    } );
</script>
@endpush

@push('scripts')
<script>
    $('.konfirmasi').on('click',function(e){
        let tulisan = $(this).text();
        console.log(tulisan);
        e.preventDefault();
        var form = $(this).parents('form');
        console.log(form);
        
        Swal.fire({
            icon: 'warning',
            title: tulisan,
            text: "Apakah anda yakin ?",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                form.submit();
            }
        });
    });
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
                        <form action="{{ route('admin.akun.resetmasuk',$d) }}" method="POST">
                            @csrf
                            @method('patch')
                            <button type="submit" class="btn btn-primary w-100 mb-2 konfirmasi">Reset Masuk</button>
                        </form>
                        @if ($d->status == 0)
                        <form action="{{ route('admin.akun.aktifkan',$d) }}" method="POST">
                            @csrf
                            @method('patch')
                            <button type="submit" class="btn btn-primary w-100 konfirmasi">Aktifkan</button>
                        </form>
                        @elseif ($d->status == 1)
                        <form action="{{ route('admin.akun.matikan',$d) }}" method="POST">
                            @csrf
                            @method('patch')
                            <button type="submit" class="btn btn-warning w-100 konfirmasi">Matikan</button>
                        </form>
                        @endif
                        <form action="{{ route('admin.akun.hapus',$d) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger w-100 mt-2 konfirmasi">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection