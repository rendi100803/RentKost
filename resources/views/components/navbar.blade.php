    {{-- NAVBAR --}}
    <nav class="bg-white border-gray-200 dark:bg-gray-900 fixed-top shadow">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                {{-- <img src="" class="h-8" alt="Bharata.id Logo" /> --}}
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Rentkost</span>
            </a>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-2">
                @auth
                    {{-- <button type="button" class="text-2xl" id="cart-menu-button" aria-expanded="false"
                        data-dropdown-toggle="cart-dropdown" data-dropdown-placement="bottom">
                        <i class="bi bi-cart text-blue-500"></i>
                    </button> --}}
                    <button type="button"
                        class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                            <span
                                class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="/home/profil"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profil</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                @if (Auth::check() && Auth::user()->member && Auth::user()->member->status == 'verifikasi')
                                    <a href="{{ route('member') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Dashboard Member</a>
                                @endif
                            </li>
                            <li>
                                <a href="{{ route('home.registrasi') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Registration
                                    Mitra</a>
                            </li>
                            <li>
                                <a href="{{ route('reservasi.success') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">History
                                    Reservasi</a>
                            </li>
                            <li>
                                <a href="/logout"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                                    out</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Dropdown cart -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="cart-dropdown">
                        <!-- Dropdown cart content -->
                        <div class="px-4 py-3">
                            <div class="grid grid-cols-2 justify-between gap-1 ">
                                <div class="flex gap-1">
                                    <img src="" class="w-8 h-9 rounded border" alt="" />
                                    <p>Toyota Raize</p>
                                </div>
                                <div class="flex justify-end">
                                    <p class="text-blue-400 font-semibold">Rp 550.000</p>
                                </div>
                            </div>
                            <hr class="my-3" />
                            <div class="grid grid-cols-2">
                                <div>
                                    <small class="text-gray-500">123 Produk Lainnya</small>
                                </div>
                                <div>
                                    <a href="{{ route('cart') }}"
                                        class="w-full bg-blue-500 px-2 py-1 rounded hover:bg-blue-00 dark:bg-blue-300 text-white"
                                        href="">Tampilkan Keranjang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
                @guest <!-- Menampilkan tombol login jika pengguna belum login -->
                    <a href="{{ route('login.index') }}"
                        class="text-sm text-white dark:text-white px-4 py-2 rounded bg-blue-500 hover:bg-blue-300">Login</a>
                @endguest
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li class="md:flex w-full">
                        <form action="{{ route('kost') }}" method="GET" class="relative md:block w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search icon</span>
                            </div>
                            <input type="text" name="search" id="search-navbar" value="{{ request('search') }}"
                                class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Masukkan nama kost/lokasi/tag">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- END NAVBAR --}}
