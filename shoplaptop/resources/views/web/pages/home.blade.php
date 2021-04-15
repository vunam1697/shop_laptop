@extends('web.master')
@section('main')
    <section class="banner-slider">
        <div class="item">
            <a href="" title=""><img src="{{ url('/image/banner-3.jpg') }}" alt="" title=""> </a>
        </div>
    </section>

    <section class="block-group pd-60">
        <div class="container">
            <h2 class="title">sản phẩm</h2>
            <div class="product-slider">
                @foreach ($data as $item)
                    <div class="col-md-12">
                        <div class="product-item">
                            <a href="{{ route('home.product-detail', ['slug' => $item->slug]) }}" title="{{ $item->tensp }}" class="zoom">
                                <img src="{{ url('/image/') .'/'. $item->hinhanh }}" alt="{{ $item->tenssp }}" width="250" height="250"> </a>
                            <div class="product-text">
                                <h4>
                                    <a href="{{ route('home.product-detail', ['slug' => $item->slug]) }}" title="{{ $item->tensp }}">{{ $item->tensp }}</a> 
                                </h4>
                                <div class="price">Giá: {{ number_format($item->giaban, '0', '.', '.') }} VNĐ</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mgt-50">
                <a href="{{ route('home.product') }}" title="xem tất cả" class="view-mores inflex-center-center">Xem tất cả</a> 
            </div>
        </div>
    </section>
    
    
    <section class="news-index pd-60">
        <div class="container">
            <h2 class="title">Tin tức</h2>
            <div class="row">
                @foreach ($tintuc as $item)
                    <div class="col-md-3">
                        <div class="amblog-item">
                            <div class="amblog-photo"><a href="{{ route('home.news-detail', ['slug' => $item->slug]) }}" class="zoom">
                                    <img src="{{ url('/image/news') . '/' . $item->hinhanh }}" alt="{{ $item->tentt }}">
                                </a></div>
                            <div class="amblog-detail">
                                <p class="news-date">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <span>{{ $item->created_at->format('d/m/Y') }}</span>
                                </p>
                                <h4 class="news-name"><a href="{{ route('home.news-detail', ['slug' => $item->slug]) }}">{{ $item->tentt }}</a></h4>
                                <p class="news-des">{{ $item->mota }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
@stop