@extends('client.layouts.master')

@section('title')
    Quên Mật Khẩu - NewsX
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
                    <header class="header">Quên Mật Khẩu</header>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="field input-field">
                            <input type="email" name="email" required autofocus placeholder="Nhập email của bạn"
                                class="input">
                        </div>

                        <div class="field button-field">
                            <button type="submit">Gửi Liên Kết Đặt Lại Mật Khẩu</button>
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
