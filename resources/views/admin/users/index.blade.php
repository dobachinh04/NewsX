@extends('admin.layouts.master')

@section('title')
    Danh Sách Tin Tức - FlashNews
@endsection

@section('content')
    <!-- Datatable -->
    <link href="/focus-2/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="/focus-2/css/style.css" rel="stylesheet">

    <body>

        <!--**********************************
                                                            Content body start
                                                        ***********************************-->
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

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Danh Sách Bài Viết</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
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
                                        </thead>
                                        <tbody>
                                            @foreach ($posts as $post)
                                                <tr>
                                                    <td>{{ $post->id }}</td>
                                                    <td>{{ $post->title }}</td>
                                                    <td>{{ $post->image }}</td>
                                                    <td>{{ $post->category_id }}</td>
                                                    <td>{{ $post->view }}</td>
                                                    <td>{{ $post->created_at }}</td>
                                                    <td>{{ $post->updated_at }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary">Chi Tiết</a>
                                                        <a href="" class="btn btn-warning">Sửa</a>
                                                        <a href="" class="btn btn-danger">Xóa</a>
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
        <!--**********************************
                                                            Content body end
                                                        ***********************************-->

        <!--**********************************
                                                        Scripts
                                                    ***********************************-->
        <!-- Required vendors -->
        <script src="/focus-2/vendor/global/global.min.js"></script>
        <script src="/focus-2/js/quixnav-init.js"></script>
        <script src="/focus-2/js/custom.min.js"></script>

        <!-- Datatable -->
        <script src="/focus-2/vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="/focus-2/js/plugins-init/datatables.init.js"></script>
    </body>
@endsection
