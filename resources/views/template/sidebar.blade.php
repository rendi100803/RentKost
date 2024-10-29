<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{ url('/assets') }}/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ url('/assets') }}/images/brand/logo-1.png" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ url('/assets') }}/images/brand/logo-2.png" class="header-brand-img light-logo"
                    alt="logo">
                <img src="{{ url('/assets') }}/images/brand/logo-3.png" class="header-brand-img light-logo1"
                    alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                @if (Auth::user()->role_id == 1)
                    <a class="side-menu__item {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"
                        data-bs-toggle="slide" href="{{ url('/admin/dashboard') }}">
                    @elseif(Auth::user()->role_id == 2)
                        <a class="side-menu__item {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="{{ url('/member/dashboard') }}">
                @endif
                <i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Dashboard</span></a>
                @can('admin')
                    <li class="sub-category">
                        <h3>Pengguna</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Request::segment(3) == 'member' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">Pengguna</span><i
                                class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu"
                            style="{{ Request::segment(3) == 'member' ? 'display: block;' : 'display: none;' }}">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Member</a></li>
                            <li><a href="{{ url('/admin/pengguna/member') }}"
                                    class="slide-item {{ Request::segment(3) == 'member' ? 'active' : '' }}">Member</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-category">
                        <h3>Master Data</h3>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item {{ Request::segment(3) == 'produk' || Request::segment(3) == 'kategori' ? 'active' : '' }}"
                            data-bs-toggle="slide" href="javascript:void(0);">
                            <i class="side-menu__icon fa fa-database"></i><span class="side-menu__label">Master
                                Data</span><i class="angle fa fa-angle-right"></i>
                        </a>
                        <ul class="slide-menu"
                            style="{{ Request::segment(3) == 'produk' || Request::segment(3) == 'kategori' ? 'display: block;' : 'display: none;' }}">
                            <li class="side-menu-label1"><a href="javascript:void(0)">Kelola Data</a></li>
                            <li><a href="{{ url('/admin/kelola/produk') }}"
                                    class="slide-item {{ Request::segment(3) == 'produk' ? 'active' : '' }}"> Kelola
                                    Produk</a>
                            </li>
                            <li><a href="{{ url('/admin/kelola/kategori') }}"
                                    class="slide-item {{ Request::segment(3) == 'kategori' ? 'active' : '' }}"> Kelola
                                    Kategori</a>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg></div>
        </div>
    </aside>
</div>
