@extends('master-admin')
@section('title')
    <title>Danh mục</title>
@endsection
@section('content')
<div class="right_col" role="main">
    @include('partials.content-header',['name'=>'Danh mục','key'=>'Chỉnh sửa danh mục'])
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <br/>
                    <form action="{{ route('categories.update',['id'=>$category->id]) }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên danh mục<span class="required">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Đường dẫn chuẩn SEO<span class="required">*</span></label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ $category->slug }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Icon<span class="required">*</span></label>
                            <input type="text" name="icon" id="icon" class="form-control" value="{{ $category->icon }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Danh mục cha<span class="required">*</span></label>
                            <select class="form-control select2_list" name="parent_id">
                                <option value="0">Chọn danh mục</option>
                                {!! $htmlOption !!}
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