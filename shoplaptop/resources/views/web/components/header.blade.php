<?php session_start()?>

<header>
    {{-- <section class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 visible-desktop">
                    <div class="header-top_left">
                        <span>Chào mừng bạn đã đến với Cho thuê máy công trình!</span>
                    </div>
                </div>
                <div class="col-md-6 flex-center-end">
                    <div class="header-top_right flex-center">
                        <div class="social">
                            <ul class="flex-center">
                                <li><a href="" title="" class="fa fa-facebook"></a> </li>
                                <li><a href="" title="" class="fa fa-youtube-play"></a> </li>
                                <li><a href="" title="" class="fa fa-twitter"></a> </li>
                                <li><a href="" title="" class="fa fa-instagram"></a> </li>
                            </ul>
                        </div>
                        <div class="flag flex-center">
                            <a href="" title="" class="vi-flg"><img src="images/vnflag.png" alt=""> </a>
                            <a href="" title="" class="en-flg"><img src="images/enflag.png" alt=""> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <section class="header-main">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="logo"><a href="index.php" title=""><img src="images/logo.png" alt="" title=""> </a> </div>
                    <div class="visible-mobile btn-showSearch"><i class="fa fa-search"></i> </div>
                    <a title="" href="#menu" class="btn-menu visible-mobile"><img src="images/bar.png" class="img-fluid" alt=""></a>
                </div>
                <div class="col-md-6 flex-center-center">
                    <div class="header-nav">
                        <ul class="flex-center-center">
                            <li><a href="{{ url('/') }}" title="trang chủ">Trang chủ</a> </li>
                            <li>
                                <a href="{{ route('home.product') }}" title="Sản phẩm">Sản Phẩm</a> 
                                @if (count($categories))
                                <ul class="sub-menu">
                                    @foreach ($categories as $item)
                                    <li>
                                        <a href="{{ route('home.product-category', ['slug' => $item->slug]) }}" title="{{ $item->tenloaisp }}">{{ $item->tenloaisp }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            <li><a href="{{ route('home.news') }}" title="Tin tức">Tin tức</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 search-mb">
                    <div class="search flex-center-center height-100">
                        <form class="flex-center-center" action="{{ route('home.search') }}" method="GET">
                            <input type="text" placeholder="Tìm kiếm ..." name="q" value="{{ request()->get('q') }}">
                            <button type="submit"><i  class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-md-1 cart-mini">
                    <a href="{{ route('home.cart') }}">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="number">
                            {{ isset($_SESSION['cart']) ? count($_SESSION["cart"]) : 0 }}
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</header>