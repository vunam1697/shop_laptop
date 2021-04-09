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
    <link rel="stylesheet" href="css/new_detail.css">
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
                <!-- <ul class="nav navbar-nav navbar-right">
                    <?php 
                        if (empty($_SESSION["username"])) {?>
                            <li class="account-login"><a href="login.php" class="hvr-underline-from-center"><i class="fa fa-user"></i> Đăng nhập </a></li>
                            <li class="account-register"><a href="register.php" class="hvr-underline-from-center"><i class="fa fa-key"></i> Đăng ký </a></li>
                        <?php
                        }else{?>
                            <li>
                                <a href="#">
                                    <?php 
                                        $sql = "SELECT * FROM user WHERE username='".$_SESSION["username"]."' ";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_array($result);
                                        echo $row["fullname"];
                                    ?>
                                </a>
                            </li>
                            <li class="logout">
                                <a href="logout.php" class="hvr-underline-from-center"><i class="fa fa-sign-in"></i> Logout</a>
                            </li>
                        <?php
                        }
                    ?> 
                </ul> -->
            </div>
        </nav>        
    </div>
</div>    
<!-- end header --> 
<div class="body">
    <div class="caterory">
        <ul class="nav nav-pills nav-stacked">
            <li class="active"><a href="#"><i class="fa fa-list"> DANH MỤC SẢN PHẨM</i></a></li>
            <?php 
                $sql_cate = "SELECT * FROM category";
                $result_cate = mysqli_query($conn, $sql_cate);
                while ($row = mysqli_fetch_array($result_cate)) {?>
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
    <div class="content_new">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-home"></i>Trang chủ</a></li>
                <li class="active">TIN TỨC</li>
            </ul>
        </div>
        <div class="new_info">
            <div class="box_detail">
                <div class="server_home" id="server_home">
                <?php 
                    $sql_new = "SELECT * FROM news WHERE new_id =".$_GET["id"];
                    $result_new = mysqli_query($conn, $sql_new);
                    $row = mysqli_fetch_array($result_new);
                 ?>
                    <h1 class="newstitledt" style="font-size: 20px;margin: 10px 0"><?php echo $row["new_name"] ?></h1>
                    <div class="contentnewstt">
                        <p align="justify"><?php echo $row["new_describe"] ?></p>
                        <p style="text-align: center;">
                            <img src="new/<?php echo $row['new_img'] ?>" width="50%" >
                        </p>
                        <p style="text-align: center;">
                            <span id="title">
                                <span style="font-size: 11pt; font-family: 'Times New Roman'; background-color: transparent;font-style: italic;vertical-align: baseline;white-space: pre-wrap;">
                                    <?php echo $row["new_title"] ?>
                                </span>
                            </span>
                        </p>
                        <p align="justify"><?php echo $row["new_describe_1"] ?></p>
                        <p style="text-align: center;">
                            <img src="new/<?php echo $row['new_img_1'] ?>" width="50%">
                        </p>
                        <p style="text-align: center;">
                            <span id="title">
                                <span style="font-size: 11pt; font-family: 'Times New Roman'; background-color: transparent;font-style: italic;vertical-align: baseline;white-space: pre-wrap;">
                                    <?php echo $row["new_title_1"] ?>
                                </span>
                            </span>
                        </p>
                        <p align="justify"><?php echo $row["new_describe_2"] ?></p>
                    </div>
                </div>
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