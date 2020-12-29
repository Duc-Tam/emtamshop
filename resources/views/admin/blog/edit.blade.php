@extends('master-admin')
@section('title')
    <title>Chỉnh sửa tin tức</title>
@endsection
@section('content')
<div class="right_col" role="main">
    @include('partials.content-header',['name'=>'Blog','key'=>'Chỉnh sửa'])
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <br/>
                    <form action="{{ route('Adminblogs.postEdit',['id'=>$blogs->id]) }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tiêu đề<span class="required">*</span></label>
                            <input type="name" name="b_name" id="name" class="form-control" value="{{ $blogs->b_name }}">
                            @error('b_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group"><label for="exampleInputEmail">Đường dẫn</label>
                            <input type="text" class="form-control" name="b_slug" id="slug" placeholder="" autocomplete="off" value="{{ $blogs->b_slug }}">
                        </div>
                        <div class="form-group">
                            <label for="name">Mô tả<span class="required">*</span></label>
                            <textarea name="b_desc" name="b_desc" id="description" class="form-control my-editor" rows="5">{{ $blogs->b_desc }}</textarea>
                            @error('b_desc')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="des">Nội dung<span>*</span></label>
                            <textarea name="b_content" name="content" id="description" class="form-control my-editor" rows="5">{{ $blogs->b_content }}</textarea>
                            @error('b_content')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="avater">Hình ảnh<span>*</span></label>
                            <input type="file" name="b_image" id="b_image" class="form-control-file">
                        </div>
                        <div class="row container_image">
                            <img class="image-slider-edit" src="{{ $blogs->b_image }}" alt="" style="width:50%">
                        </div>
                        <div class="form-group">
                            <label for="name">Tác giả<span class="required">*</span></label>
                            <input type="name" name="b_author" id="b_author" class="form-control" value="{{ $blogs->b_author }}">
                            @error('b_author')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="ln_solid"></div>
                        
                        <div class="form-group">
                            <a href="{{ route('Adminblogs.index') }}"><button class="btn btn-danger" type="button">Quay về</button></a>
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
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    $(function(){
        $(".select2_list").select2({
            placeholder: "Chọn danh mục khác",
            // allowClear: true
        })
    })
</script>
<script>
    var editor_config = {
      path_absolute : "/",
      selector: "textarea.my-editor",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
  
        var cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }
  
        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };
  
    tinymce.init(editor_config);
</script>
@stop