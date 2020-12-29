@extends('master-admin')
@section('title')
    <title>Thêm mới danh mục</title>
@endsection
@section('content')
<div class="right_col" role="main">
    @include('partials.content-header',['name'=>'Danh mục','key'=>'Thêm mới'])
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <br/>
                    <form action="{{ route('categories.add') }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group {{ $errors->first('name') ? 'has-error': '' }}">
                            <label for="name">Tên danh mục<span class="required">*</span></label>
                            <input type="name" name="name" id="name" class="form-control" placeholder="Nhập tên danh mục">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group {{ $errors->first('slug') ? 'has-error': '' }}">
                            <label for="name">Đường dẫn chuẩn SEO<span class="required">*</span></label>
                            <input type="text" name="slug" id="slug" class="form-control" placeholder="Đường dẫn">
                            @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Icon<span class="required">*</span></label>
                            <input type="name" name="icon" id="icon" class="form-control" value="none">
                        </div>
                        <div class="form-group">
                            <label for="name">Danh mục cha<span class="required">*</span></label>
                            <select class="form-control select2_list" name="parent_id">
                                <option value="0">Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Trạng thái<span class="required">*</span></label>
                            <select class="form-control" name="status">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiện</option>
                            </select>
                        </div>
                        <div class="ln_solid"></div>
                        
                        <div class="form-group">
                            <a href="{{ route('categories.index') }}"><button class="btn btn-danger" type="button">Quay về</button></a>
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