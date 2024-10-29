@extends('home.index')
@section('content')
    <div class="container p-3 mx-auto">
        <p class="font-normal font-semibold text-2xl">Keranjang</p>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
            <div>
                <div class="mt-3 w-full max-w-m p-4 bg-white border rounded-t-lg shadow dark:bg-gray-800">
                    <!-- Checkbox "Pilih Semua" -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" />
                            <span class="ml-2 text-sm">Pilih Semua</span>
                        </label>
                        <button type="button" class="text-red-600 hover:text-red-800">Hapus</button>
                    </div>
                </div>
                <div class="mt-1 w-full max-w-m p-4 bg-white border rounded-b-lg shadow dark:bg-gray-800">
                    <!-- Checkbox "Pilih Semua" -->
                    <div class="flex justify-between mb-3">
                        <label class="flex gap-3">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" />
                            <img src="https://flowbite.com/docs/images/examples/image-1@2x.jpg"
                                class="w-20 h-20 ml-2 rounded" alt="produk" />
                            <p>Toyota Raize</p>
                        </label>
                        <div>
                            <p>Rp 550.000</p>
                        </div>
                    </div>
                    <div class="flex justify-between mb-3">
                        <label class="flex gap-3">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" />
                            <img src="https://flowbite.com/docs/images/examples/image-1@2x.jpg"
                                class="w-20 h-20 ml-2 rounded" alt="produk" />
                            <p>Toyota Raize</p>
                        </label>
                        <div>
                            <p>Rp 550.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 w-full max-w-m p-4 bg-white border rounded-lg shadow dark:bg-gray-800">
                <div>
                    <p class="font-normal font-semibold text-2xl text-center">Ringkasan Penyewa</p>
                    <hr class="my-2" />
                    <div class="p-2">
                        <p class="font-medium text-lg">Periode Sewa:</p>
                        <p class="font-light text-md">[Isi Periode Sewa]</p>
                    </div>
                    <hr class="my-2" />
                    <div class="p-2">
                        <p class="font-medium text-lg">Jumlah Barang:</p>
                        <p class="font-light text-md">[Isi Jumlah Barang]</p>
                    </div>
                    <hr class="my-2" />
                    <div class="p-2">
                        <p class="font-medium text-lg">Alamat:</p>
                        <p class="font-light text-md">[Isi Alamat]</p>
                    </div>
                    <hr class="my-2" />
                    <div class="p-2">
                        <p class="font-medium text-lg">Extras Additional Driver (optional):</p>
                        <p class="font-light text-md">[Isi Extras Additional Driver]</p>
                    </div>
                    <hr class="my-2" />
                    <div class="p-2">
                        <p class="font-medium text-lg">Harga Sewa:</p>
                        <p class="font-light text-md">[Isi Harga Sewa]</p>
                    </div>
                    <hr class="my-2" />
                    <div>
                        <button class="w-full bg-green-500 py-1 px-2 rounded dark:bg-green-700 text-white">Sewa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
