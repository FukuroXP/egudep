<div class="page-header">
    <div class="header-wrapper row m-0">
        <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                        <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="/dash"><img class="img-fluid" src="{{ asset('images/logo/logo.png') }}" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
        </div>
        <div class="left-header col horizontal-wrapper ps-0">
            <ul class="horizontal-menu">
            </ul>
        </div>
        <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
                <li>
                    <span class="header-search"><i data-feather="search"></i></span></li>
                <li>
                    <div class="mode"><i class="fa fa-moon-o"></i></div>
                </li>
                <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                <li class="profile-nav onhover-dropdown p-0 me-0">
                    <div class="media profile-media"><img class="b-r-10" style="max-width: 37px" src="{{ asset('images/dashboard/profile.jpg') }}" alt="">
                        <div class="media-body"><span>{{ Auth::user()->name }}</span>
                            <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>

                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" {{ __('Logout') }}><i data-feather="log-out"> </i><span>Keluar</span></a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ul>
                </li>

            </ul>
        </div>
        <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
                <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                <div class="ProfileCard-details">
                    <div class="ProfileCard-realName"></div>
                </div>
            </div>
        </script>
        <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
    </div>
</div>
<div class="page-body-wrapper">
    <div class="sidebar-wrapper">
        <div>
            <div class="logo-wrapper"><a href="/home"><img class="img-fluid for-light" src="{{ asset('images/logo/logo.png') }}" alt=""><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" alt=""></a>
                <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="/home"><img class="img-fluid" src="{{ asset('images/logo/logo-icon.png') }}" alt=""></a></div>
            <nav class="sidebar-main">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="sidebar-menu">
                    <ul class="sidebar-links" id="simple-bar">
                        <li class="back-btn"><a href="/home"><img class="img-fluid" src="{{ asset('images/logo/logo-icon.png') }}" alt=""></a>
                            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="/home"><i data-feather="home"></i><span class="lan-3">Dashboard</span></a>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="book"></i><span class="">Kepramukaan</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="/showpost"><i data-feather="book"></i>Daftar Materi</a></li>
                                <li><a href="/addpost"><i data-feather="plus-square"></i>Tambah Materi</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="clock"></i><span class="">Angkatan</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="/tabel_periode"><i data-feather="clock"></i>Daftar Angkatan</a></li>
                                <li><a href="/tambah_periode"><i data-feather="plus-square"></i>Tambah Angkatan</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="users"></i><span class="">Anggota</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="/anggota"><i data-feather="users"></i>Daftar Anggota</a></li>
                                <li><a href="/tambah_anggota"><i data-feather="plus-square"></i>Tambah Anggota</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="credit-card"></i><span class="">Uang</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="/uang"><i data-feather="credit-card"></i>Tabel Keuangan</a></li>
                                <li><a href="/tambah_transaksi"><i data-feather="plus-square"></i>Tambah Transaksi</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="flag"></i><span class="">Kegiatan</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="/kegiatan"><i data-feather="flag"></i>Daftar Kegiatan</a></li>
                                <li><a href="/tambah_kegiatan"><i data-feather="plus-square"></i>Tambah Kegiatan</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list">
                            <a class="sidebar-link sidebar-title link-nav" href="/e-learning"><i data-feather="book-open"></i><span class="">E-learning</span></a>
                        </li>
                    </ul>
                </div>
                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
        </div>
    </div>
