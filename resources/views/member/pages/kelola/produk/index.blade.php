@extends('member.pages.index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            @if (session('success'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: '{{ session('success') }}',
                        timer: 3000, // Durasi alert (3 detik)
                        showConfirmButton: false, // Menghilangkan tombol
                        toast: true, // Mode toast
                        position: 'top-end' // Posisi toast di kanan atas
                    });
                </script>
            @endif
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Data Kost</h2>
                    <a href="{{ route('member.produk.create') }}"
                        class="px-2 py-1 bg-blue-500 dark:bg-blue-600 rounded hover:bg-blue-600 dark:hover:bg-blue-700 text-white dark:text-black">
                        <span>
                            <i class="bi bi-box-seam"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-lg sm:rounded-lg mt-2">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="basic-datatable">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Judul</th>
                            <th scope="col" class="px-6 py-3">Tag</th>
                            <th scope="col" class="px-6 py-3">Cerita Pemilik</th>
                            <th scope="col" class="px-6 py-3">Alamat</th>
                            <th scope="col" class="px-6 py-3">Harga</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kosts as $kost)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </td>
                                <td scope="col" class="px-6 py-4">{{ Str::limit($kost->judul, 50) }}</td>
                                <td scope="col" class="px-6 py-4">{{ $kost->tag }}</td>
                                <td scope="col" class="px-1 py-4">{{ Str::limit($kost->cerita_pemilik, 50) }}</td>
                                <td scope="col" class="px-6 py-4">{{ Str::limit($kost->alamat_utama, 50) }}</td>
                                <td scope="col" class="px-6 py-4">{{ $kost->harga }}</td>
                                <td scope="col" class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('member.produk.edit', $kost->id) }}"
                                            class="cursor-pointer font-medium px-2 py-1 rounded text-white dark:text-gray-200 bg-yellow-400 dark:bg-yellow-600"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <button
                                            class="cursor-pointer font-medium px-2 py-1 rounded text-white dark:text-gray-200 bg-purple-500 dark:bg-purple-600"><i
                                                class="bi bi-eye"></i></button>
                                        <form action="{{ route('member.produk.destroy', $kost->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="font-medium cursor-pointer px-2 py-1 rounded text-white bg-red-500 dark:bg-red-600 delete-user deleteBtn"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
