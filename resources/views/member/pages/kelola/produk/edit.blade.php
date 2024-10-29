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

            @if (session('error'))
                <div id="alert-border-2"
                    class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        {{ session('error') }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-border-2" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            <div class="bg-white rounded-lg shadow-lg p-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white">Edit Kost</h2>
                    </div>
                    <div>
                        <a href="{{ route('member.produk') }}"
                            class="bg-gray-400 px-3 py-2 rounded-lg hover:bg-gray-500 text-white">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-lg p-6 mt-2">
                <form action="{{ route('member.produk.update', $kost->id) }}" method="POST"
                    class="space-y-4 md:space-y-6 needs-validation" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <div class="grid grid-cols-3 gap-1">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto 1</label>
                                <input type="file" name="foto1" id="foto1"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('foto1')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto 2</label>
                                <input type="file" name="foto2" id="foto2"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('foto2')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto 3</label>
                                <input type="file" name="foto3" id="foto3"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('foto3')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div>
                                <label for="judul"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                                <input type="text" name="judul" id="judul" value="{{ $kost->judul }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full px-1 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('judul')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <div>
                            <label for="harga"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                            <input type="text" name="harga" id="harga" value="{{ $kost->harga }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full px-1 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('harga')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="tag" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type
                                Kamar
                                Kost</label>
                            <select name="tag" id="tag"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full px-1 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag }}">{{ $tag }}</option>
                                @endforeach
                            </select>
                            @error('tag')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <div>
                            <label for="cerita_pemilik"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cerita
                                Pemilik</label>
                            <textarea name="cerita_pemilik" id="cerita_pemilik" rows="5"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full px-1 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('cerita_pemilik', $kost->cerita_pemilik) }}</textarea>
                            @error('cerita_pemilik')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <label for="ketentuan_pengajuan_sewa"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ketentuan Pengajuan
                                Sewa</label>
                            <textarea type="text" name="ketentuan_pengajuan_sewa" id="ketentuan_pengajuan_sewa" rows="5"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full px-1 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('cerita_pemilik', $kost->ketentuan_pengajuan_sewa) }}</textarea>
                            @error('ketentuan_pengajuan_sewa')
                                <small class="text-red-500">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="alamat_utama"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea type="text" name="alamat_utama" id="alamat_utama" rows="5"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full px-1 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('cerita_pemilik', $kost->alamat_utama) }}</textarea>
                        @error('alamat_utama')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Lainnya</h2>
                        @for ($i = 0; $i < 3; $i++)
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 mb-3">
                                <div>
                                    <label for="facilities[{{ $i }}][facility]"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasilitas</label>
                                    <textarea name="facilities[{{ $i }}][facility]" id="facilities[{{ $i }}][facility]"
                                        rows="5"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full px-1 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('facilities.' . $i . '.facility', optional($kost->facilities[$i] ?? null)->facility) }}</textarea>
                                    @error('facilities.{{ $i }}.facility')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div>
                                    <label for="facilities[{{ $i }}][type]"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                    <select name="facilities[{{ $i }}][type]"
                                        id="facilities[{{ $i }}][type]"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full px-1 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">Select Type</option>
                                        <option value="Fasilitas Umum"
                                            {{ old('facilities.' . $i . '.type', optional($kost->facilities[$i] ?? null)->type) == 'Fasilitas Umum' ? 'selected' : '' }}>
                                            Fasilitas Umum</option>
                                        <option value="Fasilitas Parkir"
                                            {{ old('facilities.' . $i . '.type', optional($kost->facilities[$i] ?? null)->type) == 'Fasilitas Parkir' ? 'selected' : '' }}>
                                            Fasilitas Parkir</option>
                                        <option value="Fasilitas Kamar Mandi"
                                            {{ old('facilities.' . $i . '.type', optional($kost->facilities[$i] ?? null)->type) == 'Fasilitas Kamar Mandi' ? 'selected' : '' }}>
                                            Fasilitas Kamar Mandi</option>
                                    </select>
                                    @error('facilities.' . $i . '.type')
                                        <small class="text-red-500">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        @endfor
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                            <div>
                                <label for="rules[0][rule]"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peraturan</label>
                                <textarea name="rules[0][rule]" id="rules[0][rule]" rows="5"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full px-1 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('rules.0.rule', optional($kost->rules[0] ?? null)->rule) }}</textarea>
                                @error('rules.0.rule')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                            <div>
                                <label for="rules[0][type]"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                                <input type="text" name="rules[0][type]" id="rules[0][type]"
                                    value="{{ old('rules.0.type', optional($kost->rules[0] ?? null)->type) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 w-full px-1 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('rules.0.type')
                                    <small class="text-red-500">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit"
                        class="cursor-pointer bg-green-500 dark:bg-green-600 text-gray-200 dark:text-gray-700 px-2 py-1 rounded">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
