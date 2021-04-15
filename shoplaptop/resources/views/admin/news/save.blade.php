@extends('admin._layout')
@section('main')
<div class="row">
    <form id="add-form" action="{{route('admin.saveNews')}}" method="post" enctype="multipart/form-data">
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
                    @if(!empty($tintuc) && $tintuc->id !=0)
                    <h2>Cập nhật tin tức <small><button type="submit" class="btn btn-info"><i class="fa fa-save"> Lưu</i></button></small></h2>

                    @else
                    <h2>Thêm mới tin tức <small><button type="submit" class="btn btn-info"><i class="fa fa-save"> Lưu</i></button></small></h2>

                    @endif
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        @if(!empty($tintuc) && $tintuc->id !=0)
                                        <h4 class="panel-title">Cập nhật tin tức </h4>
                                        <input class="form-control" name="txtId" value="{{$tintuc -> id }}" type="hidden" />
                                        @else
                                        <h4 class="panel-title">Thêm tin tức</h4>
                                        @endif

                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Tên tin tức <i class="required"> * </i></label>
                                                <input class="form-control" name="txtTenTT" value="{{$tintuc -> tentt }}" type="text" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Hình ảnh  <i class="required">{{!empty($tintuc) && $tintuc->id !=0 ? "" : "*"}}</i></label>
                                                <input class="form-control" onchange="changeFile(this)" name="txtHinhAnh" type="file" {{!empty($tintuc) && $tintuc->id !=0 ? "" : "required"}} />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Mô tả </label>
                                                <textarea class="form-control" name="txtMota" rows="4" required>{{ $tintuc->mota }} </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <div id="row-img">
                                                    @if(!empty($tintuc) && !empty($tintuc->hinhanh) && $tintuc->id !=0)
                                                        <img src="{{url('/image')}}/{{$tintuc -> hinhanh}}" class="img-thumbnail row-image" style="width: 150px; height: 130px; margin-left: 0">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="reg_input_name" class="req">Nội dung </label>
                                                <textarea class="form-control classNoiDung" name="txtNoiDung" id="ckeditor"> {{ $tintuc->noidung }}</textarea>
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

@stop