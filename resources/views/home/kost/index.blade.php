@extends('home.index')
@section('content')
    <div class="max-w-screen-xl mx-auto p-3">
        <style>
            .image {
                width: 100%;
                height: 200px;
                object-fit: auto;
                transition: transform 0.3s ease;
            }
        </style>

        <div class="">
            <p class="text-center text-xl font-medium">Kamar Kost</p>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-4">
                @foreach ($kost as $data)
                    <a href="{{ url('room/' . $data->judul) }}" class="w-full max-w-m p-3">
                        <div class="flex justify-center w-full">
                            <img src="{{asset($data->foto1)}}"
                                class="object-cover image rounded-lg" alt="{{ $data->judul }}" />
                        </div>
                        <div class="mt-1">
                            <span
                                class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                {{ $data->tag }}
                            </span>
                        </div>
                        <div class="mt-1">
                            <p class="font-normal">{{ Str::limit($data->judul, 50) }}</p>
                            <p class="text-sm font-normal font-semibold">{{ $data->alamat_utama }}</p>
                            <p class="text-sm font-normal text-gray-600">{{ Str::limit($data->cerita_pemilik, 50) }}</p>
                            <div>
                                <span class="text-lg font-normal  font-semibold">Rp{{ $data->harga }}</span><span
                                    class="text-sm">/bulan</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $kost->links() }}
            </div>
        </div>
    </div>
@endsection
