@extends('master-admin')
@section('title')
    <title>Thêm mới permission</title>
@endsection
@section('content')
<div class="right_col" role="main">
    @include('partials.content-header',['name'=>'Permissions','key'=>'Thêm mới'])
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <br/>
                    <form action="{{ route('permissions.store') }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group {{ $errors->first('name') ? 'has-error': '' }}">
                            <label for="name">Name<span class="required">*</span></label>
                            <input type="name" name="name" id="name" class="form-control" placeholder="name....">
                        </div>
                        <div class="form-group {{ $errors->first('name') ? 'has-error': '' }}">
                            <label for="name">Display Name<span class="required">*</span></label>
                            <input type="name" name="display_name" id="display_name" class="form-control" placeholder="display_name">
                        </div>
                        <div class="form-group">
                            <label for="name">Danh mục cha<span class="required">*</span></label>
                            <select class="form-control select2_list" name="parent_id">
                                <option value="0">Chọn module cha</option>
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->id }}">{{ $permission->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group {{ $errors->first('name') ? 'has-error': '' }}">
                            <label for="name">Key Code<span class="required">*</span></label>
                            <input type="name" name="key_code" id="key_code" class="form-control" placeholder="key code.....">
                        </div>
                        <div class="ln_solid"></div>
                        
                        <div class="form-group">
                            <a href=""><button class="btn btn-danger" type="button">Quay về</button></a>
                                <button type="submit" class="btn btn-success">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('admins/js/slug.js')}}"></script>
<script src="{{asset('admins/js/select2.min.js')}}"></script>
<script>
    $(function(){
        $(".select2_list").select2({
            placeholder: "Chọn danh mục",
            // allowClear: true
        })
    })
</script>
@stop