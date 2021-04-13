<?php 
    use App\Models\User;
    $value = session()->get('login');
?>
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>Danh mục chung</h3>
        <ul class="nav side-menu">
            <li>
                <a href="{{url('/admin/home')}}"><i class="fa fa-home"></i>Trang chủ </a>
            </li>

            <li>
                <a><i class="fa fa-edit"></i>Quản lý sản phẩm <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{url('/admin/product')}}">Danh sách </a></li>
                    <li><a href="{{route('saveProduct.index')}}"> Thêm </a></li>
                </ul>
            </li>
            <li>
                <a><i class="fa fa-edit"></i>Quản lý danh mục <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="product/classify-product.php">Danh sách danh mục sản phẩm </a></li>
                    <li><a href="thucthi/add-classify.php">Thêm </a></li>
                </ul>
            </li>
            <!-- <li>
                <a><i class="fa fa-edit"></i>Quản lý tin tức <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="product/list_news.php">Danh sách tin tức </a></li>
                    <li><a href="thucthi/add_news.php">Thêm </a></li>
                </ul>
            </li> -->
            <li>
                <a><i class="fa fa-edit"></i>Quản lý đơn hàng <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{url('/admin/order')}}">Danh sách </a></li>
                </ul>
            </li>

            @if($value->isAdmin==1)
                <li>
                    <a><i class="fa fa-desktop"></i>Quản lý người dùng  <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{route('user.index')}}">Danh sách  </a></li>
                        <li><a href="{{route('saveUser.index')}}"> Thêm </a></li>
                    </ul>
                </li>
            @endif
           
        </ul>
    </div>
</div>