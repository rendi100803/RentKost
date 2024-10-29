<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                @can('admin')
                    <a href="{{ url('admin/dashboard') }}" class="flex ms-2 md:me-24">
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Rentkost</span>
                    </a>
                @endcan
                @can('member')
                    <a href="{{ route('member') }}" class="flex ms-2 md:me-24">
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Rentkost</span>
                    </a>
                @endcan
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img src="{{ asset('storage/photo-user/' . auth()->user()->image) }}" alt="foto user"
                                class="w-8 h-8 rounded-full" />
                        </button>
                    </div>
                    <div class="max-w-full z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown-user">
                        <ul class="py-1" role="none">
                            @can('admin')
                                <li>
                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer"
                                        role="menuitem" href="/admin/dashboard/profil">Account</a>
                                </li>
                            @endcan
                            @can('member')
                                <li>
                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer"
                                        role="menuitem" href="">Account</a>
                                </li>
                            @endcan
                            <li>
                                <a href="/logout" method='POST'
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                    role="menuitem">Log out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

@can('admin')
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a class="flex items-center p-2 text-gray-900 rounded-lg hover:text-white dark:text-white hover:bg-blue-500 dark:hover:bg-blue-700 group {{ Request::is('admin/dashboard') ? 'bg-blue-500 text-white' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <span class="ms-3"><i class="bi bi-house-door"></i> Dashboard</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-500 dark:text-white dark:hover:bg-blue-700 hover:text-white {{ Request::is('admin/pengguna/*') ? 'bg-blue-500 text-white' : '' }}"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <span class="flex-1 ms-3 text-left rtl:text-right"><i class="bi bi-people"></i> Kelola
                            Pengguna</span>
                        <i class="bi bi-caret-down"></i>
                    </button>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                            <a href="{{ url('/admin/pengguna/member') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Request::is('admin/pengguna/member') ? 'bg-gray-100 dark:bg-gray-700' : '' }}"><span><i
                                        class="bi bi-person"></i> Data Member</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
@endcan

@can('member')
    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a style="cursor:pointer;"
                        class="flex items-center p-2 text-gray-900 rounded-lg hover:text-white dark:text-white hover:bg-blue-500 dark:hover:bg-blue-700 group {{ Request::is('dashboard') ? 'bg-blue-500 text-white' : '' }}"
                        href="{{ route('member') }}">
                        <span class="ms-3"><i class="bi bi-house-door"></i> Dashboard</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-500 dark:text-white dark:hover:bg-blue-700 hover:text-white {{ Request::is('mitra/*') ? 'bg-blue-500 text-white' : '' }}"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <span class="flex-1 ms-3 text-left rtl:text-right"><i class="bi bi-people"></i> Mitra</span>
                        <i class="bi bi-caret-down"></i>
                    </button>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                            <a href="{{ route('info') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Request::is('mitra/info') ? 'bg-gray-200 dark:bg-gray-700' : '' }}"><span><i
                                        class="bi bi-info-circle"></i> Informasi Toko</span></a>
                        </li>
                        <li>
                            <a href="{{ route('transaksi') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Request::is('mitra/reservasi') ? 'bg-gray-200 dark:bg-gray-700' : '' }}"><span><i
                                        class="bi bi-wallet2"></i> Reservasi</span></a>
                        </li>
                        <li>
                            <a href="{{ route('statistik') }}"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 {{ Request::is('mitra/statistik') ? 'bg-gray-200 dark:bg-gray-700' : '' }}"><span><i
                                        class="bi bi-graph-up-arrow"></i> Statistik Penjualan</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('member.produk') }}"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-500 dark:text-white dark:hover:bg-blue-700 hover:text-white {{ Request::is('kelola-kost') ? 'bg-blue-500 text-white' : '' }}">
                        <span class="flex-1 ms-3 text-left rtl:text-right"><i class="bi bi-database"></i> Kelola
                            Kost</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
@endcan

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggles = document.querySelectorAll('[data-collapse-toggle]');

        dropdownToggles.forEach(toggle => {
            const target = document.getElementById(toggle.getAttribute('aria-controls'));

            toggle.addEventListener('click', () => {
                if (target.classList.contains('hidden')) {
                    target.classList.remove('hidden');
                } else {
                    target.classList.add('hidden');
                }
            });
        });
    });
</script>
