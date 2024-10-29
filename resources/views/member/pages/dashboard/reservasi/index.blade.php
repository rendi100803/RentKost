@extends('index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            <div class="bg-white rounded-lg shadow p-6" id="user">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Reservasi</h2>
                <div>
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="javascript:void(0);"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                Mitra
                            </a>
                        </li>
                        <span class="mx-2 text-gray-400">/</span>
                        <li>
                            <div class="flex items-center">
                                <a href="javascript:void(0);"
                                    class="text-sm font-medium text-gray-500 dark:text-gray-400">Reservasi</a>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow p-6 mt-2">
                <div class="relative overflow-x-auto">
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
                <div class="mt-2">
                    {{ $reservasi->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('.deleteBtn').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var deleteForm = $('#deleteForm' + id);
            Swal.fire({
                title: 'Anda yakin?',
                text: "Data akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteForm.submit();
                }
            });
        });
    </script>
@endsection
