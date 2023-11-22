@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('vendor/app/js/time.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sw2.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        $('.konfirmasi').on('click', function(e) {
            let tulisan = $(this).text();
            e.preventDefault();
            var form = $(this).parents('form');

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

        $(document).ready(function() {
            var jamServer = $('#jamServer').text();
            var jamClient = new Date(Date.parse(jamServer));

            setInterval(() => {
                jamClient.setSeconds(jamClient.getSeconds() + 1);
                displayTime(jamClient);
            }, 1000);

            function displayTime(date) {
                var localtime = new Date(date.getTime() + 7 * 60 * 60 * 1000);
                $('#jamServer').text(localtime.toISOString().slice(0, 19).replace("T", " "));
            }
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
                        value="{{ old('tanggal') ?? $tanggal }}">
                    @error('tanggal')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="tetapPresensi" name="tetapPresensi">
                    <label class="form-check-label" for="tetapPresensi">
                        Tetap Presensi
                    </label>
                </div>
                <p class="mb-4 text-danger font-italic">Anda Akan Absen Pada <span class="font-weight-bold"
                        id="jamServer">{{ $jam }}</span> Untuk Shift Tanggal <span id="tanggalshift"
                        class="font-weight-bold">{{ $tanggal }}</span></p>
                <button type="submit" class="btn btn-primary w-100 konfirmasi">Sudah Pulang</button>
            </form>
        </div>
    </div>
@endsection
