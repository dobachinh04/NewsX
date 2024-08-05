@extends('admin.layouts.master')

@section('title')
    Cập Nhật Người Dùng - NewsX
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Cập Nhật Người Dùng</a></li>
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
                            <h4 class="card-title">Cập Nhật Người Dùng</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('admin.users.update', ['id' => $user->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control input-default"
                                                    placeholder="Họ và Tên" name="name"
                                                    value="{{ old('name', $user->name) }}">
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control input-default" placeholder="Email"
                                                    name="email" value="{{ old('email', $user->email) }}">
                                            </div>

                                            {{-- <div class="form-group">
                                                <input type="password" class="form-control input-default"
                                                    placeholder="Mật Khẩu" name="password">
                                            </div>

                                            <div class="form-group">
                                                <input type="password" class="form-control input-default"
                                                    placeholder="Nhập Lại Mật Khẩu" name="password_confirmation">
                                            </div> --}}
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <select class="form-control" name="role_id">
                                                    <option selected disabled>Chọn Vai Trò</option>
                                                    @foreach ($roles as $role)
                                                        {{-- <option value="{{ $role->id }}">{{ $role->name }}</option> --}}

                                                        {{-- Option vẫn giữ nguyên khi sửa --}}
                                                        <option value="{{ $role->id }}"
                                                            {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                                            {{ $role->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Tải
                                                        Lên</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image"
                                                        accept="image/*" value="{{ old('image', $user->image) }}">
                                                    <label class="custom-file-label">Chọn Ảnh</label>
                                                </div>
                                            </div>

                                            @if ($user->image)
                                                <img class="mb-3" src="{{ asset('storage/images/' . $user->image) }}"
                                                    style="width: 100px;" alt="Ảnh Cũ">
                                            @endif
                                        </div>
                                    </div>

                                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                                        Quay Lại</a>
                                    <button type="submit" class="btn btn-success">Cập Nhật</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
