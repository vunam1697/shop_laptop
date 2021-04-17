@extends('admin._layout')
@section('main')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @if(!empty($success) && $success)
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
            
            @if(!empty($success) && !$success)
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
                <h2>Danh sách đơn hàng <small><a class="btn btn-info" data-toggle="modal" data-target="#myModalAddcustomerToSession"><i class="fa fa-plus"> Thêm đơn hàng</i></a></small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Tên khách hàng</th>
                                <th>Email </th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Tổng số lượng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($datas) )
                            @foreach($datas as $key => $value)
                            <tr>
                                <td>
                                    <span>{{$value -> tenkh}}</span>
                                </td>
                                <td>
                                    <span>{{$value -> email}}</span>
                                </td>
                                <td>
                                    <span>{{$value -> sdt}}</span>
                                </td>
                                <td>
                                    <span>{{$value -> diachi}}</span>
                                </td>
                                <td>
                                    <span>{{$value -> tongsoluong}}</span>
                                </td>
                                <td>
                                    <span style="color: red;"><?php echo number_format($value->tongtien) ?> đ</span>
                                </td>
                                <td>
                                    <span>{{ @$value->TrangThai() ->first()-> tentrangthai}} </span>
                                </td>
                                <td>
                                    <span>{{$value -> created_at}} </span>
                                </td>
                                <td>
                                    @if($value -> status != 3)
                                        <a href="{{route('admin.editOrder', ['id'=> $value -> id ])}}" title="Cập nhật"><button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> </button></a>
                                    @endif
                                    @if($value->status ==1 || $value -> status == 4)
                                        <button title="Xóa" onclick="deleteOrder('{{$value -> id}}')" class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i> </button>
                                    @endif
                                    <a href="{{route('admin.viewDetail', ['id'=> $value -> id ])}}" title="Xem chi tiết"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i> </button></a>
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


<!-- Modal -->
<div class="modal fade" id="myModalAddcustomerToSession" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form method="POST" action="{{route('admin.addCustomerToSession')}}">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thông tin khách hàng.</h4>
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}" id="token">
                </div>
                <div class="modal-body" style="height: 210px;">
                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="reg_input_name" class="req">Tên khách hàng <i class="required"> * </i></label>
                            <input class="form-control" name="tenkh"  type="text" required/>
                        </div>
                        <div class="col-md-6">
                            <label for="reg_input_name" class="req">Số điện thoại <i class="required"> * </i></label>
                            <input class="form-control" type="text"  name="sdt" pattern="(09|03|01[2|6|8|9])+([0-9]{8})\b" maxlength="10" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <label for="reg_input_name" class="req">Email <i class="required"> * </i></label>
                            <input class="form-control" name="email"  type="email" required/>
                        </div>

                        <div class="col-md-6">
                            <label for="reg_input_name" class="req">Địa chỉ <i class="required"> * </i></label>
                            <input class="form-control" type="text"  name="diachi" type="text" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" >
                    <button style="margin-top: 10px;" type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                    <button style="margin-top: 10px;" type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <form method="post" action="{{route('admin.order.delete')}}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Bạn có chắc chắn muốn thực hiện chức năng này.</h4>
                <input type="hidden" name="id" id="idOrder">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" id="token">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Thoát</button>
                <button type="submit" class="btn btn-primary" >Xác nhận</button>
            </div>
        </form>
      </div>    
    </div>
  </div>
@stop

<script>
    function deleteOrder(id) {
        $('#idOrder').val(id);
    }
    // let $form = $('#' + formId);
    // $form.bind('submit', function (e) {
    //       debugger
    // });
</script>