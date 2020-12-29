@extends('master-admin')
@section('title')
    <title>Thêm mới User</title>
@endsection
@section('content')
<div class="right_col" role="main">
    @include('partials.content-header',['name'=>'User','key'=>'Thêm mới'])
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <br/>
                    <form action="{{ route('users.store') }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên User<span class="required">*</span></label>
                            <input type="name" name="name" id="name" class="form-control" placeholder="Nhập tên">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Email<span class="required">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Password<span class="required">*</span></label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Nhập password">
                            @error('value_config')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Số điện thoại<span class="required">*</span></label>
                            <input type="number" name="phone" id="phone" class="form-control" placeholder="Nhập số điện thoại">
                            @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Quyền truy cập<span class="required">*</span></label>
                            <select class="form-control select2_list" name="role_id[]" multiple>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="ln_solid"></div>
                        
                        <div class="form-group">
                            <a href="{{ route('users.index') }}"><button class="btn btn-danger" type="button">Quay về</button></a>
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
            placeholder: "Chọn quyền truy cập",
            // allowClear: true
        })
    })
</script>
@stop