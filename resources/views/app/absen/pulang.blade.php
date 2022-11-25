@extends('layouts.app')

@push('scripts')
<script src="{{ asset('vendor/app/js/time.js') }}"></script>
<script src="{{ asset('vendor/sweetalert/sw2.min.js') }}"></script>
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
    <div class="card-header">Absen Pulang</div>
    <div class="card-body">
        <form action="{{ route('user.absen.pulang') }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="tanggal">Shift :</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal"
                    value="{{ old('tanggal') ?? $tanggal->tanggal }}">
                @error('tanggal')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <p class="mb-4 text-danger font-italic">Anda Akan Absen Pada <span class="font-weight-bold">{{ $jam
                    }}</span> Untuk Shift Tanggal <span id="tanggalshift" class="font-weight-bold">{{ $tanggal->tanggal
                    }}</span></p>
            <button type="submit" class="btn btn-primary w-100 konfirmasi">Sudah Pulang</button>
        </form>
    </div>
</div>
@endsection