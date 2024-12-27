<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>BANGSUKRI</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>

<body class="text-center">
    <main class="form-signin">
        <form action="{{ route('pengguna.authenticate') }}" method="POST">
            @csrf
            @method('POST')
            <img class="mb-0" src="{{ asset('images/bangsukri.jpg') }}" alt="" width="150" height="150">
            <h1 class="h3 mb-3 fw-normal">Bangsukri</h1>
            <p class="mb-3 fw-normal">Aplikasi Barang Masuk dan Inventori</p>
            <div class="form-floating mb-2">
                <input type="text" name="email" class="form-control" id="floatingInput"
                    placeholder="name@example.com" required>
                <label for="floatingInput">Alamat email</label>
            </div>
            <div class="form-floating mb-2">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password"
                    required>
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="login_button">Log in</button>
            <p class="mt-5 mb-3 text-muted">&copy; BANGSUKRI 2024</p>
        </form>
    </main>
</body>

</html>
