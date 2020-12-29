@extends('master-admin')

@section('title')
    <title>Sản phẩm</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/products/index/list.css') }}">
@endsection
@section('content')
<div class="right_col" role="main">
    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>Sản phẩm</h3>
        </div>
    </div>
    <form>
        <div class="input-group mb-3" style="display: flex;">
            <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="ID..." style="width:20%;margin-right:5px;">
            <input type="text" class="form-control" value="{{ Request::get('name') }}" name="name" placeholder="Tên SP..." style="width:20%;margin-right:5px;">
            <div class="input-group-append">
              <button class="btn btn-success" type="submit">Tìm kiếm</button>
              <a href="{{ route('product.create') }}" class="btn btn-success"><i
                class="fa fa-plus-circle"></i> Thêm mới</a>
            </div>
        </div>
    </form>
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
                    
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">#</th>
                                <th class="column-title" width="300px;">Tên sản phẩm</th>
                                <th class="column-title">Hình ảnh</th>
                                <th class="column-title">Danh mục cha</th>
                                <th class="column-title">Đường dẫn chuẩn SEO</th>
                                <th class="column-title">Trạng thái</th>
                                <th class="column-title">Chi tiết SP</th>
                                <th class="column-title">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($product as $productitem)
                            <tr class="even pointer">
                                <td class="">{{ $productitem->id }}</td>
                                <td>{{ $productitem->p_name }}
                                    <ul style="margin-left: 20px;padding:5px;">
                                        <li><b>Giá: {{ number_format($productitem->p_price) }} đ</b></li>
                                    </ul>
                                </td>
                                {{-- <td><a href="{{ route('attr.add', ['id'=>$productitem->id]) }}" class="btn btn-primary">Add</a></td> --}}
                                {{-- <td>{{ number_format($productitem->p_price) }} đ</td> --}}
                                <td>
                                    <img class="product-image" src="{{ $productitem->image_path }}" alt="">
                                </td>
                                <td>{{ optional($productitem->category)->name }}</td>
                                <td>{{ $productitem->p_slug }}</td>
                                <td>@if ($productitem->p_status==1)
                                    <a href="{{ route('product.active', ['id'=>$productitem->id]) }}" class="label label-info">Hiện</a>
                                    @else
                                    <a href="{{ route('product.active', ['id'=>$productitem->id]) }}" class="label label-default">Ẩn</a>
                                @endif
                                </td>
                                <td><a data-id="{{ $productitem->id }}" href="{{ route('product.prodetail',['id'=>$productitem->id]) }}"
                                    class="btn btn-xs btn-info js-preview-transaction" style="margin-top: 5px;"><i class="fa fa-eye"></i>View</a>
                                </td>
                                <td class="last">
                                    <div class="zvn-box-btn-filter"><a
                                            href="{{ route('product.edit', ['id'=>$productitem->id]) }}"
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
    <div class="modal fade fade" id="modal-preview-transaction" aria-modal="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Chi tiết sản phẩm <b id="idTransaction">#1</b></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="content">
                    
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Edit</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--end-box-lists-->
    <!--box-pagination-->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Phân trang</h2>
                    <div class="clearfix"></div>
                    {{ $product->links() }}
                </div>
            </div>
        </div>
    </div>
    <!--end-box-pagination-->
</div>
@section('js')
    <script type="text/javascript">
        $(function(){
            $(".js-preview-transaction").click(function(event){
                event.preventDefault();
                let $this = $(this);
                let URL = $this.attr('href');
                let ID = $this.attr('data-id');
                $("#idTransaction").html("#" + ID);
                $.ajax({
                    url: URL
                }).done(function(results){
                    $("#modal-preview-transaction .content").html(results.html)
                    $("#modal-preview-transaction").modal({
                    show: true
                })
                });
                console.log("111");
            });
        })
    </script>
@endsection
@endsection
