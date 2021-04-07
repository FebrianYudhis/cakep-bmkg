@extends('layouts.app')

@push('scripts')
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

@push('scripts')
<script>
    $('.reset').on('click',function(e){
        $(this).siblings('input').val('');
    });
</script>
@endpush

@section('konten')
<div class="card">
    <div class="card-header">Edit Absen</div>
    <div class="card-body">
        <form action="{{ route('admin.absen.edit',$data) }}" method="POST">
            @csrf
            @method('put')
            <div class="form-group">
                <label>Username :</label>
                <p class="form-control">{{ $data->user->username }}</p>
            </div>
            <div class="form-group">
                <label>Tanggal :</label>
                <p class="form-control">{{ $data->tanggal }}</p>
            </div>
            <div class="form-group">
                <label for="jam_masuk">Jam Masuk :</label>
                <input type="datetime-local" class="form-control" id="jam_masuk" name="jam_masuk"
                    value="{{ old('jam_masuk') ?? $data->jam_masuk }}">
                @error('jam_masuk')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
                <p class="btn btn-warning mt-2 reset">Reset Jam</p>
            </div>
            <div class="form-group">
                <label for="jam_keluar">Jam Keluar :</label>
                <input type="datetime-local" class="form-control" id="jam_keluar" name="jam_keluar"
                    value="{{ old('jam_keluar') ?? $data->jam_keluar }}">
                @error('jam_keluar')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
                <p class="btn btn-warning mt-2 reset">Reset Jam</p>
            </div>
            <button type="submit" class="btn btn-primary w-100 konfirmasi">Edit</button>
        </form>
    </div>
</div>
@endsection