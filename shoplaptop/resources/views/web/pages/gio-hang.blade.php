@extends('web.master')
@section('main')
<?php session_start(); ?>
    <article class="art-address art-carts" style="height: 450px">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="contacts-box">
                        <div class="title-box title-carts">
                            <h3 class="title">Thông tin dơn hàng</h3>
                        </div>
                        @if (!empty($_SESSION["cart"]))
                        {{-- {{ dd($_SESSION["cart"]) }} --}}
                        <div class="contents-box carts-box">
                            <div class="contents">
                                <div class="table-content">
                                    <table>
                                       <thead>
                                            <tr class="title-table">
                                                <th class="center">STT</th>
                                                <th class="center">Sản phẩm</th>
                                                <th class="center">Đơn giá</th>
                                                <th class="center">Số lượng</th>
                                                <th class="center">Thành tiền</th>
                                                <th class="center">Thao Tác</th>
                                            </tr>
                                       </thead>
                                        <tbody>
                                            <?php 
                                                $tongtien = 0; 
                                                $tongsoluong = 0; 
                                                $stt = 1;
                                            ?>
                                            @foreach ($_SESSION["cart"] as $key => $item)
                                            <tr class="content-table">
                                                <td class="center title">{{ $stt++ }}</td>
                                                <td class="center">
                                                    <div class="product-box">
                                                        <div class="product-image">
                                                            <a href="{{ route('home.product-detail', ['slug' => $item['slug']]) }}" title="{{ $item['tensp'] }}">
                                                                <img src="{{ url('/image/') .'/'. $item['hinhanh'] }}" alt="{{ $item['tensp'] }}">
                                                            </a>
                                                        </div>

                                                        <h4 class="product-name">
                                                            <a href="{{ route('home.product-detail', ['slug' => $item['slug']]) }}" title="{{ $item['tensp'] }}">
                                                                {{ $item['tensp'] }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <div class="price-box">
                                                        <div class="price" style="width: 115px">
                                                            {{ number_format($item['giaban'], '0', '.', '.') }} VNĐ
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="center">
                                                    <input type="number" min="1" name="soluong_{{ $key }}" id="soluong_{{ $key }}" value="{{ $item['sl'] }}" style="width: 70px">
                                                </td>
                                                <td class="center">
                                                    <div class="price-box">
                                                        <div class="price" style="width: 115px">
                                                            <?php 
                                                                $thanhtien = $item['giaban'] * $item['sl']; 
                                                                $tongtien += $thanhtien;
                                                                $tongsoluong += $item['sl'];
                                                            ?>
                                                            {{ number_format($thanhtien, '0', '.', '.') }} VNĐ
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="center" style="width: 96px; text-align: center">
                                                    <a href="javascript:void(0)" onclick="updateItem({{ $key }})" class="refresh"><i class="fa fa-refresh"></i></a>
                                                    <a href="javascript:void(0)" onclick="deleteItem({{ $key }})" class="remove"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <div class="total-box">
                                        <span>Tổng:</span>
                                        <span>{{ number_format($tongtien, '0', '.', '.') }} VNĐ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="alert alert-danger text-center" role="alert">
                            Giỏ hàng của bạn đang trống
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </article>

    @if (!empty($_SESSION["cart"]))
    <article class="art-address art-orders">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-right: 0;">
                    <div class="contacts-box">
                        <div class="title-box title-contacts">
                            <h3 class="title">Thông tin khách hàng</h3>
                        </div>

                        <div class="content-box contacts-content">
                            <div class="contact-box">
                                <div class="contact-content">
                                    <form class="form" action="{{ route('home.post-check-out') }}" method="POST">
                                        @csrf
                                        <div class="">
                                            <div class="form-content">
                                                <div class="form-group">
                                                    <label>Họ và tên</label>
                                                    <input class="form-control" type="text" name="hovaten" placeholder="" value="{{ old('hovaten') }}">
                                                    @if ($errors->has('hovaten'))
                                                        <span class="help-block">{{ $errors->first('hovaten') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Số điện thoại</label>
                                                    <input class="form-control" type="text" name="sodienthoai" placeholder="" value="{{ old('sodienthoai') }}">
                                                    @if ($errors->has('sodienthoai'))
                                                        <span class="help-block">{{ $errors->first('sodienthoai') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" type="text" name="email" placeholder="" value="{{ old('email') }}">
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Địa chỉ</label>
                                                    <textarea class="form-control" name="diachi" rows="5">{{ old('diachi') }}</textarea>
                                                    @if ($errors->has('diachi'))
                                                        <span class="help-block">{{ $errors->first('diachi') }}</span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <div class="button">
                                                        <a href="{{ route('home.product') }}"><i class="fal fa-chevron-double-left icon"></i>Tiếp tục mua hàng</a>
                                                        <button type="submit" title="Đặt hàng" class="btn">Đặt hàng</button>
                                                        <input type="hidden" name="tongtien" value="{{ $tongtien }}">
                                                        <input type="hidden" name="tongsoluong" value="{{ $tongsoluong }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
    @endif
@stop
@section('script')
    <script>
        var urlUpdateItem = "{{ route('home.update-cart') }}";
    </script>
@endsection