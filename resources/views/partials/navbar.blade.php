<nav class="navbar navbar-light bg-light navbar-top">
    <div class="container-fluid">
        <div class="col-md-10">
            <a class="navbar-brand" href="#">
                <img src="/img/logo-frpb.png" alt="" width="40" height="40"
                    class="d-inline-block align-text-top">
                <span class="text-wrap text-uppercase">Forum Relawan Penanggulangan Bencana Pamekasan</span>
            </a>
        </div>
        @auth
            <div class="col-md-2" style="20px">
                <div class="dropdown custom-dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #00ADB5">
                        <span style="font-size: 14px">Welcome back, {{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="/dashboard" style="font-size: 14px">My Dashboard</a></li>
                        <li>
                            <hr class="dropdown-devider">
                        </li>
                        <form action="/logout" method="post">
                           @csrf
                            <button type="submit" class="dropdown-item" href="#"
                                style="font-size: 14px">Logout</button>
                        </form>
                    </ul>
                </div>
            </div>
        @else
            <div class="col-md-1">
                <a href="/login" class="text-dark text-decoration-none" style="font-size: 14px"><span
                        style="color: #292B47">Login</span></a>
            </div>
        @endauth
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom" style="background-color: #222831"
    aria-label="Ninth navbar example">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL"
        aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07XL">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link nav-text {{ $active === '/' ? 'active' : '' }}" aria-current="page"
                    href="/">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-text {{ $active === 'disaster' ? 'active' : '' }}" href="/disaster">Data
                    Bencana</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-text {{ $active === 'posts' ? 'active' : '' }}" href="/posts">Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-text {{ $active === 'agenda' ? 'active' : '' }}" href="/agenda">Agenda</a>
            </li>
            <li class="nav-item dropdown" style="bottom: -5px">
                <a class="nav-link nav-text dropdown-toggle {{ $active === 'profile' ? 'active' : '' }}" href="/profile"
                    id="dropdown07XL" data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown07XL">
                    <li><a class="dropdown-item {{ $active === 'profile' ? 'active' : '' }}" href="/profile">Sejarah
                            FRPB</a></li>
                    <li><a class="dropdown-item {{ $active === 'profile' ? 'active' : '' }}" href="/profile">Visi &
                            Misi</a></li>
                    <li><a class="dropdown-item {{ $active === 'profile' ? 'active' : '' }}" href="/profile">Struktur
                            Organisasi</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-text {{ $active === 'galery' ? 'active' : '' }}" href="/galery">Galeri</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-text {{ $active === 'member' ? 'active' : '' }}" href="/member">Anggota</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-text {{ $active === 'contact' ? 'active' : '' }}" href="/contact">Kontak</a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-text {{ $active === 'categories' ? 'active' : '' }}"
                    href="/categories">Kategori</a>
            </li>
        </ul>
    </div>
    </div>
</nav>
