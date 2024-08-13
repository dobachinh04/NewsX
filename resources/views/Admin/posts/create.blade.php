@extends('admin.layouts.master')

@section('title')
    Thêm Mới Tin - NewsX
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Thêm Mới Tin Tức</a></li>
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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thêm Mới Tin Tức</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('admin.posts.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control input-default"
                                                    placeholder="Tiêu Đề" name="title" value="{{ old('title') }}">
                                            </div>

                                            <div class="form-group">
                                                <select class="form-control" name="category_id">
                                                    <option selected disabled>Chọn Loại Tin</option>
                                                    @foreach ($categories as $id => $name)
                                                        <option value="{{ $id }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <select class="form-control" name="tags[]" multiple>
                                                    <option selected disabled>Chọn Thẻ</option>
                                                    @foreach ($tags as $id => $name)
                                                        <option value="{{ $id }}">{{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <input type="text" class="form-control input-default mb-3"
                                                value="Tác Giả: {{ $user->name }}" disabled>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="4" id="comment" placeholder="Nội Dung" name="content">{{ old('content') }}</textarea>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Tải
                                                        Lên</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image"
                                                        accept="image/*">
                                                    <label class="custom-file-label">Chọn Ảnh</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
                                        Quay Lại</a>
                                    <button type="submit" class="btn btn-success">Thêm Mới</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
