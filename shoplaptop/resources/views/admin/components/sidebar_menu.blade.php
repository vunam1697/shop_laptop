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
                    <li><a href="{{url('/admin/product')}}">Danh sách sản phẩm </a></li>
                    <li><a href="thucthi/add-product.php">Thêm </a></li>
                </ul>
            </li>
            <li>
                <a><i class="fa fa-edit"></i>Quản lý danh mục <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="product/classify-product.php">Danh sách danh mục sản phẩm </a></li>
                    <li><a href="thucthi/add-classify.php">Thêm </a></li>
                </ul>
            </li>
            <li>
                <a><i class="fa fa-edit"></i>Quản lý tin tức <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="product/list_news.php">Danh sách tin tức </a></li>
                    <li><a href="thucthi/add_news.php">Thêm </a></li>
                </ul>
            </li>
            <li>
                <a href="orders.php"><i class="fa fa-desktop"></i>Hóa Đơn </a>
            </li>
            <li>
                <a href="user.php"><i class="fa fa-desktop"></i>Quản lý người dùng </a>
            </li>
        </ul>
    </div>
</div>