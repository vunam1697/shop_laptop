@extends('web.master')
@section('main')
<?php session_start(); ?>
    <article class="art-address art-carts">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="contacts-box">
                        <div class="title-box title-carts">
                            <h3 class="title">Thông tin dơn hàng</h3>
                        </div>
                        <div class="contents-box carts-box">
                            <div class="contents">
                                <div class="table-content">
                                    <table>
                                        <tr class="title-table">
                                            <th class="center">STT</th>
                                            <th class="center">Sản phẩm</th>
                                            <th class="center">Giá</th>
                                            <th class="center">Số lượng</th>
                                            <th class="center">Tổng tiền</th>
                                            <th class="center">Xóa</th>
                                        </tr>
                                        @if (!empty($_SESSION["cart"]))
                                        <tr class="content-table">
                                            <td class="center title">1</td>
                                            <td class="center">
                                                <div class="product-box">
                                                    <div class="product-image">
                                                        <a href="product-detail.php" title="Product">
                                                            <img src="assets/images/pr-02.jpg" alt="Product">
                                                        </a>
                                                    </div>

                                                    <h4 class="product-name">
                                                        <a href="product-detail.php" title="Product">
                                                            Hạt cation trong lọc nước
                                                        </a>
                                                    </h4>
                                                </div>
                                            </td>
                                            <td class="center">
                                                <div class="price-box">
                                                    <div class="price">
                                                        7.000.000đ
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="center">1</td>
                                            <td class="center">
                                                <div class="price-box">
                                                    <div class="price">
                                                        7.000.000đ
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="center">
                                                <a href="#" class="remove"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        @endif
                                    </table>

                                    <div class="total-box">
                                        <span>Tổng:</span>
                                        <span>21.000.000đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
@stop