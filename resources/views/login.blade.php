<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | SMAN 2 Kota Tegal</title>
    <link rel="stylesheet" href="{{ asset('css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/auth.css') }}">
    {{-- <link rel="shortcut icon" href="{{ asset('images/logo/favicon.svg') }}" type="image/x-icon"> --}}
    <link rel="shortcut icon" href="{{ asset('images/smada.png') }}" type="image/png">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    {{-- <div class="auth-logo">
                        <a href="index.html"><img src="{{ asset('images/logo/logo.svg') }}" alt="Logo"></a>
                    </div> --}}
                    <h1 class="auth-title">Masuk</h1>
                    <p class="auth-subtitle mb-5"></p>

                    <form action="{{ route('login') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Username"
                                name="username" autofocus required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="password" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        {{-- <label for="">username: admin, password: admin</label> --}}
                        {{-- <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Keep me logged in
                            </label>
                        </div> --}}
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Masuk</button>
                    </form>
                    {{-- <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Don't have an account? <a href="auth-register.html"
                                class="font-bold">Sign
                                up</a>.</p>
                        <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-7 d-lg-block d-none">
                <?php use App\Models\User;
                     $cover =  User::where('id', 'admin')->first()->cover;
                ?>
                <div id="auth-right" style="background-image: url({{ asset('images/'.$cover) }}); background-size: cover;">

                </div>
            </div>
        </div>

    </div>
</body>

</html>
