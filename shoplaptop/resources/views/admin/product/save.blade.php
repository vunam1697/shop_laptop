@extends('admin._layout')
@section('main')
<div class="row">
    <form id="add-form" action="{{route('admin.saveProduct')}}" method="post" enctype="multipart/form-data">
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
                    @if(!empty($sanpham) && $sanpham->id !=0)
                    <h2>Cập nhật sản phẩm <small><button type="submit" class="btn btn-info"><i class="fa fa-save"> Lưu</i></button></small></h2>

                    @else
                    <h2>Thêm mới sản phẩm <small><button type="submit" class="btn btn-info"><i class="fa fa-save"> Lưu</i></button></small></h2>

                    @endif
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        @if(!empty($sanpham) && $sanpham->id !=0)
                                        <h4 class="panel-title">Cập nhật sản phẩm </h4>
                                        <input class="form-control" name="txtId" value="{{$sanpham -> id }}" type="hidden" />
                                        @else
                                        <h4 class="panel-title">Thêm sản phẩm</h4>
                                        @endif

                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Tên sản phẩm <i class="required"> * </i></label>
                                                <input class="form-control" name="txtTenSP" value="{{$sanpham -> tensp }}" type="text" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Loại sản phẩm <i class="required"> * </i></label>
                                                <select name="txtLoaiSP" class="form-control" required>
                                                    @if(!empty($loaiSPs))
                                                        <option value=""> Chọn loại sản phẩm</option>
                                                        @foreach($loaiSPs as $key => $value)
                                                            @if(!empty($sanpham-> Loaisp()->first() -> id) && $sanpham-> Loaisp()->first() -> id == $value->id)
                                                                <option value="{{$value-> id}}" selected> {{ $value->tenloaisp }}</option>
                                                            @elseif(!empty($data) && $data["id_loaisp"] == $value->id) 
                                                                <option value="{{$value-> id}}" selected> {{ $value->tenloaisp }}</option>
                                                            @else
                                                                <option value="{{$value-> id}}"> {{ $value->tenloaisp }}</option>
                                                            @endif
                                                            <!-- <option value="{{$value-> id}}"> {{ $value->tenloaisp }}</option> -->
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Hình ảnh  <i class="required">{{!empty($sanpham) && $sanpham->id !=0 ? "" : "*"}}</i></label>
                                                <input class="form-control" onchange="changeFile(this)" name="txtHinhAnh" type="file" {{!empty($sanpham) && $sanpham->id !=0 ? "" : "required"}} />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Thư viện ảnh <i class="required">{{!empty($sanpham) && $sanpham->id !=0 ? "" : "*"}}</i></label>
                                                <input class="form-control" onchange="changeListFile(this)" name="txtThuVienAnh[]" type="file" multiple {{!empty($sanpham) && $sanpham->id !=0 ? "" : "required"}} />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <div id="row-img">
                                                    @if(!empty($sanpham) && !empty($sanpham->hinhanh) && $sanpham->id !=0)
                                                        <img src="{{url('/image')}}/{{$sanpham -> hinhanh}}" class="img-thumbnail row-image">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="list-img">
                                                    @if(!empty($sanpham) && !empty($sanpham->thuvienanh) && $sanpham->id !=0)
                                                        <?php
                                                             $listImg=json_decode($sanpham->thuvienanh)
                                                        ?>
                                                        @foreach($listImg as $item)
                                                            <img src="{{url('/image')}}/{{$item}}" class="img-thumbnail list-image">
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Số lượng <i class="required"> * </i></label>
                                                <input class="form-control" type="number" value="{{ $sanpham->soluong }}" name="txtSoLuong" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Giá bán <i class="required"> * </i></label>
                                                <input class="form-control" type="number" value="{{ $sanpham->giaban }}" name="txtGiaBan" type="number" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Mô tả </label>
                                                <textarea class="form-control" name="txtMota" rows="1" required>{{ $sanpham->mota }} </textarea>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">CPU </label>
                                                <input class="form-control" value="{{ $sanpham->cpu }}" name="txtCPU" type="text" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">RAM </label>
                                                <input class="form-control" value="{{ $sanpham->ram }}" name="txtRAM" type="text" />
                                            </div>

                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Ổ cứng </label>
                                                <input class="form-control" value="{{ $sanpham->ocung }}" name="txtOCung" type="text" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Card đồ họa </label>
                                                <input class="form-control" value="{{ $sanpham->carddohoa }}" name="txtCardDoHoa" type="text" />
                                            </div>

                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Màn hình </label>
                                                <input class="form-control" value="{{ $sanpham->manhinh }}" name="txtManHinh" type="text" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Pin </label>
                                                <input class="form-control" value="{{ $sanpham->pin }}" name="txtPin" type="text" />
                                            </div>

                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Trọng lượng </label>
                                                <input class="form-control" value="{{ $sanpham->trongluong }}" name="txtTrongLuong" type="text" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Màu </label>
                                                <input class="form-control" value="{{ $sanpham->mausac }}" name="txtMauSac" type="text" />
                                            </div>

                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Kích thước </label>
                                                <input class="form-control" value="{{ $sanpham->kichthuoc }}" name="txtKichThuoc" type="text" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label for="reg_input_name" class="req">Nội dung </label>
                                                <textarea class="form-control classNoiDung" name="txtNoiDung" id="ckeditor"> {{ $sanpham->noidung }}</textarea>
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