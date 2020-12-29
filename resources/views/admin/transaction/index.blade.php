@extends('master-admin')

@section('title')
    <title>Đơn hàng</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/products/index/list.css') }}">
@endsection
@section('content')
<div class="right_col" role="main">
    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>Đơn hàng</h3>
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
                <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <thead>
                            <tr class="headings">
                                <th class="column-title">#</th>
                                <th class="column-title">Thông tin</th>
                                <th class="column-title">Số tiền</th>
                                <th class="column-title">Account</th>
                                <th class="column-title">Status</th>
                                <th class="column-title">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($transaction as $trans)
                            <tr class="even pointer">
                                <td class="">{{ $trans->id }}</td>
                                <td>
                                    <ul>
                                        <li>Name: {{ $trans->name }}</li>
                                        <li>Email: {{ $trans->email }}</li>
                                        <li>Phone: {{ $trans->phone }}</li>
                                        <li>Address: {{ $trans->address }}</li>
                                    </ul>
                                </td>
                                <td>{{ number_format($trans->total_money) }} VND</td>
                                <td>
                                    @if ($trans->user_id)
                                        <span class="label label-success">Thành viên</span>
                                    @else
                                        <span class="label label-default">Khách</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="label label-{{ $trans->getStatus($trans->status)['class'] }}">
                                        {{ $trans->getStatus($trans->status)['name'] }}
                                    </span>
                                </td>
                                <td class="last">
                                    <div class="zvn-box-btn-filter">
                                    <a data-id="{{ $trans->id }}" href="{{ route('transaction.detail',['id'=>$trans->id]) }}" 
                                        class="btn btn-xs btn-info js-preview-transaction" style="margin-top: 5px;"><i class="fa fa-eye"></i>View</a>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-xs">Action</button>
                                        <button type="button" class="btn btn-success btn-xs dropdown-toggle" data-toggle="dropdown"
                                        aria-expanded="false">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu" role="menu" style="font-size: 14px;">
                                            <li>
                                                <a href="{{ route('transaction.delete',['id'=>$trans->id]) }}">
                                                    <i class="fa fa-trash"></i>Delete
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('transaction.action',['info','id'=>$trans->id]) }}"><i class="fa fa-ban"></i>Đang giao hàng</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('transaction.action',['success','id'=>$trans->id]) }}"><i class="fa fa-ban"></i>Đã giao hàng</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('transaction.action',['cancel','id'=>$trans->id]) }}"><i class="fa fa-ban"></i>Đã hủy</a>
                                            </li>
                                        </ul>
                                    </div>
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
            {{ $transaction->links() }}
        </div>
    </div>
    <!--end-box-pagination-->
</div>
<div class="modal fade fade" id="modal-preview-transaction" aria-modal="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Chi tiết đơn hàng <b id="idTransaction">#1</b></h4>
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
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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