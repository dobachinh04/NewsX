<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Trang Chủ</li>
            <li>
                <a class="" href="{{ route('admin.dashboard') }}" aria-expanded="false"><i
                        class="fa-solid fa-cube"></i><span class="nav-text">Bảng Điều Khiển</span></a>
            </li>

            <li class="nav-label">Biểu Đồ Quản Lý</li>
            <li>
                <a class="" href="{{ route('admin.dashboard') }}" aria-expanded="false"><i
                        class="fa-solid fa-cube"></i><span class="nav-text">Bảng Thống Kê</span></a>
            </li>

            <li class="nav-label">Quản Lý Website</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Loại Tin</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.categories.index') }}">Danh Sách Loại Tin</a></li>
                    <li><a href="{{ route('admin.categories.create') }}">Thêm Loại Tin</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-app-store"></i><span class="nav-text">Tin Tức</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.posts.index') }}">Danh Sách Tin Tức</a></li>
                    <li><a href="./app-calender.html">Thêm Tin Tức</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="icon icon-chart-bar-33"></i><span class="nav-text">Người Dùng</span></a>
                <ul aria-expanded="false">
                    <li><a href="./chart-flot.html">Danh Sách Người Dùng</a></li>
                    <li><a href="./chart-morris.html">Thêm Người Dùng</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
