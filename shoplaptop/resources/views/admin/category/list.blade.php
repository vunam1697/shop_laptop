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
            @elseif(!empty($success) && !$success)    
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
                <h2>Danh sách loại sản phẩm <small><a href="{{route('saveCategory.index')}}" class="btn btn-info"><i class="fa fa-plus"> Thêm loại sản phẩm</i></a></small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Tên loại</th>
                                <th>Slug </th>
                                <th>Mô tả</th>
                                <th>Ngày tạo</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $key => $value)
                            <tr>
                                <td>
                                    <span>{{$value -> tenloaisp}}</span>
                                </td>
                                <td>
                                    <span>{{$value -> slug}}</span>
                                </td>
                                <td>
                                    <span>{{$value -> mota}}</span>
                                </td>
                                <td>
                                    <span>{{$value -> created_at ->format('d/m/Y H:i:s')}} </span>
                                </td>
                                <td>
                                    <a href="{{route('editCategory.index', ['id'=> $value -> id ])}}" title="Cập nhật"><button  type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> </button></a>
                                    <button title="Xóa" onclick="deleteCategory('{{$value -> id}}')" class="btn btn-default" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i> </button>                                   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <form method="post" action="{{route('admin.category.delete')}}">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Bạn có chắc chắn muốn thực hiện chức năng này.</h4>
                <input type="hidden" name="id" id="idCategory">
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
   function deleteCategory(id){
            $('#idCategory').val(id);
        }
</script>