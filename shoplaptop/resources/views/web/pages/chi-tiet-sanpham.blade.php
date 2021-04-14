@extends('web.master')
@section('main')
    <section class="banner-top">
		<div class="banner-photo">
			<img src="images/service-bn.png" alt="">
		</div>
	</section>
	<section class="product-detail">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
                    @include('web.components.category')
                </div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-6">
                            <div class="product-image-gallery">
                                <?php if(!empty($data->thuvienanh)){
                                    $more_image = json_decode($data->thuvienanh);
                                } ?>
                                <div class="slider-for">
                                    <div class="carousel-item">
                                        <img src="{{ url('/image/') .'/'. $data->hinhanh }}" class="img-fluid" width="100%" alt="Third slide">
                                    </div>
                                    @if (!empty($more_image))
                                        @foreach ($more_image as $item)
                                        <div class="carousel-item">
                                            <img src="{{ url('/image/') .'/'. $item }}" class="img-fluid" width="100%" alt="Third slide">
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="slider-nav">
                                    <div class="clc">
                                        <div class="item">
                                            <img class="" src="{{ url('/image/') .'/'. $data->hinhanh }}" width="100%" alt="Third slide">
                                        </div>
                                    </div>
                                    @if (!empty($more_image))
                                        @foreach ($more_image as $item)
                                        <div class="clc">
                                            <div class="item"><img class="" src="{{ url('/image/') .'/'. $item }}" width="100%" alt="Third slide"></div>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
						</div>
						<div class="col-md-6">
							<div class="product-info-main">
                                <form action="{{ route('home.post-add-cart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="qty" name="soluong" value="1">
                                    <input type="hidden" name="id_sanpham" value="{{ $data->id }}">
                                    <h1 class="title-wrapper">{{ $data->tensp }}</h1>
                                    <div class="atrr-overview">
                                        <div class="price-wrapper">Giá: <span class="price">{{ number_format($data->giaban, '0', '.', '.') }} VNĐ</span></div>
                                    </div>
                                    <p class="product-detail-desc">Mô tả: </p>
                                    <p class="product-detail-info">{{ $data->mota }}</p>
                                    <div class="product-option">
                                        <button type="submit" class="tocart btn-general">ĐẶT HÀNG</button>
                                    </div>
                                </form>
							</div>
						</div>
					</div>
					<div class="product-tab">
						<ul class="nav nav-tabs nav-tabs-start" id="navTab" role="tabblist">
						  <li class="nav-item">
						    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">NỘI DUNG</a>
						  </li>
						  <li class="nav-item">
						    <a class="nav-link" id="specification-tab" data-toggle="tab" href="#specification" role="tab" aria-controls="specification" aria-selected="false">THÔNG SỐ KỸ THUẬT</a>
						  </li>
						</ul>
						<div class="tab-content" id="navTabContent">
						  <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
						  	<div class="tab-detail">
						  		{!! $data->noidung !!}
						  	</div>
						  </div>
						  <div class="tab-pane fade" id="specification" role="tabpanel" aria-labelledby="specification-tab">
						  	<div class="tab-detail">
						  		<ul class="parameter">
                                    @if (!empty($data->cpu))
                                    <li>
                                        <span>CPU: </span>
                                        <div>
                                            {{ $data->cpu }}
                                        </div>
                                    </li>
                                    @endif
                                    @if (!empty($data->ram))
                                    <li>
                                        <span>Ram: </span>
                                        <div>
                                            {{ $data->ram }}
                                        </div>
                                    </li>
                                    @endif
                                    @if (!empty($data->ocung))
                                    <li>
                                        <span>Ổ cứng: </span>
                                        <div>
                                            {{ $data->ocung }}
                                        </div>
                                    </li>
                                    @endif
                                    @if (!empty($data->carddohoa))
                                    <li>
                                        <span>Card đồ họa: </span>
                                        <div>
                                            {{ $data->carddohoa }}
                                        </div>
                                    </li>
                                    @endif
                                    @if (!empty($data->manhinh))
                                    <li>
                                        <span>Màn hinh: </span>
                                        <div>
                                            {{ $data->manhinh }}
                                        </div>
                                    </li>
                                    @endif
                                    @if (!empty($data->trongluong))
                                    <li>
                                        <span>Trọng lượng: </span>
                                        <div>
                                            {{ $data->trongluong }}
                                        </div>
                                    </li>
                                    @endif
                                    @if (!empty($data->mausac))
                                    <li>
                                        <span>Màu sắc: </span>
                                        <div>
                                            {{ $data->mausac }}
                                        </div>
                                    </li>
                                    @endif
                                    @if (!empty($data->kichthuoc))
                                    <li>
                                        <span>Kích thước: </span>
                                        <div>
                                            {{ $data->kichthuoc }}
                                        </div>
                                    </li>
                                    @endif
                                </ul>
						  	</div>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    @if (count($product_same_category))
    <section class="pro-related">
        <div class="container">
            <h2 class="title font-30">sản phẩm liên quan</h2>
            <div class="pro-related-box">
                <div class="row">
                    @foreach ($product_same_category as $item)
                    <div class="col-md-3">
                        <div class="product-item">
                            <a href="{{ route('home.product-detail', ['slug' => $slug]) }}" 
                                title="{{ $item->tensp }}" class="zoom"><img src="{{ url('/image/') .'/'. $item->hinhanh }}" alt="{{ $item->tensp }}"> </a>
                            <div class="product-text">
                                <h4><a href="{{ route('home.product-detail', ['slug' => $slug]) }}" title="{{ $item->tensp }}" class="text-left">{{ $item->tensp }}</a> </h4>
                                <div class="price text-left">Giá: {{ number_format($item->giaban, '0', '.', '.') }} VNĐ</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
@stop