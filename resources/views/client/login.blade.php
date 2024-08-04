@extends('client.layouts.master')

@section('title')
    Đăng Nhập - NewsX
@endsection

@section('content')
    {{-- <!DOCTYPE html>
    <!-- Coding by CodingLab | www.codinglabweb.com-->
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> @yield('title') </title> --}}

    <!-- CSS -->
    <link rel="stylesheet" href="Login-Signup-Form/css/style1.css">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    {{-- </head> --}}

    <body>
        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header class="header">Đăng Nhập</header>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('client.login') }}" method="POST">
                        @csrf

                        <div class="field input-field">
                            <input type="email" name="email" placeholder="Email" class="input"
                                value="{{ old('email') }}">
                        </div>

                        <div class="field input-field">
                            <input type="password" name="password" placeholder="Mật Khẩu" class="password">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="form-link">
                            <a href="#" class="forgot-pass">Quên mật khẩu?</a>
                        </div>

                        <div class="field button-field">
                            <button type="submit">Đăng Nhập</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Chưa có tài khoản? <a href="{{ route('client.register') }}" class="link signup-link">Đăng ký
                                ngay</a></span>
                    </div>
                </div>

                <div class="line"></div>

                <div class="media-options">
                    <a href="#" class="field facebook">
                        <i class='bx bxl-facebook facebook-icon'></i>
                        <span>Đăng Nhập Với Facebook</span>
                    </a>
                </div>

                <div class="media-options">
                    <a href="#" class="field google">
                        <img src="Login-Signup-Form/images/google.png" alt="" class="google-img">
                        <span>Đăng Nhập Với Google</span>
                    </a>
                </div>
            </div>
        </section>

        <!-- JavaScript -->
        <script src="Login-Signup-Form/js/script1.js"></script>
    </body>

    {{-- </html> --}}
@endsection
