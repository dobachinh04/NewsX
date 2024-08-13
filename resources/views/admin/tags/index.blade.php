@extends('admin.layouts.master')

@section('title')
    Danh Sách Thẻ - NewsX
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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Thẻ</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Danh Mục Thẻ</a></li>
                        </ol>
                    </div>
                </div>

                @if (Session::has('success'))
                    <div class="alert alert-success solid alert-dismissible fade show">
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                    class="mdi mdi-close"></i></span>
                        </button>
                        <strong>Hoàn Tất!</strong> {{ Session::get('success') }}.
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Danh Mục Thẻ</h4>
                                <a href="{{ route('admin.tags.create') }}" class="btn btn-success">Thêm Mới</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên</th>
                                                <th>Tạo Ngày</th>
                                                <th>Lần Cuối Cập Nhật</th>
                                                <th>Hành Động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $tag)
                                                <tr>
                                                    <td>{{ $tag->id }}</td>
                                                    <td>{{ $tag->name }}</td>
                                                    <td>{{ $tag->created_at->format('d/m/Y H:i') }}</td>
                                                    <td>{{ $tag->updated_at->format('d/m/Y H:i') }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.tags.edit', ['id' => $tag->id]) }}"
                                                            class="btn btn-warning">Sửa</a>
                                                        <form
                                                            action="{{ route('admin.tags.destroy', ['id' => $tag->id]) }}"
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
