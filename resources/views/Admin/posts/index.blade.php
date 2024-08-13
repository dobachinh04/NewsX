@extends('admin.layouts.master')

@section('title')
    Danh Sách Tin Tức - NewsX
@endsection

@section('content')
    <!-- Datatable -->
    <link href="/focus-2/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="/focus-2/css/style.css" rel="stylesheet">

    <body>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Chào Mừng Trở Lại user...</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Bài Viết</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Danh Sách Bài Viết</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

                @if (Session::has('success'))
                    <div class="alert alert-success solid alert-dismissible fade show">
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                    class="mdi mdi-close"></i></span>
                        </button>
                        <strong>Hoàn Tất!</strong> {{ Session::get('success') }}.
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Danh Sách Bài Viết</h4>
                                <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Thêm Mới</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th>Danh Mục</th>
                                                <th>Thẻ</th>
                                                <th>Ảnh</th>
                                                <th>Lượt Xem</th>
                                                <th>Tác Giả</th>
                                                <th>Tạo Ngày</th>
                                                <th>Lần Cuối Cập Nhật</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $post)
                                                <tr>
                                                    <td>{{ $post->id }}</td>
                                                    <td>{{ $post->title }}</td>

                                                    <td>{{ $post->category->name }}</td>

                                                    <td>
                                                        @foreach ($post->tags as $tag)
                                                            <span class="badge badge-pill badge-warning">{{ $tag->name }}</span>
                                                        @endforeach
                                                    </td>

                                                    <td>
                                                        <img src="{{ Storage::url($post->image) }}"
                                                            style="width: 100px; height: 75px; object-fit: cover;"
                                                            alt="">
                                                    </td>

                                                    <td>{{ $post->view }}</td>
                                                    <td>{{ $post->author->name }}</td>
                                                    <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                                                    <td>{{ $post->updated_at->format('d/m/Y H:i') }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.posts.show', $post) }}"
                                                            class="btn btn-primary">Chi Tiết</a>
                                                        <a href="{{ route('admin.posts.edit', $post) }}"
                                                            class="btn btn-warning">Sửa</a>
                                                        <form action="{{ route('admin.posts.destroy', $post) }}"
                                                            method="POST" style="display:inline;"
                                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th>Danh Mục</th>
                                                <th>Ảnh</th>
                                                <th>Lượt Xem</th>
                                                <th>Tạo Ngày</th>
                                                <th>Lần Cuối Cập Nhật</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Required vendors -->
        <script src="/focus-2/vendor/global/global.min.js"></script>
        <script src="/focus-2/js/quixnav-init.js"></script>
        <script src="/focus-2/js/custom.min.js"></script>

        <!-- Datatable -->
        <script src="/focus-2/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="/focus-2/js/plugins-init/datatables.init.js"></script>
    </body>
@endsection
