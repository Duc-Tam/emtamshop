@extends('master-admin')

@section('title')
    <title>Blog</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/products/index/list.css') }}">
@endsection
@section('content')
<div class="right_col" role="main">
    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>Blog</h3>
        </div>
    </div>
    <!--box-lists-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                @endif
                <div class="zvn-add-new pull-right">
                    <a href="{{ route('Adminblogs.create') }}" class="btn btn-success"><i
                            class="fa fa-plus-circle"></i> Thêm mới</a>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">#</th>
                                <th class="column-title" style="width:20%;">Tiêu đề</th>
                                <th class="column-title">Ảnh</th>
                                <th class="column-title" style="width:30%;">Mô tả</th>
                                <th class="column-title">Trạng thái</th>
                                <th class="column-title">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($blogs as $blog)
                            <tr class="even pointer">
                                <td class="">{{ $blog->id }}</td>
                                <td>{{ $blog->b_name }}</td>
                                <td>
                                    <img style="height: 150px;width:250px;" class="product-image" src="{{ $blog->b_image }}" alt="">
                                </td>
                                <td>{!! $blog->b_desc !!}</td>
                                <td>@if ($blog->status==1)
                                    <a href="{{ route('Adminblogs.active', ['id'=>$blog->id]) }}" class="label label-info" style="margin-left: 20px;">Hiện</a>
                                    @else
                                    <a href="{{ route('Adminblogs.active', ['id'=>$blog->id]) }}" class="label label-default" style="margin-left: 20px;">Ẩn</a>
                                @endif
                                </td>
                                <td class="last">
                                    <div class="zvn-box-btn-filter"><a
                                            href="{{ route('Adminblogs.getedit', ['id'=>$blog->id]) }}"
                                            type="button" class="btn btn-icon btn-success" data-toggle="tooltip"
                                            data-placement="top" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a><a href="/delete/1"
                                            type="button" class="btn btn-icon btn-danger btn-delete"
                                            data-toggle="tooltip" data-placement="top"
                                            data-original-title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    </div>
                                </td>  
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end-box-lists-->
    <!--box-pagination-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            {{-- {{ $slider->links() }} --}}
        </div>
    </div>
    <!--end-box-pagination-->
</div>
@endsection
