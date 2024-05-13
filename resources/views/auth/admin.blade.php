<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>E-Pinjam</title>
    <meta content="" name="description" />

    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    {{-- Custom Style --}}
    <link rel="stylesheet" href="{{ asset('content/auth/admin.css') }}">

</head>
<section id="hero" class="hero d-flex align-items-center">
    <div class="container">
        <div class="position-relative">
            <div class="position-absolute top-50 start-50 translate-middle-x">
                <div class="card border-0 shadow rounded-3 my-5">
                    <form method="POST" action="{{ url('auth/login') }}">
                        @csrf
                        <div class="card">
                            <a class="login">Log in</a>
                            <div class="inputBox">
                                <input type="text" required="required" name="username" />
                                <span class="user">Username</span>
                            </div>

                            <div class="inputBox">
                                <input type="password" required="required" name="password" />
                                <span>Password</span>
                            </div>

                            <button class="enter">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>

</html>
