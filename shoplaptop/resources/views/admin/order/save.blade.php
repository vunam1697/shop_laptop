
@extends('admin._layout')
@section('main')
<div class="row">
    <form id="add-form" action="{{route('admin.saveOrder')}}" method="post">
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

                @if(!empty($message) && $success)
                <div class="x_title">
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{$message}}.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true" style="color: black;">&times;</span>
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                @endif

                <div class="x_title">
                    @if(!empty($order) && $order->id !=0)
                    <h2>Cập đơn hàng <small><button type="submit" class="btn btn-info"><i class="fa fa-save"> Lưu</i></button></small></h2>

                    @else
                    <h2>Thêm mới đơn hàng<small><button type="submit" class="btn btn-info"><i class="fa fa-save"> Lưu</i></button></small></h2>
                    @endif
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        @if(!empty($order) && $order->id !=0)
                                        <h4 class="panel-title">Cập nhật đơn hàng</h4>
                                        <input class="form-control" name="id" value="{{$order -> id }}" type="hidden" />
                                        @else
                                        <h4 class="panel-title">Chọn sản phẩm</h4>
                                        @endif

                                    </div>
                                    <div class="panel-body">
                                        <!-- <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Tên khách hàng <i class="required"> * </i></label>
                                                <input class="form-control" name="tenkh" value="{{$order -> tenkh }}" type="text" />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Số điện thoại <i class="required"> * </i></label>
                                                <input class="form-control" type="text" value="{{ $order->sdt }}" name="sdt" pattern="(09|01[2|6|8|9])+([0-9]{8})\b" maxlength="12" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Email <i class="required"> * </i></label>
                                                <input class="form-control" name="email" value="{{$order -> email }}" type="email" />
                                            </div>

                                            <div class="col-md-6">
                                                <label for="reg_input_name" class="req">Địa chỉ <i class="required"> * </i></label>
                                                <input class="form-control" type="text" value="{{ $order->diachi }}" name="diachi" type="text" />
                                            </div>
                                        </div> -->

                                        <div class="form-group">
                                            <div class="col-md-12" >
                                                <table class="table table-responsive table-hover table-striped" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Tên sản phẩm</th>
                                                            <th>Số lượng</th>
                                                            <th>giá bán</th>
                                                            <th>chức năng</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(!empty($sanpham))
                                                            @foreach($sanpham as $item)
                                                                <tr>
                                                                    <td ><span>{{$item->tensp}}</span></td>
                                                                    <td style="width: 100px;"><span>{{$item->soluong}}</span></td>
                                                                    <td style="width: 100px;"><span style="color: red;"><?php echo number_format($item->giaban) ?> đ</span></td>
                                                                    <td>
                                                                       <a title="thêm sản phẩm vào giỏ" href="{{route('addProductToCard.index', ['id'=> $item -> id ])}}"><button type="button" class="btn btn-info"><i class="fa fa-plus"></i> Thêm</button></a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="x_content">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Danh sách sản phẩm đã chọn</h4>
                                    </div>
                                    <div class="panel-body">                                       
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <table class="table table-responsive table-hover table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Tên sản phẩm</th>
                                                            <th>Số lượng</th>
                                                            <th>Thành tiền</th>
                                                            <th>chức năng</th>
                                                        </tr>
                                                    </thead>
                                                    @if(!empty($cart))
                                                        @foreach($cart as $item)
                                                            <tr>
                                                                <td>{{$item -> tensp}}</td>
                                                                <td>{{$item -> soluong}}</td>
                                                                <td>{{$item -> giaban}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </table>
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