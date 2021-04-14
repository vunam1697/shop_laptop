<?php 
    $check = false;
    $tongsoluong=0;
    $tongtien=0;
 ?>
@extends('admin._layout')
@section('main')
<div class="row">
    <form id="add-form" action="{{route('admin.saveOrder')}}" method="post">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" id="token">
        <input type="hidden" name="id" value="{{$order->id}}"/>

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
                    @if(empty($isDetail))
                        @if(!empty($order) && $order->id !=0)
                            <h2>Cập nhật đơn hàng <small><button type="submit" class="btn btn-info"><i class="fa fa-save"> Lưu</i></button></small></h2>
                        @else
                            <h2>Thêm mới đơn hàng<small><button type="submit" class="btn btn-info"><i class="fa fa-save"> Lưu</i></button></small></h2>
                        @endif
                    @endif
                    <div class="clearfix"></div>
                </div>
                @if(empty($order->status) || $order->status==1)
                <div class="x_content">
                    <div class="content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Chọn sản phẩm</h4>
                                    </div>
                                    <div class="panel-body">                                     
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <table class="table table-responsive table-hover table-striped" id="myTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Tên sản phẩm</th>
                                                            <th>Số lượng</th>
                                                            <th>giá bán</th>
                                                            @if(empty($isDetail))
                                                                <th>chức năng</th>
                                                            @endif
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(!empty($sanpham))
                                                        @foreach($sanpham as $item)
                                                        <tr>
                                                            <td><span>{{$item->tensp}}</span></td>
                                                            <td style="width: 100px;"><span>{{$item->soluong}}</span></td>
                                                            <td style="width: 100px;"><span style="color: red;"><?php echo number_format($item->giaban) ?> đ</span></td>
                                                            <td>
                                                                <?php
                                                                    $check = false;
                                                                    $value = session()->get('cart');
                                                                    if(!empty($value))
                                                                    {
                                                           
                                                                        foreach ($value as $data) {
                                                                            if (!empty($data) && $data->id == $item->id) {
                                                                                $check = true;
                                                                                break;
                                                                            }
                                                                        }
                                                                    }
                                                                ?>

                                                            @if(empty($isDetail))
                                                                @if($check)
                                                                    <a><button type="button" class="btn btn-success"><i class="fa fa-check"></i> Đã thêm</button></a>
                                                                @else
                                                                    <a title="thêm sản phẩm vào giỏ" href="{{route('addProductToCard.index', ['id'=> $item -> id,'type'=> 'add','iddonhang'=>$order->id])}}"><button type="button" class="btn btn-info"><i class="fa fa-plus"></i> Thêm</button></a>
                                                                @endif
                                                            @endif
                                                                
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
                @endif
                

                 @if(!empty($order) && $order->id !=0)
                 <div class="clearfix"></div>

                    <div class="x_content">
                        <div class="content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">Thông tin khách hàng</h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label for="reg_input_name" class="req">Tên khách hàng <i class="required"> * </i></label>
                                                    <input class="form-control" name="tenkh" value="{{$order -> tenkh }}" type="text" required/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="reg_input_name" class="req">Số điện thoại <i class="required"> * </i></label>
                                                    <input class="form-control" type="text" value="{{ $order->sdt }}" name="sdt" pattern="(09|01[2|6|8|9])+([0-9]{8})\b" maxlength="12" required />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label for="reg_input_name" class="req">Email <i class="required"> * </i></label>
                                                    <input class="form-control" name="email" value="{{$order -> email }}" type="email" required/>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="reg_input_name" class="req">Địa chỉ <i class="required"> * </i></label>
                                                    <input class="form-control" type="text" value="{{ $order->diachi }}" name="diachi" type="text" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6">
                                                    <label for="reg_input_name" class="req">Trạng thái <i class="required"> * </i></label>
                                                    <select class="form-control" name="status" required>
                                                        @if(!empty($trangthaidonhang))
                                                             <option value=""> Chọn trạng thái</option>
                                                            @foreach($trangthaidonhang as $key => $value)
                                                                @if(!empty($order-> TrangThai()->first() -> id) && $order-> TrangThai()->first() -> id == $value->id)
                                                                    <option value="{{$value-> id}}" selected> {{ $value->tentrangthai }}</option>
                                                                @else
                                                                    <option value="{{$value-> id}}"> {{ $value->tentrangthai }}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 @endif

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
                                                             @if((empty($order->status) || $order->status==1) && empty($isDetail))
                                                                <th>chức năng</th>
                                                             @endif
                                                            
                                                        </tr>
                                                    </thead>
                                                    @if(!empty($cart))
                                                        @foreach($cart as $item)
                                                            @if(!empty($item))
                                                               <div class="hidden">
                                                                    {{ $tongsoluong += $item->soluong }}
                                                                    {{ $tongtien += $item->soluong * $item->giaban }}
                                                               </div>
                                                                <tr>
                                                                    <td>{{$item -> tensp}}</td>
                                                                    <td>{{$item -> soluong}}</td>
                                                                    <td>
                                                                        <span style="color: red;"><?php echo number_format($item->giaban * $item->soluong) ?> đ</span>
                                                                    </td>
                                                                    @if((empty($order->status) || $order->status==1) && empty($isDetail))
                                                                        <td>
                                                                            <a href="{{route('addProductToCard.index', ['id'=> $item -> id,'type'=> 'add','iddonhang'=>$order->id ])}}" title="Thêm"><button type="button" class="btn btn-info"><i class="fa fa-plus"></i></button></a>       
                                                                            <a href="{{route('addProductToCard.index', ['id'=> $item -> id,'type'=> 'minus','iddonhang'=>$order->id ])}}" title="Thêm"><button type="button" class="btn btn-info"><i class="fa fa-minus"></i></button></a>       
                                                                            <a href="{{route('admin.order.deleteProductOnCart', ['id'=> $item -> id,'iddonhang'=>$order->id ])}}" title="Xóa"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>       
                                                                        </td>
                                                                    @endif
                                                                   
                                                                </tr>
                                                            @endif
                                                                    
                                                        @endforeach
                                                        @if(Count($cart)>0)
                                                            <tr>
                                                                  <td colspan="4">
                                                                      <span>Tổng số lượng : {{$tongsoluong}}</span><br/>
                                                                      <span style="color: red;">Tổng tiền : <?php echo number_format($tongtien) ?> đ</span>
                                                                  </td>  
                                                            </tr>
                                                        @endif
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