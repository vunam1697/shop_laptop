@extends('web.master')
@section('main')
    <!-- <section class="banner-slider">
        <div class="item"><a href="" title=""><img src="images/banner.png" alt="" title=""> </a></div>
        <div class="item"><a href="" title=""><img src="images/banner.png" alt="" title=""> </a></div>
        <div class="item"><a href="" title=""><img src="images/banner.png" alt="" title=""> </a></div>
    </section>
    <section class="about-index pd-60 block-gray">
        <div class="container">
            <h2 class="title">Về chúng tôi</h2>
            <div class="row">
                <div class="col-md-6">
                    <a href="about-us.php" title="" class="zoom"><img src="images/about-1.png" alt=""> </a>
                </div>
                <div class="col-md-6">
                    <div class="about-text">
                        <h3>Chào mừng bạn đã đến với Cho thuê máy công trình!</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset ...</p>
                        <a href="about-us.php" title="" class="link-plus">Xem thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <section class="block-group pd-60">
        <div class="container">
            <h2 class="title">sản phẩm</h2>
            <div class="product-slider">
                @foreach ($data as $item)
                    <div class="col-md-12">
                        <div class="product-item">
                            <a href="{{ route('home.product-detail', ['slug' => $item->slug]) }}" title="{{ $item->tensp }}" class="zoom">
                                <img src="{{ url('/image/') .'/'. $item->hinhanh }}" alt="{{ $item->tenssp }}"> </a>
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
            <h2 class="title">Tin tức nổi bật</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="amblog-item">
                        <div class="amblog-photo"><a href="news-detail.php" class="zoom">
                                <img src="images/news.png" alt="">
                            </a></div>
                        <div class="amblog-detail">
                            <p class="news-date">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <span>11/05/2020</span>
                            </p>
                            <h4 class="news-name"><a href="news-detail.php">Máy bóc mặt đường Dynapac: sự lựa chọn đúng đắn</a></h4>
                            <p class="news-des">Lorem Ipsum is simply dummy text of the dard larised in the 1960s with the Letraset sheets containing...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="amblog-item">
                        <div class="amblog-photo"><a href="news-detail.php" class="zoom">
                                <img src="images/news2.png" alt="">
                            </a></div>
                        <div class="amblog-detail">
                            <p class="news-date">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <span>11/05/2020</span>
                            </p>
                            <h4 class="news-name"><a href="news-detail.php">Máy bóc mặt đường Dynapac: sự lựa chọn đúng đắn</a></h4>
                            <p class="news-des">Lorem Ipsum is simply dummy text of the dard larised in the 1960s with the Letraset sheets containing...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="amblog-item">
                        <div class="amblog-photo"><a href="news-detail.php" class="zoom">
                                <img src="images/news3.png" alt="">
                            </a></div>
                        <div class="amblog-detail">
                            <p class="news-date">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <span>11/05/2020</span>
                            </p>
                            <h4 class="news-name"><a href="news-detail.php">Máy bóc mặt đường Dynapac: sự lựa chọn đúng đắn</a></h4>
                            <p class="news-des">Lorem Ipsum is simply dummy text of the dard larised in the 1960s with the Letraset sheets containing...</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="amblog-item">
                        <div class="amblog-photo"><a href="news-detail.php" class="zoom">
                                <img src="images/news4.png" alt="">
                            </a></div>
                        <div class="amblog-detail">
                            <p class="news-date">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                <span>11/05/2020</span>
                            </p>
                            <h4 class="news-name"><a href="news-detail.php">Máy bóc mặt đường Dynapac: sự lựa chọn đúng đắn</a></h4>
                            <p class="news-des">Lorem Ipsum is simply dummy text of the dard larised in the 1960s with the Letraset sheets containing...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@stop