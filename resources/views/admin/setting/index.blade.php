@extends('master-admin')

@section('title')
    <title>Slider</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/products/index/list.css') }}">
@endsection
@section('content')
<div class="right_col" role="main">
    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>Slider</h3>
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
                    <a href="{{ route('settings.create') }}" class="btn btn-success"><i
                            class="fa fa-plus-circle"></i> Thêm mới</a>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">#</th>
                                <th class="column-title">Key Config</th>
                                <th class="column-title">Value Config</th>
                                <th class="column-title">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($setting as $settingItem)
                            <tr class="even pointer">
                                <td class="">{{ $settingItem->id }}</td>
                                <td>{{ $settingItem->key_config }}</td>
                                <td>{{ $settingItem->value_config }}</td>
                                {{-- <td>
                                    <img class="product-image-slider" src="{{ $sliderItem->images_path }}" alt="">
                                </td> --}}
                                {{-- <td>@if ($sliderItem->status==1)
                                    <a href="{{ route('slider.active', ['id'=>$sliderItem->id]) }}" class="label label-info">Hiện</a>
                                    @else
                                    <a href="{{ route('slider.active', ['id'=>$sliderItem->id]) }}" class="label label-default">Ẩn</a>
                                @endif
                                </td> --}}
                                <td class="last">
                                    <div class="zvn-box-btn-filter"><a
                                            href="{{ route('settings.edit', ['id'=>$settingItem->id]) }}"
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
