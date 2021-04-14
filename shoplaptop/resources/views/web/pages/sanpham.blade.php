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
                                @if (!empty($slug))
                                    <h1>{{ $category->tenloaisp }}</h1>
                                @elseif (!empty($q))
                                    <h1>Từ khóa tìm kiếm: {{ $q }}</h1>
                                @else
                                    <h1>sản phẩm</h1>
                                @endif
                            </div>
                            @if (count($data))
                            <div class="list-content">
                                <div class="row">
                                    @foreach ($data as $item)
                                    <div class="col-md-4">
                                        <div class="product-item">
                                            <a href="{{ route('home.product-detail', ['slug' => $item->slug]) }}" title="{{ $item->tensp }}" class="zoom">
                                                <img src="{{ url('/image/') .'/'. $item->hinhanh }}" alt="" width="250px" height="200px"> 
                                            </a>
                                            <div class="product-text text-left">
                                                <h4><a href="{{ route('home.product-detail', ['slug' => $item->slug]) }}}" title="{{ $item->tensp }}">{{ $item->tensp }}</a> </h4>
                                                <div class="price">Giá: {{ number_format($item->giaban, 0, '.', '.') }} VNĐ</div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                {{-- Phân trang --}}
                                {{ $data->links('web.components.panigation') }}
                            </div>
                            @else
                            <div class="alert alert-success text-center" role="alert">
                                Sản phẩm đang cập nhật
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop