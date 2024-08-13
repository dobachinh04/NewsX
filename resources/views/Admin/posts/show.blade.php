@extends('admin.layouts.master')

@section('title')
    Chi Tiết Tin - NewsX
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Tin Tức</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Chi Tiết Tin Tức</a></li>
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
                                <h1>Chi Tiết Bài Viết ID: {{ $post->id }}</h1>
                                <h3>Tiêu Đề: {{ $post->title }}</h3>

                                @if ($post->image)
                                    <img src="{{ Storage::url($post->image) }}" style="width: 100%; max-width: 250px;"
                                        alt="Image">
                                @endif

                                <div class="mt-3">
                                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Quay Lại</a>
                                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning">Sửa</a>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Danh Mục</th>
                                            <td>{{ $post->category->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Thẻ</th>
                                            <td>
                                                @foreach ($post->tags as $tag)
                                                    <span class="badge badge-pill badge-warning">{{ $tag->name }}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tác Giả</th>
                                            <td>{{ $post->author ? $post->author->name : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Số Lượt Xem</th>
                                            <td>{{ $post->view }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Nội Dung</th>
                                            <td>{{ $post->content }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Ngày Tạo</th>
                                            <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Ngày Cập Nhật</th>
                                            <td>{{ $post->updated_at->format('d/m/Y H:i') }}</td>
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
