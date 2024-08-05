@extends('client.layouts.master')

@section('title')
    Đặt Lại Mật Khẩu - NewsX
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
    {{-- <link rel="stylesheet" href="Login-Signup-Form/css/style3.css"> --}}
    <link rel="stylesheet" href="{{ asset('Login-Signup-Form/css/style3.css') }}">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    {{-- </head> --}}

    <body>
        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header class="header">Đặt Lại Mật Khẩu</header>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="field input-field" style="display: none;">
                            <input class="input" type="hidden" name="token" value="{{ $token }}">
                        </div>

                        <div class="field input-field">
                            <input type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                        </div>

                        <div class="field input-field">
                            <input type="password" name="password" required placeholder="Mật khẩu mới">
                        </div>

                        <div class="field input-field">
                            <input type="password" name="password_confirmation" required
                                placeholder="Nhập lại mật khẩu mới">
                        </div>
                        <div class="field button-field">
                            <button type="submit">Đặt Lại Mật Khẩu</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Chưa có tài khoản? <a href="{{ route('client.register') }}" class="link signup-link">Đăng ký
                                ngay</a></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- JavaScript -->
        <script src="Login-Signup-Form/js/script1.js"></script>
    </body>

    {{-- </html> --}}
@endsection
