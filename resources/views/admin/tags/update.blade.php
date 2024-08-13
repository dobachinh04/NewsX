@extends('admin.layouts.master')

@section('title')
    Cập Nhật Thẻ - NewsX
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Thẻ</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Thêm Mới Thẻ</a></li>
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
                            <h4 class="card-title">Cập Nhật Thẻ</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
                                    @csrf

                                    @method('PUT')

                                    <div class="form-group">
                                        <input type="text" class="form-control input-default " placeholder="Tên Thẻ"
                                            value="{{ $tag->name }}" name="name">
                                    </div>

                                    <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">
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
