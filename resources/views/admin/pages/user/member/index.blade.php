@extends('index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            @if (session('success'))
                <div id="alert-border-3"
                    class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('success') }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-border-3" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif

            <div class="bg-white rounded-lg shadow p-6" id="user">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Data Member</h2>
                    <a class="px-2 py-1 bg-blue-500 dark:bg-blue-600 rounded hover:bg-blue-600 dark:hover:bg-blue-700 text-white dark:text-black"
                        href="{{ url('/admin/pengguna/member/create') }}"><i class="bi bi-person-add"></i></a>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6 mt-3">
                <form class="max-w-md mx-auto mb-2" method="GET">
                    <label for="search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="bi bi-search"></i>
                        </div>
                        <input type="search" id="search"
                            class="block w-full p-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search Users" name='search' value="" />
                        <button type="submit"
                            class="text-white absolute end-2 bottom-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"><i
                                class="bi bi-search"></i></button>
                    </div>
                </form>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Photo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jenis Kelamin
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Role
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($member as $data)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td scope="row" class="px-6 py-4">
                                        <img src="{{ asset($data->image) }}" class="w-10 h-10 rounded" alt="" />
                                    </td>
                                    <td scope="row" class="px-6 py-4">
                                        {{ $data->user->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($data->jenis_kelamin == 'pria')
                                            <span class="badge bg-primary me-1 mb-1 mt-1">{{ $data->jenis_kelamin }}</span>
                                        @elseif ($data->jenis_kelamin == 'wanita')
                                            <span class="badge bg-success me-1 mb-1 mt-1">{{ $data->jenis_kelamin }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->user->email }}
                                    </td>
                                    <td class="text-green-500 dark:text-green-600 px-6 py-4 fs-15 font-semibold">
                                        {{ $data->user->getAkses->name }}
                                    <td class="px-6 py-4">
                                        @if ($data->status == '1')
                                            <span class="badge bg-primary">Terverifikasi</span>
                                        @else
                                            <span class="badge bg-warning">Belum Terverifikasi</span>
                                        @endif
                                    </td>
                                    <th class="px-6 py-4 flex gap-2">
                                        <a href="{{ url('admin/pengguna/member/' . $data->id . '/edit') }}"
                                            class="font-medium p-2 rounded dark:text-gray-200 bg-yellow-400 dark:bg-yellow-600"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <a class="font-medium p-2 rounded cursor-pointer text-white dark:text-gray-700 bg-blue-500 dark:bg-blue-600"
                                            data-modal-toggle="popup-view{{ $data->id }}"
                                            data-modal-target="popup-view{{ $data->id }}"><i class="bi bi-eye"></i></a>
                                        <a data-modal-target="popup-hapus{{ $data->id }}"
                                            data-modal-toggle="popup-hapus{{ $data->id }}"
                                            class="deleteBtn font-medium cursor-pointer p-2 rounded text-white bg-red-500 dark:bg-red-600 delete-user"><i
                                                class="bi bi-trash"></i></a>
                                    </th>
                                </tr>
                                <div id="popup-hapus{{ $data->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0
                            left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="popup-hapus{{ $data->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <div class="p-4 md:p-5 text-center">
                                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                                <h2 class="mb-4 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                    Apakah anda yakin akan menghapus user ini?
                                                </h2>
                                                <form action="{{ url('admin/pengguna/member/' . $data->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-modal-hide="popup-modal" type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                                                        Yes, I'm sure
                                                    </button>
                                                    <button data-modal-hide="popup-hapus{{ $data->id }}"
                                                        type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                        No, cancel
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="popup-view{{ $data->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
                                    aria-labelledby="SubCategoryModal" aria-hidden="true">
                                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h5 class="text-xl font-semibold text-gray-900 dark:text-white">Member
                                                    Detail</h5>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="popup-view{{ $data->id }}" aria-label="Close">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Detail Modal -->
                                            <div class="p-4 md:p-5 space-y-4">
                                                <div class="relative overflow-y-auto">
                                                    <div class="grid grid-cols-2 gap-2">
                                                        <div>
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                                            <p>{{ $data->user->name }}</p>
                                                        </div>
                                                        <div>
                                                            <label
                                                                class="block mb2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                            <p>{{ $data->user->email }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-2 mt-2">
                                                        <div>
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                                Depan</label>
                                                            <p>{{ $data->nama_depan }}</p>
                                                        </div>
                                                        <div>
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                                Belakang</label>
                                                            <p>{{ $data->nama_belakang }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-2 mt-2">
                                                        <div>
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                                                Kelamin</label>
                                                            <p>{{ $data->jenis_kelamin }}</p>
                                                        </div>
                                                        <div>
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                                                Lahir</label>
                                                            <p>{{ $data->tanggal_lahir }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-2 mt-2">
                                                        <div>
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                                            <p>{{ $data->alamat_utama }}</p>
                                                        </div>
                                                        <div>
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                                                            <p>{{ $data->provinsi }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-2 mt-2">
                                                        <div>
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                                                            <p>{{ $data->kota }}</p>
                                                        </div>
                                                        <div>
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                                                            <p>{{ $data->kecamatan }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-2 mt-2">
                                                        <div>
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                                            <p>{{ $data->user->getAkses->name }}</p>
                                                        </div>
                                                        <div>
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                                            <p>{{ $data->status }}</p>
                                                        </div>
                                                    </div>
                                                    <form
                                                        action="{{ url('admin/pengguna/member/' . $data->id . '/verify') }}"
                                                        method="POST" class="mt-2">
                                                        @csrf
                                                        <div>
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Verifikasi
                                                                Mitra</label>
                                                            <div class="grid grid-cols-2 gap-2">
                                                                <div
                                                                    class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                                                    <input type="radio" value="1" name="status"
                                                                        id="status1"
                                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                        {{ $data->status == '1' ? 'checked' : '' }}>
                                                                    <label for="status1"
                                                                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Terverifikasi</label>
                                                                </div>
                                                                <div
                                                                    class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                                                    <input type="radio" value="0" name="status"
                                                                        id="status2"
                                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                                                        {{ $data->status == '0' ? 'checked' : '' }}>
                                                                    <label for="status2"
                                                                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Belum
                                                                        Terverifikasi</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-2" />
                                                        <div class="flex items-center mt-2">
                                                            <button type="submit"
                                                                class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">Save</button>
                                                            <button type="button"
                                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                                                data-modal-hide="popup-view{{ $data->id }}">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
