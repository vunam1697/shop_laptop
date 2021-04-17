@extends('admin._layout')
@section('main')
<div class="row">
    <form id="add-form" action="{{route('admin.saveCategory')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" id="token">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                @if(!empty($message) && !$success)
                <div class="x_title">
                    <div class="alert alert-danger">
                        <strong>Fail!</strong> {{$message}}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="color: black;">&times;</span>
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                @endif
                <div class="x_title">
                    @if(!empty($category) && $category->id !=0)
                    <h2>Cập nhật loại sản phẩm <small><button type="submit" class="btn btn-info"><i class="fa fa-save"> Lưu</i></button></small></h2>

                    @else
                    <h2>Thêm mới loại sản phẩm <small><button type="submit" class="btn btn-info"><i class="fa fa-save"> Lưu</i></button></small></h2>

                    @endif
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        @if(!empty($category) && $category->id !=0)
                                        <h4 class="panel-title">Cập nhật loại sản phẩm </h4>
                                        <input class="form-control" name="id" value="{{$category -> id }}" type="hidden" />
                                        @else
                                        <h4 class="panel-title">Thêm loại sản phẩm</h4>
                                        @endif

                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="reg_input_name" class="req">Tên loại sản phẩm <i class="required"> * </i></label>
                                                <input class="form-control" name="tenloaisp" value="{{$category -> 	tenloaisp }}" type="text" required />
                                            </div>
                                            <div class="col-md-12">
                                                <label for="reg_input_name" class="req">Mô tả </label>
                                                <textarea class="form-control" name="mota" value="{{$category -> mota }}" rows="5" >{{$category -> mota }}</textarea>
                                            </div>
                                        </div>

                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>

<!-- <script>
   CKEDITOR.replace('classNoiDung');

</script> -->

@stop