@extends('master-admin')

@section('title')
    <title>Danh mục sản phẩm</title>
@endsection
@section('content')
<div class="right_col" role="main">
    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>Danh mục sản phẩm</h3>
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
                @if(session('danger'))
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                @endif
                <div class="zvn-add-new pull-right">
                    <a href="{{ route('categories.create') }}" class="btn btn-success"><i
                            class="fa fa-plus-circle"></i> Thêm mới</a>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">#</th>
                                <th class="column-title">Tên danh mục</th>
                                <th class="column-title">Icon</th>
                                <th class="column-title">Đường dẫn chuẩn SEO</th>
                                <th class="column-title">Trạng thái</th>
                                <th class="column-title">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($category as $cate_list)
                            <tr class="even pointer">
                                <td class="">{{ $cate_list->id }}</td>
                                <td>{{ $cate_list->name }}</td>
                                <td>{{ $cate_list->icon }}
                                </td>
                                {{-- <td>{{ isset($cate_list->cat->name) ? $cate_list->cat->name : '--' }}</td> --}}
                                {{-- <td>
                                    @if ($cate_list->id == $cate_list->cat->parent_id)
                                    {{ $cate_list->cat->name }}
                                    @endif
                                </td> --}}
                                <td>{{ $cate_list->slug }}</td>
                                {{-- <td>{{ ($cate_list->status==0)? "Hiện": "Ẩn" }}</td> --}}
                                <td>@if ($cate_list->status==0)
                                    <a href="{{ route('categories.active', ['id'=>$cate_list->id]) }}" class="label label-info">Hiện</a>
                                    @else
                                    <a href="{{ route('categories.active', ['id'=>$cate_list->id]) }}" class="label label-default">Ẩn</a>
                                @endif
                                </td>
                                <td class="last">
                                    <div class="zvn-box-btn-filter"><a
                                            href="{{ route('categories.edit', ['id'=>$cate_list->id]) }}"
                                            type="button" class="btn btn-icon btn-success" data-toggle="tooltip"
                                            data-placement="top" data-original-title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a><a href="{{ route('categories.delete',['id'=>$cate_list->id]) }}"
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
            {{-- <div class="x_panel">
                <div class="x_title">
                    <h2>Phân trang</h2>
                    <div class="clearfix"></div>
                    {{ $category->links('admin.pagination.paginate') }}
                </div>
            </div> --}}
            {{ $category->links() }}
        </div>
    </div>
    <!--end-box-pagination-->
</div>
@endsection
