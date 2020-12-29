@extends('master-admin')
@section('title')
    <title>Thêm mới Slider</title>
@endsection
@section('content')
<div class="right_col" role="main">
    @include('partials.content-header',['name'=>'Slider','key'=>'Thêm mới'])
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <br/>
                    <form action="{{ route('slider.add') }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên Slider<span class="required">*</span></label>
                            <input type="name" name="name" id="name" class="form-control" placeholder="Nhập tên slider">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="des">Mô tả<span>*</span></label>
                            <textarea name="description" name="description" id="description" class="form-control my-editor" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="avater">Hình ảnh<span>*</span></label>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                        <div class="ln_solid"></div>
                        
                        <div class="form-group">
                            <a href="{{ route('slider.index') }}"><button class="btn btn-danger" type="button">Quay về</button></a>
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