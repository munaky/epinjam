<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    {{-- Scanner Script --}}
    <script src="{{ asset('content/scanner/html5-qrcode.min.js') }}" defer></script> {{-- Modified Script --}}

    {{-- Custom Script --}}
    <link rel="stylesheet" href="{{ asset('general/style.css') }}"> {{-- Global Style --}}
    <link rel="stylesheet" href="{{ asset('content/scanner/style.css') }}"> {{-- Scanner Style --}}
    <link href="{{ asset('content/loading/style.css') }}" rel="stylesheet"> {{-- Loading Style --}}
    <script src="{{ asset('classjs/Cookie.js') }}" defer></script> {{-- Cookie Class --}}
    <script src="{{ asset('general/fetch.js') }}" defer></script> {{-- Fetch Function --}}
    <script src="{{ asset('general/global.js') }}" defer></script> {{-- Global Function --}}
    <script src="{{ asset('general/var.js') }}" defer></script> {{-- Custom JavaScript Variable --}}
    <script src="{{ asset('content/scanner/activator.js') }}" defer></script> {{-- Scanner Activator --}}
    <script src="{{ asset('content/scanner/function.js') }}" defer></script> {{-- Scanner Function --}}
    <script src="{{ asset('content/header/function.js') }}" defer></script> {{-- Header Function --}}
    <script src="{{ asset('content/header/activator.js') }}" defer></script> {{-- Header Activator --}}
    <script src="{{ asset('content/home/function.js') }}" defer></script> {{-- Home Function --}}
    <script src="{{ asset('content/home/activator.js') }}" defer></script> {{-- Home Activator --}}
    <script src="{{ asset('content/data/function.js') }}" defer></script> {{-- Data Function --}}
    <script src="{{ asset('content/data/activator.js') }}" defer></script> {{-- Data Activator --}}
    <script src="{{ asset('content/history/function.js') }}" defer></script> {{-- History Function --}}
    <script src="{{ asset('content/history/activator.js') }}" defer></script> {{-- History Activator --}}
    <script src="{{ asset('content/cart/function.js') }}" defer></script> {{-- Cart Function --}}
    <script src="{{ asset('content/cart/activator.js') }}" defer></script> {{-- Cart Activator --}}
    <script src="{{ asset('content/details/function.js') }}" defer></script> {{-- Details Function --}}
    <script src="{{ asset('content/details/activator.js') }}" defer></script> {{-- Details Activator --}}
    <script src="{{ asset('content/add/function.js') }}" defer></script> {{-- Add Function --}}
    <script src="{{ asset('content/add/activator.js') }}" defer></script> {{-- Add Activator --}}
    <script src="{{ asset('content/loading/function.js') }}" defer></script> {{-- Loading Function --}}
    <script src="{{ asset('general/config_var.js') }}" defer></script> {{-- Listed Link Source --}}
    <script src="{{ asset('general/onload.js') }}" defer></script> {{-- Onload Function --}}
    {{-- @include('script.public') --}}
    @include('script.' . $access)

    {{-- Dynamic CSS Style --}}
    <link rel="stylesheet" id="dynamic-css">

    <title>E-Pinjam</title>

</head>

<body>
    @include('components.alert.index', ['users' => session('users')['name']])

    <!-- ======= Header ======= -->
    @include('content.header.index', ['access' => $access])
    <!-- End Header -->

    <!-- ======= Content ======= -->
    <div id="epinjam-content" style="min-height: 100vh"></div>
    <!-- End Content -->

    <!-- ======= Footer ======= -->
    @include('content.footer.index')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
