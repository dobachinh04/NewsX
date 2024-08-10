<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="/NewsX-Logo-Header/icon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="/newsbox-master/style1.css">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="newsbox-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container-fluid">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="newsboxNav">

                        <!-- Nav brand -->
                        <a href="{{ route('client.home') }}" class="nav-brand"><img
                                src="/NewsX-Logo-Header/profile2.png" alt="NewsX Logo"></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="{{ route('client.home') }}">Trang Chủ</a>
                                        {{-- <div class="megamenu">
                                            <ul class="single-mega cn-col-4">
                                                <li class="title">Europe</li>
                                                <li><a href="#">United Kingdom</a></li>
                                                <li><a href="#">Germany</a></li>
                                                <li><a href="#">Latvia</a></li>
                                                <li><a href="#">Poland</a></li>
                                                <li><a href="#">Italy</a></li>
                                                <li><a href="#">France</a></li>
                                                <li><a href="#">Crotia</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li class="title">Africa</li>
                                                <li><a href="#">Algeria</a></li>
                                                <li><a href="#">Angola</a></li>
                                                <li><a href="#">Benin</a></li>
                                                <li><a href="#">Botswana</a></li>
                                                <li><a href="#">Burkina Faso</a></li>
                                                <li><a href="#">Burundi</a></li>
                                                <li><a href="#">Cameroon</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li class="title">Asia</li>
                                                <li><a href="#">Bangladesh</a></li>
                                                <li><a href="#">Chaina</a></li>
                                                <li><a href="#">India</a></li>
                                                <li><a href="#">Afganistan</a></li>
                                                <li><a href="#">Sri Lanka</a></li>
                                                <li><a href="#">Nepal</a></li>
                                                <li><a href="#">Bhutan</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li class="title">USA &amp; Canada</li>
                                                <li><a href="#">California</a></li>
                                                <li><a href="#">Florida</a></li>
                                                <li><a href="#">Alabama</a></li>
                                                <li><a href="#">New Yorks</a></li>
                                                <li><a href="#">Texas</a></li>
                                                <li><a href="#">Lowa</a></li>
                                                <li><a href="#">Montana</a></li>
                                            </ul>
                                        </div> --}}
                                    </li>
                                    {{-- <li><a href="#">Tin Mới Nhất</a></li> --}}
                                    <li><a href="#">Danh Mục</a>
                                        <ul class="dropdown p-0">
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a href="{{ route('client.category', ['id' => $category->id]) }}">
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="#">Giới Thiệu</a>
                                        {{-- <ul class="dropdown">
                                            <li><a href="#">Archery</a></li>
                                            <li><a href="#">Badminton</a></li>
                                            <li><a href="#">Baseball</a></li>
                                            <li><a href="#">Boxing</a></li>
                                            <li><a href="#">Climbing</a></li>
                                            <li><a href="#">Cricket</a></li>
                                            <li><a href="#">Football</a></li>
                                        </ul> --}}
                                    </li>

                                    <li><a href="#">Liên Hệ</a></li>

                                    @if (session('user'))
                                        <li>
                                            <span class="user-name">Chào
                                                <strong>{{ session('user')->name }}!</strong></span>
                                        </li>

                                        @if (session('user')->role_id == 1)
                                            <!-- Hiển thị tùy chọn admin -->
                                            <li>
                                                <a href="{{ route('admin.dashboard') }}"><i
                                                        class="fa-solid fa-gear"></i></a>
                                            </li>
                                        @endif

                                        <!-- Hiển thị icon đăng xuất khi đã đăng nhập -->
                                        <li>
                                            <form action="{{ route('client.logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-link"><i
                                                        class="fa-solid fa-door-open"></i></button>
                                            </form>
                                        </li>
                                    @else
                                        <!-- Hiển thị icon đăng nhập khi chưa đăng nhập -->
                                        <li>
                                            <a href="{{ route('client.login') }}"><i class="fa-regular fa-user"></i></a>
                                        </li>
                                    @endif


                                    {{-- <li><input type="text" class="form-control" style="height: 22px"
                                            placeholder="Tìm Kiếm..."></li> --}}
                                </ul>

                                <!-- Header Add Area -->
                                <div class="header-add-area">
                                    <a href="#">
                                        <img src="/newsbox-master/img/bg-img/add.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->
