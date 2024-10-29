@extends('home.index')
@section('content')
    {{-- CONTENT --}}
    <div class="max-w-screen-xl mx-auto p-3">
        <style>
            .image {
                width: 100%;
                height: 200px;
                object-fit: auto;
                transition: transform 0.3s ease;
            }
        </style>
        <div class="space-y-2">
            {{-- INI 3 GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                {{-- FOTO PRODUK --}}
                <div>
                    <div class="flex justify-center w-full">
                        <img class="object-cover rounded-lg image" src="{{ asset($produk->foto1) }}"
                            alt="{{ $produk->judul }}" />
                    </div>
                    <div class="grid grid-cols-4 mt-2">
                        @if ($produk->foto2)
                            <img class="h-10 w-20 mx-auto rounded" src="{{ asset($produk->foto2) }}"
                                alt="{{ $produk->judul }}" data-modal-target="modal2" data-modal-toggle="modal2" />
                        @endif

                        <div id="modal2" tabindex="-1" aria-hidden="true"
                            class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50" x-show="open">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <div class="relative">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Foto Kost
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="modal2">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Image -->
                                        <div class="p-4 md:p-5 space-y-4">
                                            <div class="flex justify-center w-full">
                                                <img class="object-cover rounded-lg image" src="{{ asset($produk->foto2) }}"
                                                    alt="{{ $produk->judul }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($produk->foto3)
                            <img class="h-10 w-20 mx-auto rounded" src="{{ asset($produk->foto3) }}"
                                alt="{{ $produk->judul }}" data-modal-target="modal3" data-modal-toggle="modal3">
                        @endif

                        <div id="modal3" tabindex="-1" aria-hidden="true"
                            class="hidden fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50" x-show="open">
                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <div class="relative">
                                        <!-- Modal header -->
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Foto Kost
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="modal3">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Image -->
                                        <div class="p-4 md:p-5 space-y-4">
                                            <div class="flex justify-center w-full">
                                                <img class="object-cover rounded-lg image" src="{{ asset($produk->foto3) }}"
                                                    alt="{{ $produk->judul }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mt-4 mb-2" />
                    {{-- INI RATING --}}
                    <div class="">
                        <h3 class="text-2xl font-normal font-semibold mb-3">Ratings</h3>
                        <div class="flex items-center space-x-2">
                            <div class="flex items-center space-x-1">
                                <i class="bi bi-star-fill text-yellow-400"></i>
                                <i class="bi bi-star-fill text-yellow-400"></i>
                                <i class="bi bi-star-fill text-yellow-400"></i>
                                <i class="bi bi-star-fill text-yellow-400"></i>
                                <i class="bi bi-star text-yellow-400"></i>
                            </div>
                            <button class="btn btn-outline-primary text-gray-400">Produk</button>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="flex items-center space-x-1">
                                <i class="bi bi-star-fill text-yellow-400"></i>
                                <i class="bi bi-star-fill text-yellow-400"></i>
                                <i class="bi bi-star-fill text-yellow-400"></i>
                                <i class="bi bi-star-fill text-yellow-400"></i>
                                <i class="bi bi-star text-yellow-400"></i>
                            </div>
                            <button class="btn btn-outline-primary text-gray-400">Ketepatan Deskripsi</button>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="flex items-center space-x-1">
                                <i class="bi bi-star-fill text-yellow-400"></i>
                                <i class="bi bi-star-fill text-yellow-400"></i>
                                <i class="bi bi-star-fill text-yellow-400"></i>
                                <i class="bi bi-star-fill text-yellow-400"></i>
                                <i class="bi bi-star text-yellow-400"></i>
                            </div>
                            <button class="btn btn-outline-primary text-gray-400">Komunikasi Toko</button>
                        </div>
                    </div>
                    {{-- END RATING --}}
                </div>
                {{-- END FOTO PRODUK --}}
                {{-- INI DESKRIPSI --}}
                <div class="overflow-y-auto h-80" name='infopenting'>
                    <p class="font-normal text-2xl">{{ $produk->judul }}</p>

                    <div class="mt-1">
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                            {{ $produk->tag }}
                        </span>
                        <span
                            class="bg-gray-300 text-gray-600 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-900 dark:text-white">
                            {{ $produk->alamat_utama }}
                        </span>
                    </div>

                    <div class="flex items-center gap-0 mt-4 mb-4">
                        <span class="font-normal font-semibold text-2xl">Rp{{ $produk->harga }}</span>
                        <span class="text-small">/bulan</span>
                    </div>

                    <div class="mt-2">
                        <p class="font-semibold">Deskripsi</p>
                        <small class="font-normal">{!! nl2br(htmlentities($produk->cerita_pemilik)) !!}</small>
                    </div>

                    @foreach ($facilities as $facility)
                        <div class="mt-2">
                            <p class="font-semibold">{!! nl2br(htmlentities($facility->type)) !!}</p>
                            <small class="font-normal">{!! nl2br(htmlentities($facility->facility)) !!}</small>
                        </div>
                    @endforeach

                    @foreach ($rules as $rule)
                        <div class="mt-2">
                            <p class="font-semibold">{!! nl2br(htmlentities($rule->type)) !!}</p>
                            <small class="font-normal">{!! nl2br(htmlentities($rule->rule)) !!}</small>
                        </div>
                    @endforeach

                    <div class="mt-2">
                        <p class="font-semibold">Ketentuan Pengajuan Sewa</p>
                        <small class="font-normal">{!! nl2br(htmlentities($produk->ketentuan_pengajuan_sewa)) !!}</small>
                    </div>

                    <div
                        class="mt-3 max-w-sm p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="container grid grid-cols-2 items-center justify-between">
                            <div class="flex gap-2 items-center">
                                <img src="https://flowbite.com/docs/images/examples/image-1@2x.jpg"
                                    class="rounded-full w-10 h-10 border" alt="profil mitra" />
                                <div class="flex flex-col gap-0">
                                    <span class="font-normal font-semibold">{{ Auth::user()->member->nama_depan ?? '' }}</span>
                                    <small class="text-gray-400">Online 2 jam lalu</small>
                                </div>
                            </div>
                            {{-- <div class="flex justify-end">
                                <a href="" class="bg-blue-500 text-white px-3 py-1 rounded-md">Follow</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                {{-- END DESKRIPSI --}}
                {{-- INI CART --}}
                <div>
                    <div
                        class="max-w-s p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <form action="{{ route('reservasi.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="kost_id" value="{{ $produk->id }}">
                            <label for="start_date" class="block text-sm font-medium text-gray-700">Mulai Kost</label>
                            <div class="mb-4 flex gap-3 items-center">
                                <input type="date" id="start_date" name="start_date"
                                    class="mt-1 block w-full border-gray-300 p-1 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                            </div>
                            <hr class="mb-3" />
                            <div class="mb-4">
                                <p class="font-medium">Harga Kost: Rp{{ number_format($produk->harga, 0, ',', '.') }}
                                    <span class="text-sm">/bulan</span>
                                </p>
                            </div>
                            <div>
                                <button type="submit"
                                    class="w-full bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-600 focus:outline-none focus:bg-blue-600">
                                    Reservasi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- END CART --}}
            </div>
            {{-- END 3 GRID --}}
            {{-- ULASAN --}}
            <div>
                <div>
                    <h3 class="font-normal font-semibold text-2xl">Ulasan</h3>
                </div>
                <div
                    class="mt-3 max-w-xl p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    {{-- ULASAN USER --}}
                    {{-- Loop through reviews --}}
                    <div class="flex items-center gap-2">
                        <img src="https://flowbite.com/docs/images/carousel/carousel-3.svg" alt="FOTO ULASAN USER"
                            class="rounded-full w-10 h-10 border" />
                        <div class="flex flex-col gap-0">
                            <span class="font-normal font-semibold">Anwar Musyadad <span
                                    class="font-normal text-gray-400 text-xs">22-04-2024</span></span>
                            @foreach ($reviews as $review)
                                <small class="font-normal text-gray-400">{{ $review->review }}</small>
                            @endforeach
                        </div>
                    </div>
                    {{-- END ULASAN USER --}}
                    {{-- <hr class="my-2"> --}}
                    <hr class="my-3" />
                    {{-- ULASAN ADMIN(MITRA) --}}
                    <div class="flex items-center gap-2 ml-3">
                        <img src="https://flowbite.com/docs/images/carousel/carousel-3.svg" alt="FOTO ULASAN USER"
                            class="rounded-full w-10 h-10 border" />
                        <div class="flex flex-col gap-0">
                            <span class="font-normal font-semibold">{{ Auth::user()->member->nama_depan ?? '' }} <span
                                    class="font-normal font-semibold text-xs text-blue-500">Admin(Mitra
                                    Sewa)</span></span>
                            <small class="font-normal text-gray-400">Makasih sudah pakai jasa sewa rental kami
                                :)</small>
                        </div>
                    </div>
                    {{-- END ULASAN ADMIN(MITRA) --}}
                </div>
            </div>
            {{-- END ULASAN --}}
            <hr class="my-3" />
            {{-- PRODUK SERUPA --}}
            <div>
                <h3 class="font-normal font-semibold text-2xl">Produk Serupa</h3>
                <div class="mt-3 grid grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach ($allKost as $items)
                        <a href="{{ url('room/' . $items->judul) }}" class="w-full max-w-m p-3">
                            <div class="flex justify-center w-full">
                                <img src="{{ asset($items->foto1) }}" class="object-cover image rounded-lg"
                                    alt="{{ $items->judul }}" />
                            </div>
                            <div class="mt-1">
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                    {{ $items->tag }}
                                </span>
                            </div>
                            <div class="mt-1">
                                <p class="font-normal">{{ Str::limit($items->judul, 50) }}</p>
                                <p class="text-sm font-normal font-semibold">{{ $items->alamat_kost }}</p>
                                <p class="text-sm font-normal text-gray-600">{{ Str::limit($items->cerita_pemilik, 50) }}
                                </p>
                                <div>
                                    <span class="text-lg font-normal  font-semibold">Rp{{ $items->harga }}</span><span
                                        class="text-sm">/bulan</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            {{-- END PRODUK SERUPA --}}
        </div>
    </div>
    {{-- END CONTENT --}}
    <br />
    <br />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script>
        function increment() {
            var input = document.getElementById('quantity');
            input.value = parseInt(input.value) + 1;
        }

        function decrement() {
            var input = document.getElementById('quantity');
            input.value = parseInt(input.value) - 1;
            if (input.value < 1) {
                input.value = 1;
            }
        }
    </script>
@endsection
