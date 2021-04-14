<div class="sidebar-left sticky-top">
    <div class="sidebar-cate">
        <h2><span>DANH MỤC SẢN PHẨM</span></h2>
        <div class="cate-list">
            @foreach ($categories as $item)
            <div class="cate-item">
                <div class="cate-cap">
                    <a href="{{ route('home.product-category', ['slug' => $item->slug]) }}" 
                        title="{{ $item->tenloaisp }}">{{ $item->tenloaisp }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>