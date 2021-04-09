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
    <link rel="stylesheet" href="css/product_detail.css">
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
    <div class="content_product">
        <div class="breadcrumb-line">
            <?php
                $id = $_GET['id'];
                $cate_id = $_GET['cate_id'];
                $sql_product = "SELECT * FROM product,category WHERE p_id ='$id' AND cate_id='$cate_id'";
                $result_product = mysqli_query($conn, $sql_product);
                $row_product = mysqli_fetch_array($result_product);
             ?>
            <ul class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-home"></i>Trang chủ</a></li>
                <li><a href="all_product.php?cate_id=<?php echo $row_product['cate_id'] ?>"><?php echo $row_product["cate_name"] ?></a></li>
                <li class="active"><?php echo ucwords($row_product["p_name"]) ?></li>
            </ul>
        </div>
        <div class="product_info">
        <?php 
            $sql_product = "SELECT * FROM product WHERE p_id =".$_GET['id'];
            $result_product = mysqli_query($conn, $sql_product);
            $row_product = mysqli_fetch_array($result_product);
         ?>
            <div class="left_detail">
                    <div class="ad-image">
                        <img src="uploads/<?php echo $row_product["p_img"] ?>" style="width: 406px;height: 270px;top: 25px;left: 0px">
                    </div>
            </div>
            <div class="right_detail">
                <h2 style="padding: 0px 0px 10px !important;"><?php echo ucwords($row_product["p_name"]) ?></h2>
                <div class="thuonghieu">
                    <span class="th_left">Mã hàng: </span>
                    <span class="th_right">
                        <div style="font-weight: bold;color: red">
                            <?php echo $row_product["p_mahang"] ?>
                        </div>
                    </span>
                    <span class="th_left">Số lượng: </span>
                    <span class="th_right">
                        <input type="text" name="qty" id="qty" class="qty" size="10" value="1">
                    </span>
                    <input type="hidden" name="pp" id="pp" size="10" value="1">
                </div>
                <div class="thuonghieu list_color">
                    <span class="th_left">Màu sắc: </span>
                    <span class="th_right">
                        <div style="font-weight: bold;color: gray">
                            Nhiều màu
                        </div>
                    </span>
                </div>
                <div class="thuonghieu">
                    <span style="font-size: 35px;color: #d40000">
                        <b><?php echo number_format($row_product["p_price"],0,'.','.') ?> VNĐ</b>
                    </span>
                </div>
                <div class="add_cart">
                    <a href="giohang.php?id=<?php echo $row_product['p_id'] ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> ĐẶT HÀNG</a>
                </div>
            </div>
        </div>
        <div class="content_detail">
            <div class="title_content_detail">THÔNG TIN CHI TIẾT</div>
            <div class="box_detail">
            <?php 
                $sql_product = "SELECT * FROM product WHERE p_id =".$_GET['id'];
                $result_product = mysqli_query($conn, $sql_product);
                $row_product = mysqli_fetch_array($result_product);

                echo $row_product["p_describe"];
            ?>
            </div>
            <div class="title_content_detail">CÁC SẢN PHẨM KHÁC</div>
            <div class="box_product" style="margin-top: 15px">
                <?php
                        $id = $_GET['id'];
                        $cate_id = $_GET['cate_id'];
                        $sql_product = "SELECT * FROM product WHERE p_cate ='$cate_id' AND p_id !='$id'";
                        $result_product = mysqli_query($conn, $sql_product);
                        while ($row_product = mysqli_fetch_array($result_product)) {?>
                        <div class="item_product1">
                            <a class="img" href="product_detail.php?id=<?php echo $row_product["p_id"] ?> && cate_id=<?php echo $row_product['p_cate'] ?>">
                                <img src="uploads/<?php echo $row_product['p_img'] ?>" alt="<?php echo $row_product["p_name"] ?>">
                            </a>
                            <div class="name_product">
                                <a href="product_detail.php?id=<?php echo $row_product["p_id"] ?> && cate_id=<?php echo $row_product['p_cate'] ?>"><?php echo ucwords($row_product["p_name"]) ?></a></div>
                            <div class="giasi le">
                                Giá lẻ<br />
                                <span><?php echo number_format($row_product["p_price"],0,'.','.') ?> VND</span></div>
                            <div class="cart_product cart_product1">
                                <a href="product_detail.php?id=<?php echo $row_product["p_id"] ?> && cate_id=<?php echo $row_product['p_cate'] ?>"><img src="img/cart.png"></a>
                            </div>
                        </div>
                    <?php
                    }
                ?>
            </div>
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