@extends('admin._layout')
@section('main')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách sản phẩm <small><a href="../thucthi/add-product.php" class="btn btn-info"><i class="fa fa-plus"> Thêm sản phẩm</i></a></small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm </th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Giá bán</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $key => $value)
                                <td>
                                    <span>{{$value -> tensp}}</span>
                                </td>
                                <td>
                                    <img src="{{url('/image')}}/{{$value -> hinhanh}}" width="100" />
                                </td>
                                <td>
                                    <span>{{$value -> soluong}}</span>
                                </td>
                                <td>
                                    <span><?php echo number_format($value -> giaban) ?> </span>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> sửa</button>
                                    <button type="button" class="btn btn-default"><i class="fa fa-trash"></i> Xóa</button>
                                    <button type="button" class="btn btn-info"><i class="fa fa-eye"></i> Chi tiết</button>
                                </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>

@stop