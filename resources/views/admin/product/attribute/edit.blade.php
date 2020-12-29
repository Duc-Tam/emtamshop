@extends('master-admin')
@section('title')
    <title>Thêm mới thuộc tính</title>
@endsection
@section('content')
<div class="right_col" role="main">
    @include('partials.content-header',['name'=>'Chi tiết sản phẩm','key'=>'Thêm mới'])
    <div class="row">
        <section class="content">
           <div class="row">
                <form action="" method="POST" enctype="multipart/form-data">
                 @csrf 
                    <div class="col-sm-12">
                    <div class="box box-warning" style="background-color: white">
                        <div class="box-header with-border">
                            <h3 class="box-title">Chi tiết sản phẩm </h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group"><label for="exampleInputEmail">Tên Sản Phẩm <b class="col-red">(*)</b></label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Iphone.." autocomplete="off" 
                                                   value="{{ $product->p_name }}" disabled>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group"><label for="exampleInputEmail">CPU <b class="col-red">(*)</b></label>
                                        <input type="text" class="form-control" name="lap_cpu" autocomplete="off" 
                                                    value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group"><label for="exampleInputEmail">RAM <b class="col-red">(*)</b></label>
                                        <input type="text" class="form-control" name="lap_ram" autocomplete="off" 
                                                    value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group"><label for="exampleInputEmail">Ổ Cứng <b class="col-red">(*)</b></label>
                                        <input type="text" class="form-control" name="lap_main" autocomplete="off" 
                                                    value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group"><label for="exampleInputEmail">Card Đồ Họa <b class="col-red">(*)</b></label>
                                        <input type="text" class="form-control" name="lap_card" autocomplete="off" 
                                                    value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group"><label for="exampleInputEmail">Màn Hình <b class="col-red">(*)</b></label>
                                        <input type="text" class="form-control" name="lap_screen" autocomplete="off" 
                                                    value="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group"><label for="exampleInputEmail">Cổng giao tiếp <b class="col-red">(*)</b></label>
                                        <input type="text" class="form-control" name="lap_conggiaotiep" autocomplete="off" 
                                                    value="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group"><label for="exampleInputEmail">Chuẩn LAN <b class="col-red">(*)</b></label>
                                        <input type="text" class="form-control" name="lap_LAN" autocomplete="off" 
                                                    value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group"><label for="exampleInputEmail">Chuẩn WIFI <b class="col-red">(*)</b></label>
                                        <input type="text" class="form-control" name="lap_WIFI" autocomplete="off" 
                                                    value="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group"><label for="exampleInputEmail">Blutooth <b class="col-red">(*)</b></label>
                                        <input type="text" class="form-control" name="lap_blutooth" autocomplete="off" 
                                                    value="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group"><label for="exampleInputEmail">Webcam <b class="col-red">(*)</b></label>
                                        <input type="text" class="form-control" name="lap_system" autocomplete="off" 
                                                    value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group"><label for="exampleInputEmail">Audio <b class="col-red">(*)</b></label>
                                        <input type="text" class="form-control" name="lap_audio" autocomplete="off" 
                                                    value="">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group"><label for="exampleInputEmail">Pin <b class="col-red">(*)</b></label>
                                        <input type="text" class="form-control" name="lap_pin" autocomplete="off" 
                                                    value="">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group"><label for="exampleInputEmail">Trọng Lượng <b class="col-red">(*)</b></label>
                                        <input type="text" class="form-control" name="lap_weight" autocomplete="off" 
                                                    value="">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group"><label for="exampleInputEmail">Kích Thước <b class="col-red">(*)</b></label>
                                        <input type="text" class="form-control" name="lap_size" autocomplete="off" 
                                                    value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-12 clearfix" style="padding:2%">
                        <div class="box-footer text-center">
                        <a href="" class="btn btn-default"><i class="fa fa-arrow-left"></i>Cannel</a>
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
@stop
