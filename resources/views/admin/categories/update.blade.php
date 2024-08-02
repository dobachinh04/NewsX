@extends('admin.layouts.master')

@section('title')
    Cập Nhật Loại Tin - NewsX
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Loại Tin</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Thêm Mới Loại Tin</a></li>
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
                            <h4 class="card-title">Cập Nhật Loại Tin</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                                    @csrf

                                    @method('PUT')

                                    <div class="form-group">
                                        <input type="text" class="form-control input-default " placeholder="Tên Loại Tin"
                                            value="{{ old('name', $category->name) }}" name="name">
                                    </div>

                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
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
