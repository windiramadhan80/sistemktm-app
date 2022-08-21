<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand text-uppercase fw-bold" href="#"><img src="/img/logo-cwe.png" alt=""
                width="40" class="d-inline-block align-text-top me-1"> KTM</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-5 text-uppercase">
                <li class="nav-item me">
                    <a class="nav-link {{ $title === 'Kartu Tanda Mahasiswa' ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item me">
                    <a class="nav-link {{ $title === 'KTM | Tutorial' ? 'active' : '' }}" href="/tutorial">Tutorial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'KTM | Pendaftaran' ? 'active' : '' }}"
                        href="/pendaftaran">Pendaftaran</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ $title === 'Dashboard' ? 'active' : '' }} text-uppercase" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ request()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                            <li><a class="dropdown-item" href="/profile/{{ request()->user()->id }}">My Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="btn btn-light m-0" href="/login"><i class="fa-solid fa-right-to-bracket"></i>
                            Login/Register</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
