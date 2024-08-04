@extends('admin.layouts.master')

@section('title')
    Chi Tiết Người Dùng - NewsX
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <span class="ml-1">Element</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Người Dùng</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Chi Tiết Người Dùng</a></li>
                    </ol>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card ">
                        <div class="card-body row">
                            <div class="col-md-6">
                                <h1>Chi Tiết Người Dùng ID: {{ $user->id }}</h1>
                                <h3>Tiêu Đề: {{ $user->title }}</h3>

                                @if ($user->image)
                                    <img src="{{ asset('storage/images/' . $user->image) }}"
                                        style="width: 100%; max-width: 250px;" alt="Image">
                                @endif

                                <div class="mt-3">
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Quay Lại</a>
                                    <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}"
                                        class="btn btn-warning">Sửa</a>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Họ và Tên</th>
                                            <td>{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Vai Trò</th>
                                            <td>{{ $user->role->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Ngày Tạo</th>
                                            <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Ngày Cập Nhật</th>
                                            <td>{{ $user->updated_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
