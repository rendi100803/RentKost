@extends('member.pages.index')
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="rounded-lg mt-14">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Dashboard</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <div class="bg-white rounded-lg shadow p-6 mt-2">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xl font-semibold">Kost</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold">{{ $hitungkost }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-6 mt-2">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xl font-semibold">Reservasi</p>
                        </div>
                        <div>
                            <p class="text-xl font-semibold">{{ $hitungreservasi }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
