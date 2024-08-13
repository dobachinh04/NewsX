<div class="quixnav">
    <div class="quixnav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Trang Admin</li>
            <li>
                <a class="" href="{{ route('admin.dashboard') }}" aria-expanded="false"><i
                        class="fa-solid fa-cube"></i><span class="nav-text">Bảng Điều Khiển</span></a>
            </li>

            <li class="nav-label">Biểu Đồ Quản Lý</li>
            <li>
                <a class="" href="{{ route('admin.chart') }}" aria-expanded="false"><i
                        class="fa-solid fa-chart-line"></i><span class="nav-text">Bảng Thống Kê</span></a>
            </li>

            <li class="nav-label">Quản Lý Website</li>
            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="fa-solid fa-icons"></i><span class="nav-text">Loại Tin</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.categories.index') }}">Danh Sách Loại Tin</a></li>
                    <li><a href="{{ route('admin.categories.create') }}">Thêm Loại Tin</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="fa-solid fa-newspaper"></i><span class="nav-text">Tin Tức</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.posts.index') }}">Danh Sách Tin Tức</a></li>
                    <li><a href="{{ route('admin.posts.create') }}">Thêm Tin Tức</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="fa-solid fa-tags"></i><span class="nav-text">Thẻ</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.tags.index') }}">Danh Sách Thẻ</a></li>
                    <li><a href="{{ route('admin.tags.create') }}">Thêm Thẻ</a></li>
                </ul>
            </li>

            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                        class="fa-solid fa-user-group"></i><span class="nav-text">Người Dùng</span></a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('admin.users.index') }}">Danh Sách Người Dùng</a></li>
                    <li><a href="{{ route('admin.users.create') }}">Thêm Người Dùng</a></li>
                </ul>
            </li>

            <li class="nav-label">Điều Hướng</li>
            <li>
                <a class="" href="{{ route('client.home') }}" aria-expanded="false"><i
                        class="fa-solid fa-door-open"></i><span class="nav-text">Quay Về Trang Chủ</span></a>
            </li>
        </ul>
    </div>
</div>
