<?php 
    require "connect.php";
    session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Shop giày TiTi</title>
    <link href="admin/Congcu/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/hover-min.css">
    <link rel="stylesheet" href="css/all_product.css">
</head>
<body>
<div class="waper_home">
<div class="header">
    <div class="header_top">
        <div id="tonghop">
            <div class="tonghop">
                <div class="logo"><a title="banner" href="index.php"><img alt="banner" title="banner" src="img/LOGO_T21.png" /></a></div>
            <!--end logo-->
        <div class="tong">
            <div class="tonghop_center">
                <div class="search">                              
                    <ul class="nav navbar-nav navbar-center">
                        <form class="navbar-form navbar-left" action="search.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="search_form" id="search" placeholder="Search..." style="width: 500px">
                            </div>
                            <button type="submit" name="btnsearch" class="btn btn-default">Submit</button>
                        </form>
                    </ul>
                </div>
                <!--end search-->
            </div>
            <div class="tonghop_right">
                <div class="box_right">
                    <a href="cart.php">
                        <img src="img/cart.png"> 
                        <strong>
                            <?php 
                                if (isset($_SESSION['cart'])){
                                    echo count($_SESSION["cart"]); 
                                }else{
                                    echo "0";
                                }
                            ?>
                        </strong> items &nbsp; | &nbsp; 
                        <strong>
                            <?php 
                                if (isset($_SESSION['cart'])) {
                                    $tongtien = 0;
                                    if (!empty($_SESSION['cart'])) {
                                        foreach ($_SESSION['cart'] as $value) {
                                            $tongtien += $value['price']*$value['sl'];
                                        }
                                    }
                                    echo number_format($tongtien);
                                }else{
                                    echo "0";
                                }
                            ?> VND
                        </strong>
                    </a>
                </div>
            </div>
            <!--end tonghop_center-->
            <div class="chuchay">
                <marquee width="100%" onmouseout="this.start()" onmouseover="this.stop()" scrollamount="4" direction="left" align="center" style="color: red; font-size: 25px">TB: Website bán giày online TiTi</marquee>
            </div>
        </div>
        <!--end tong-->
        <div style="clear: both"></div>
    </div>
    <!-- end header -->
    <div class="menu">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <div class="icon">
                    <img src="img/banner/bag-1.png" style="width: 50px;">
                </div>
                <a href="#" class="navbar-brand" style="color: red;">Titi-Shopee-Online</a>
            </div>
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="index.php" class="hvr-underline-from-center">TRANG CHỦ</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" class="hvr-underline-from-center">SẢN PHẨM
                        <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php 
                                    $sql = "SELECT * FROM category";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_array($result)) {?>
                                        <li><a href="all_product.php?cate_id=<?php echo $row['cate_id'] ?>"><?php echo $row["cate_name"] ?> </a></li>
                                    <?php
                                    }
                                 ?>
                            </ul>
                    </li>
                    <li><a href="news.php" class="hvr-underline-from-center">TIN TỨC</a></li>
                </ul>
            </div>
        </nav>        
    </div>
    <!-- end menu -->
    <div class="content">
        <div id="slider">
            <div id="slider">
                <img class="slide" src="img/anh_slide_3.jpg" style="width: 100%;height: 350px">
            </div>
        </div>
    </div>
</div>    
<!-- end header --> 
<div class="body">
    <div class="caterory">
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#"><i class="fa fa-list"> DANH MỤC SẢN PHẨM</i></a></li>
            <?php 
                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {?>
                    <li><a href="all_product.php?cate_id=<?php echo $row['cate_id'] ?>"><?php echo $row["cate_name"] ?> </a></li>
                <?php
                }
             ?>
        </ul>
        <ul class="nav nav-pills nav-stacked" style="margin-top: 30px;">
            <li class="active"><a href="#" style="padding-left: 60px"><i class="fa fa-list"> BÀI VIẾT NỔI BẬT</i></a></li>
            <div class="news">
                <ul>
                <?php 
                    $sql_new = "SELECT * FROM news";
                    $result_new = mysqli_query($conn, $sql_new);
                    while ($row_new = mysqli_fetch_array($result_new)) {?>
                            <li>
                                <a href="new_detail.php?id=<?php echo $row_new['new_id'] ?>" title="<?php echo $row_new['new_name'] ?>">
                                    <img src="new/<?php echo $row_new['new_img'] ?>" alt="<?php echo $row_new['new_name'] ?>">
                                </a>
                                <a href="new_detail.php?id=<?php echo $row_new['new_id'] ?>" title="<?php echo $row_new['new_name'] ?>"><?php echo $row_new['new_name'] ?></a>
                            </li>
                        <?php
                    }
                 ?>
                </ul>
            </div>
        </ul>
    </div>
    <div class="products">
        <div class="title_center_bottom">
        <?php
            $cate_id = $_GET["cate_id"];
            $sql_cate = "SELECT * FROM category WHERE cate_id ='$cate_id'";
            $result_cate = mysqli_query($conn, $sql_cate);
            $row_cate = mysqli_fetch_array($result_cate);
         ?>
            <span><p class="title_ct"><?php echo $row_cate["cate_name"] ?></p></span>
        </div>
        <div class="box_product" id="block">
            <?php
                $sql_product = "SELECT * FROM product WHERE p_cate = '$cate_id'";
                $result_product = mysqli_query($conn, $sql_product);
                while ($row_product = mysqli_fetch_array($result_product)) {?>
                <div class="item_product1">
                    <a class="img" href="product_detail.php?id=<?php echo $row_product["p_id"] ?> && cate_id=<?php echo $row_product['p_cate'] ?>">
                        <img src="uploads/<?php echo $row_product['p_img'] ?>" alt="<?php echo $row_product['p_name'] ?>">
                    </a>
                    <div class="name_product">
                        <a href="product_detail.php?id=<?php echo $row_product["p_id"] ?> && cate_id=<?php echo $row_product['p_cate'] ?>"><?php echo ucwords($row_product["p_name"]) ?></a></div>
                    <div class="giasi le">
                        Giá lẻ<br />
                        <span><?php echo number_format($row_product["p_price"],0,'.','.') ?> VND</span></div>
                    <div class="cart_product cart_product1">
                        <a href="giohang.php?id=<?php echo $row_product["p_id"] ?>"><img src="img/cart.png"></a>
                    </div>
                </div>
                <?php
                }
            ?>
        </div>
    </div>  
</div>
<div id="footer">
    <div class="footer-header">
        <div class="column-1">
            <div class="column-img">
                <img src="img/banner/logo-footer-1.png" style="width: 70px;"> 
            </div>
            <div class="column-text">
                <h3>7 NGÀY MIỄN PHÍ TRẢ HÀNG</h3>
                <P>trả hàng miễn phí trong 7 ngày</P>   
            </div>
        </div>
        <div class="column-1">
            <div class="column-img">
                <img src="img/banner/logo-footer-2.png">  
            </div>
            <div class="column-text">
                <h3>HÀNG CHÍNH HÃNG 100%</h3>
                <P>đảm bảo hàng chính hãng</P>  
            </div>
        </div>
        <div class="column-1">
            <div class="column-img">
                <img src="img/banner/logo-footer-3.png">  
            </div>
            <div class="column-text">
                <h3>MIỄN PHÍ VẬN CHUYỂN</h3>
            <P>giao hàng miễn phí toàn quốc</P> 
            </div>
        </div>
    </div>
    <div class="footer-main">
        <p align="center">Công ty TNHH Shopee</p>
        <p align="center">Địa chỉ: Tầng 15, Tòa nhà Petronas, 235 Nguyễn Văn Cừ, phường Nguyễn Cư Trinh, quận 1, TPHCM. Tổng đài hỗ trợ: 19001221 - Email: support@shopee.vn
        Mã số doanh nghiệp: 0106773786 do Sở Kế hoạch & Đầu tư TP Hà Nội cấp lần đầu ngày 10/02/2015
        © 2015 - Bản quyền thuộc về Công ty TNHH Shopee</p>
    </div>
</div>
</div>

<script src="admin/Congcu/vendors/jquery/dist/jquery.min.js"></script>
<script src="admin/Congcu/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="style.js"></script>
</body>
</html>