@extends('master-admin')
@section('title')
    <title>Thêm mới Vai trò</title>
@endsection
@section('content')
<div class="right_col" role="main">
    @include('partials.content-header',['name'=>'Roles','key'=>'Thêm mới'])
    <div class="row">
        <form action="{{ route('roles.store') }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <br/>
                        <div class="form-group">
                            <label for="name">Tên Vai trò<span class="required">*</span></label>
                            <input type="name" name="name" id="name" class="form-control" placeholder="Nhập tên vai trò">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="des">Mô tả vai trò<span>*</span></label>
                            <textarea name="display_name" id="display_name" class="form-control my-editor" rows="4"></textarea>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                @foreach ($permissions as $permission)
                <div class="card border-primary mb-3 col-md-12">
                    <div class="card-header" style="background-color:#5bc0de;">
                        <label style="margin-left: 20px;">
                            <input type="checkbox" class="checkbox_pa" value="{{ $permission->id }}">
                        </label> Module {{ $permission->display_name }}
                    </div>
                    <div class="row">
                        @foreach ($permission->permissionsChild as $item)
                            <div class="card-body text-primary col-md-3">
                                <h5 class="card-title" style="margin-left: 20px;"><label>
                                    <input type="checkbox" class="checkbox_child" name="permission_id[]" value="{{ $item->id }}">
                                </label> {{ $item->display_name }}</h5>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="x_panel">
            <div class="x_content">
                <br/>
                    
                    <div class="form-group">
                        <a href="{{ route('roles.index') }}"><button class="btn btn-danger" type="button">Quay về</button></a>
                            <button type="submit" class="btn btn-success">Tạo mới</button>
                    </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('admins/js/slug.js')}}"></script>
<script src="{{asset('admins/js/select2.min.js')}}"></script>
<script>
    $(function(){
        $(".select2_list").select2({
            placeholder: "Chọn danh mục khác",
            // allowClear: true
        })
    })
</script>
<script>
    $('.checkbox_pa').on('click',function(){
        $(this).parents('.card').find('.checkbox_child').prop('checked',$(this).prop('checked'));
    });
</script>
@stop