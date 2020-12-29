@extends('master-admin')

@section('title')
    <title>Danh sách comment</title>
@endsection
@section('content')
<div class="right_col" role="main">
    <div class="page-header zvn-page-header clearfix">
        <div class="zvn-page-header-title">
            <h3>Danh sách comment</h3>
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
                                <th class="column-title">Tên khách hàng</th>
                                <th class="column-title">Nội dung</th>
                                <th class="column-title">Tên sản phẩm</th>
                                <th class="column-title">Duyệt</th>
                                <th class="column-title">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($comments as $comment)
                            <tr class="even pointer">
                                <td class="">{{ $comment->id }}</td>
                                <td>{{ $comment->name }}
                                <td>{{ $comment->content }}
                                    @if ($comment->status==1)
                                    <form role="form" method="POST" action="{{ route('comments.replay',['id'=> $comment->id]) }}">
                                        @csrf
                                        <br><textarea name="content" id="" rows="1"></textarea>
                                        <br><button>Trả lời bình luận</button>
                                    </form>
                                    @endif
                                </td>
                                <td>{{ $comment->products->p_name }}</td>
                                <td>@if ($comment->status==0)
                                    <a href="{{ route('comments.active', ['id'=>$comment->id]) }}" class="label label-default">Đang chờ duyệt</a>
                                    @else
                                    <a href="{{ route('comments.active', ['id'=>$comment->id]) }}" class="label label-info">Đã duyệt</a>
                                @endif
                                </td>
                                <td class="last">
                                    </a><a href="{{ route('comments.delete',['id'=>$comment->id]) }}"
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
            {{-- {{ $category->links() }} --}}
        </div>
    </div>
    <!--end-box-pagination-->
</div>
@endsection
