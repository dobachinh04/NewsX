@extends('admin.layouts.master')

@section('title')
    Cập Nhật Mới Tin - NewsX
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Cập Nhật Tin Tức</a></li>
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
                            <h4 class="card-title">Cập Nhật Tin Tức</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('admin.posts.update', $post) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control input-default"
                                                    placeholder="Tiêu Đề" name="title" value="{{ $post->title }}">
                                            </div>

                                            <div class="form-group">
                                                <select class="form-control" name="category_id"
                                                    value="{{ old('category_id') }}">
                                                    <option selected disabled>Chọn Loại Tin</option>
                                                    @foreach ($categories as $id => $name)
                                                        <option @selected($post->category_id == $id) value="{{ $id }}">
                                                            {{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <select class="form-control" name="tags[]" multiple>
                                                    <option selected disabled>Chọn Thẻ</option>
                                                    @foreach ($tags as $id => $name)
                                                        <option @selected(in_array($id, $postTags)) value="{{ $id }}">
                                                            {{ $name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <input type="text" class="form-control input-default" disabled
                                                value="Tác Giả: {{ $user->name }}">
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="4" id="comment" placeholder="Nội Dung" name="content">{{ $post->content }}</textarea>
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

                                            @if ($post->image)
                                                <img class="mb-3" src="{{ Storage::url($post->image) }}"
                                                    style="width: 100px;" alt="{{ Storage::url($post->image) }}">
                                            @endif
                                        </div>
                                    </div>

                                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
                                        Quay Lại</a>
                                    <button type="submit" class="btn btn-warning">Cập Nhật</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
