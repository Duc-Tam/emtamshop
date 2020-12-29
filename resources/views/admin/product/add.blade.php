@extends('master-admin')
@section('title')
    <title>Thêm mới sản phẩm</title>
@endsection
@section('content')
<div class="right_col" role="main">
    @include('partials.content-header',['name'=>'Sản phẩm','key'=>'Thêm mới'])
    {{-- Test --}}
    {{-- <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <br/>
                    <form action="{{ route('product.add') }}" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên sản phẩm<span>*</span></label>
                            <input type="text" name="p_name" id="name" class="form-control" placeholder="Nhập tên sản phẩm">
                            @error('p_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Giá<span>*</span></label>
                            <input type="text" name="p_price" id="p_price" class="form-control number" placeholder="Nhập giá sản phẩm">
                            @error('p_price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Đường dẫn chuẩn SEO<span>*</span></label>
                            <input type="text" name="p_slug" id="slug" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="choose">Chọn danh mục<span>*</span></label>
                            <select class="form-control select2_list" name="p_category_id">
                                <option value="0">Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="avater">Hình ảnh<span>*</span></label>
                            <input type="file" name="image" id="image" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="avater">Ảnh chi tiết<span>*</span></label>
                            <input type="file" name="images_path[]" id="images_path[]" multiple="multiple" 
                            class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="price">Thêm tags<span>*</span></label>
                            <select class="form-control tags_select" name="tags[]" multiple="multiple">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="des">Mô tả<span>*</span></label>
                            <textarea name="description" name="description" id="description" class="form-control my-editor" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="des">Thuộc tính<span>*</span></label>
                            <textarea name="p_attr" name="p_attr" id="p_attr" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="p_hot" value="0">
                              <label class="form-check-label">New</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="p_hot" value="1">
                              <label class="form-check-label">Hot</label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="p_hot" value="2">
                              <label class="form-check-label">Sale</label>
                            </div>
                          </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <a href="{{ route('product.index') }}"><button class="btn btn-danger" type="button">Quay về</button></a>
                            <button type="submit" class="btn btn-success">Lưu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <section class="content">
           <div class="row">
                <form action="{{ route('product.add') }}" method="POST" enctype="multipart/form-data">
                 @csrf 
                    <div class="col-sm-8">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin cơ bản</h3>
                        </div>
                        <div class="box-body">
                                <div class="form-group"><label for="exampleInputEmail">Name <b class="col-red">(*)</b></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="p_name" id="name" placeholder="Iphone.." autocomplete="off" 
                                                       value="{{ old('p_name') }}">
                                </div>
                                @error('p_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group"><label for="exampleInputEmail">Giá bán ra <b class="col-red">(*)</b></label>
                                            <input type="text" class="form-control" name="p_price" placeholder="15.000.000" autocomplete="off" 
                                                        value="{{ old('p_price') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                        <label for="tag" >Tags</label>
                                            <select class="form-control tags_select" name="tags[]" multiple="multiple"></select>                
                                        </div>
                                    </div>
                                </div>
                                @error('p_price')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group"><label for="exampleInputEmail">Đường dẫn</label>
                                    <input type="text" class="form-control" name="p_slug" id="slug" placeholder="Iphone-.." autocomplete="off" value="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Danh mục <b class="col-red">(*)</b></label>
                                    <select class="form-control select2_list" name="p_category_id">
                                        <option value="">Chọn danh mục</option>
                                        {!! $htmlOption !!}
                                    </select>
                                </div>
                                @error('p_category_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="exampleInputEmail">Mô tả <b class="col-red">(*)</b></label> 
                                    <textarea name="description" class="form-control my-editor" cols="5" rows="3" autocomplete="off">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title">Thông số khác</h3>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="p_hot" value="0">
                                    <label class="form-check-label">New</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="p_hot" value="1">
                                    <label class="form-check-label">Hot</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="p_hot" value="2">
                                    <label class="form-check-label">Sale</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin cơ bản</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Chi tiết sản phẩm</label>
                                <textarea class="form-control my-editor" rows="3" name="p_attr" autocomplete="off" placeholder="pro_description_seo.."></textarea>
                            </div>
                        </div>
                        </div>
                        <div class="box box-warning">
                            <div class="box-header with-border">
                                <h3 class="box-title"> Ảnh sản phẩm</h3>
                            </div>
                            <div class="form-group">
                                <label for="avater">Hình ảnh<span>*</span></label>
                                <input type="file" name="image" id="image" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <label for="avater">Ảnh chi tiết<span>*</span></label>
                                <input type="file" name="images_path[]" id="images_path[]" multiple="multiple" 
                                    class="form-control-file">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 clearfix" style="padding:2%">
                        <div class="box-footer text-center">
                        <a href="{{ route('product.index') }}" class="btn btn-default"><i class="fa fa-arrow-left"></i>Cannel</a>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Thêm mới </button>
                        </div>
                    </div>
                </form>
           </div>
        </section>
     </div>
    {{-- endtest --}}
</div>
@endsection
@section('js')
<script src="{{asset('admins/js/slug.js')}}"></script>
<script src="{{asset('admins/js/edit-number.js')}}"></script>
<script src="{{asset('admins/js/select2.min.js')}}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    $(function(){
        $(".tags_select").select2({
            tags: true,
            tokenSeparators: [',',' ']
        });
        $(".select2_list").select2({
            placeholder: "Chọn danh mục",
            // allowClear: true
        });
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
