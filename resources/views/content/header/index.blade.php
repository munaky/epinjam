<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <img src="assets/img/logo.png" alt="">
            <span>E-Pinjam</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                @include('content.header.access.' . $access)
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
