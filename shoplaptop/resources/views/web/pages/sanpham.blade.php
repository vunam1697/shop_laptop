@extends('web.master')
@section('main')
<section class="banner-top">
		<div class="banner-photo">
			<img src="images/bn-pj.png" alt="">
		</div>
	</section>
    <section class="product-cate pd-60">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    @include('web.components.category')
                </div>
                <div class="col-md-8">
                    <div class="cate-content">
                        <div class="product-list">
                            <div class="pro-title flex-center-between">
                                <h1>sản phẩm</h1>
                                <!-- <div class="sort flex-center-end">
                                    <span>Sắp xếp:</span>
                                    <div class="sidebar-dropdown">
                                        <div class="current-select">Mới nhất</div>
                                        <div class="dropdown-select">
                                            <ul>
                                                <li><a href="" title="">Cũ nhất</a></li>
                                                <li><a href="" title="">Chiều cao từ thấp tới cao</a></li>
                                                <li><a href="" title="">Tải trọng từ thấp tới cao</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="list-content">
                                <div class="row">
                                    @foreach ($data as $item)
                                    <div class="col-md-4">
                                        <div class="product-item">
                                            <a href="product-detail.php" title="" class="zoom"><img src="{{ url('/image/') .'/'. $item->hinhanh }}" alt=""> </a>
                                            <div class="product-text text-left">
                                                <h4><a href="product-detail.php" title="">{{ $item->tensp }}</a> </h4>
                                                <div class="price">Giá: {{ number_format($item->giaban, 0, '.', '.') }} VNĐ</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop