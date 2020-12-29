@extends('master-admin')
@section('title')
    <title>Cập nhật Vai trò</title>
@endsection
@section('content')
<div class="right_col" role="main">
    @include('partials.content-header',['name'=>'Roles','key'=>'Chỉnh sửa'])
    <div class="row">
        <form action="{{ route('roles.update',['id'=>$roles->id]) }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <br/>
                        <div class="form-group">
                            <label for="name">Tên Vai trò<span class="required">*</span></label>
                            <input type="name" name="name" id="name" class="form-control" value="{{ $roles->name }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="des">Mô tả vai trò<span>*</span></label>
                            <textarea name="display_name" id="display_name" class="form-control my-editor" rows="4">{{ $roles->display_name }}</textarea>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-12">
                <label>
                    <input type="checkbox" class="checkall">
                </label> Check All
            </div>
            <div class="row">
                @foreach ($permission as $permissionItem)
                <div class="card border-primary mb-3 col-md-12">
                    <div class="card-header" style="background-color:#5bc0de;">
                        <label style="margin-left: 20px;">
                            <input type="checkbox" class="checkbox_pa" value="{{ $permissionItem->id }}">
                        </label> Module {{ $permissionItem->display_name }}
                    </div>
                    <div class="row">
                        @foreach ($permissionItem->permissionsChild as $item)
                            <div class="card-body text-primary col-md-3">
                                <h5 class="card-title" style="margin-left: 20px;"><label>
                                    <input type="checkbox" class="checkbox_child" name="permission_id[]" 
                                    {{ $permissionCheck->contains('id',$item->id) ? 'checked' : '' }} 
                                    value="{{ $item->id }}">
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
                            <button type="submit" class="btn btn-success">Cập nhật</button>
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
    $('.checkall').on('click',function(){
        $(this).parents().find('.checkbox_child').prop('checked',$(this).prop('checked'));
        $(this).parents().find('.checkbox_pa').prop('checked',$(this).prop('checked'));
    });
</script>
@stop