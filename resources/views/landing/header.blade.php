<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #000000">
    <div class="container-fluid">
        <a class="navbar-brand text-light" href="#">
            <img src="{{ asset('assets/img_media/logo.PNG ') }}" alt="Logo" width="30" height="24"
                class="d-inline-block align-text-top">
            <span class="fw-bold ms-3 text-light">E-LEARNING </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" aria-current="page" href="{{ route('landing') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('tutorial') }}">Tutorial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('masuk') }}">Masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
