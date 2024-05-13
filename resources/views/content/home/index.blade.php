{{-- Hero Section --}}
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">E - Pinjam</h1>
                <h1 data-aos="fade-up">peminjaman barang dengan menggunakan Scan QR Code</h1>
                <h5 data-aos="fade-up" data-aos-delay="400">E-Pinjam adalah platform web yang memudahkan siswa untuk
                    meminjam dan mengembalikan barang di sekolah dengan menggunakan Scan QR Code</h5>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <a id="menu-scanner" data-menu="scanner"
                            class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Scan Qr Code</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid" alt=""
                    style="width: max-content;">
            </div>
        </div>
    </div>
</section>
{{-- End Hero --}}

{{-- Portfolio Section --}}
<section class="portfolio">
    <div class="row" data-aos="fade-up" data-aos-delay="100">
        <header class="section-header">
            <h2>List Barang</h2>
            <p>Check Ketersediaan Barang di Lab</p>
        </header>
    </div>
    <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
                <li class="" data-category=" ">All</li>
                @foreach ($data as $x)
                    <li data-category="{{ $x->name }}">{{ $x->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="200"></div>
</section>
{{-- End Portfolio --}}
