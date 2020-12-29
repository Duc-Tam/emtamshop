@extends('master-admin')
@section('title')
    <title>Thêm mới Setting</title>
@endsection
@section('content')
<div class="right_col" role="main">
    @include('partials.content-header',['name'=>'Setting','key'=>'Thêm mới'])
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <br/>
                    <form action="{{ route('settings.add') }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label for="name">Config Key<span class="required">*</span></label>
                            <input type="name" name="key_config" id="key_config" class="form-control" placeholder="Nhập Key_cofig">
                            @error('key_config')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Config Value<span class="required">*</span></label>
                            <input type="name" name="value_config" id="value_config" class="form-control" placeholder="Nhập value_config">
                            @error('value_config')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="ln_solid"></div>
                        
                        <div class="form-group">
                            <a href="{{ route('settings.index') }}"><button class="btn btn-danger" type="button">Quay về</button></a>
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
            placeholder: "Chọn danh mục khác",
            // allowClear: true
        })
    })
</script>
@stop