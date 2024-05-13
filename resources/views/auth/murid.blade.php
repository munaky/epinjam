<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    {{-- Custom Style --}}
    <link rel="stylesheet" href="{{ asset('content/auth/murid.css') }}">

    <title>E-Pinjam</title>

</head>

<body>
    <div class="container">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="design-container">
                    <div class="design-wrapper">
                        <form class="form-card" method="POST" action="{{ url('auth/login') }}">
                            @csrf
                            <p class="form-card-title">Login Code</p>
                            <p class="form-card-title">E-Pinjam</p>
                            <p class="form-card-prompt">
                                Ketikkan 4 Digits Code yang Anda Terima dari Alat RFID
                            </p>
                            <div class="form-card-input-wrapper">
                                <input class="form-card-input" placeholder="____" maxlength="4" type="text"
                                    name="code" />
                                <div class="form-card-input-bg"></div>
                            </div>
                            <button type="submit" class="form-card-submit">submit</button>
                        </form>
                    </div>

                    <svg viewBox="0 0 186.5491027832 376.9284057617" xmlns:xlink="http://www.w3.org/1999/xlink"
                        height="376.9284057617" width="186.5491027832" xmlns="http://www.w3.org/2000/svg"
                        id="uuid-d8a0d861-3741-4013"></svg>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
