@extends('home.index')
@section('content')
    <div class="max-w-screen-xl mx-auto p-3">
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end'
                });
            </script>
        @endif

        <div>
            <p class="text-xl font-medium">History Reservasi</p>

            <div class="relative overflow-x-auto sm:rounded-lg mt-3">
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400 bg-gray-200 dark:bg-gray-700">
                        <tr>
                            <td scope="col" class="px-6 py-3">No</td>
                            <td scope="col" class="px-6 py-3">Penyewa</td>
                            <td scope="col" class="px-6 py-3">Judul</td>
                            <td scope="col" class="px-6 py-3">Mulai Kost</td>
                            <td scope="col" class="px-6 py-3">Harga Kost</td>
                            <td scope="col" class="px-6 py-3">Alamat Kost</td>
                        </tr>
                    </thead>
                    @if ($reservasi->isEmpty())
                        <tbody>
                            <tr>
                                <td colspan="6" class="px-6 py-3 text-center text-gray-500">No Reservations</td>
                            </tr>
                        @else
                            @foreach ($reservasi as $item)
                                <tr>
                                    <td scope="col" class="px-6 py-3">{{ $loop->iteration }}</td>
                                    <td scope="col" class="px-6 py-3">{{ $item->user->name }}</td>
                                    <td scope="col" class="px-6 py-3">{{ $item->kost->judul }}</td>
                                    <td scope="col" class="px-6 py-3">{{ $item->start_date }}</td>
                                    <td scope="col" class="px-6 py-3">Rp
                                        {{ number_format($item->kost->harga, 0, ',', '.') }}</td>
                                    <td scope="col" class="px-6 py-3">{{ $item->kost->alamat_utama }}</td>
                                </tr>
                            @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
