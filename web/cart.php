<?php 
    require "connect.php";
    session_start();
    if (isset($_GET["id"]) && isset($_GET["sl"])) {
        // update giỏ hàng
        $sql = "SELECT * FROM product WHERE p_id= ".$_GET["id"];
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_row($result);
        $sl = $data[4];
        if ($_GET['sl'] > $sl) {
            
        }
        else if ($_GET["sl"] > 0) {
            $_SESSION["cart"][$_GET["id"]]=array(
                "sl"=>$_GET["sl"],
                "price"=>$data[6],
                "soluong"=>$data[4],
                "masp"=>$data[0],
                "name"=>$data[2],
                "image"=>$data[5]
            );
        }else{
            unset($_SESSION["cart"][$_GET["id"]]);
        }
        
    }
    if (isset($_GET["id"]) && isset($_GET["action"])) {
        unset($_SESSION["cart"][$_GET["id"]]);
    }
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
    <link rel="stylesheet" href="css/cart.css">

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
                    <li><a href="index.php">TRANG CHỦ</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">SẢN PHẨM
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
                    <li><a href="news.php">TIN TỨC</a></li>
                </ul>
            </div>
        </nav>        
    </div>
    <!-- end menu -->
</div>    
<!-- end header -->
<div class="body">
    <div class="caterory">
        <!-- Danh mục sản phẩm -->
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
        <!-- Bài viết tin tức -->
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
    <!-- sản phẩm -->
    <div class="products">
        <div class="title_center_bottom">
            <span><p class="title_ct">GIỎ HÀNG CỦA BẠN</p></span>
        </div>
        <div class="box_center_main">
                    <table class="table table-bordered" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Ảnh</th>
                                <th>Đơn Giá</th>
                                <th>Số Lượng</th>
                                <th>Thành tiền</th>
                                <th>Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                        <?php
                        $total = 0;
                        if (!empty($_SESSION["cart"])) {
                            
                            $i = 0;
                            foreach ($_SESSION["cart"] as $key => $value) {
                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td style="width: 20%;">
                                    <?php echo ucwords($_SESSION["cart"][$key]['name']) ?>
                                </td>
                                <td style="width: 20%;">
                                    <img src="uploads/<?php echo $_SESSION["cart"][$key]['image'] ?>" style="width: 150px;height: 150px">
                                </td>
                                <td style="width: 20%;">
                                    <?php echo number_format($_SESSION["cart"][$key]['price'],0,'.','.') ?>
                                </td>
                                <td style="width: 10%;">
                                    <input style="width: 50px; text-align: center; margin-bottom: 3px" type="text" min="1" name="qty_<?php echo $key ?>" id="qty_<?php echo $key ?>" value="<?php echo $_SESSION["cart"][$key]['sl'] ?>">
                                </td>
                                <td style="width: 10%;">
                                    <?php 
                                        echo number_format(($_SESSION["cart"][$key]['sl']) * $_SESSION["cart"][$key]['price'],0,'.','.');
                                        $total += ($_SESSION["cart"][$key]['sl']) * $_SESSION["cart"][$key]['price'];
                                    ?>
                                </td>
                                <td style="width: 20%;">
                                    <a href="javascript:void(0)" onclick="updateItem(<?php echo $key ?>)" class="btn btn-xs btn-info updatecart"><i class="fa fa-refresh" name="btnUpdate"></i> Sửa</a>
                                    <a href="javascript:void(0)" onclick="deleteItem(<?php echo $key ?>)" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i> Xóa</a>
                                </td>
                            </tr>
                            <?php 
                                }
                            }
                            else{
                                echo "<p style='color: red; font-size: 16px'>Không có sản phẩm nào!</p>";
                            }
                        ?>
                        <tr>
                            <td colspan="5">Tổng tiền</td>
                            <td colspan="2"><?php echo number_format($total); ?></td>
                        </tr>
                       <!--  <tr>
                            <td colspan="7"><a href="checkout.php" class="btn btn-primary">Thanh Toán Đơn Hàng</a></td>
                        </tr> -->
                        </tbody>
                    </table>
                    <script type="text/javascript">
                        function updateItem(id){
                            sl = $("#qty_"+id).val();
                            $.get("cart.php?id="+id+"&sl="+sl,function(data){
                                location.reload();
                            });
                        }
                        function deleteItem(id){
                            $.get("cart.php?id="+id+"&action=del",function(data){
                                location.reload();
                            });
                        }
                    </script>
        </div>
        <?php
            $hoten = "";
            $email = "";
            $address = "";
            $phone = "";
            if (isset($_POST["ThanhToan"])) {
                $hoten = isset($_POST["hoten"])?$_POST["hoten"]:"";
                $email = isset($_POST["email"])?$_POST["email"]:"";
                $address = isset($_POST["address"])?$_POST["address"]:"";
                $phone = isset($_POST["telephone"])?$_POST["telephone"]:"";

                $insert_order = 'INSERT INTO orders(id,user_fullname,email,address,phone,createdate)
                            VALUES(0,"'.$hoten.'","'.$email.'","'.$address.'","'.$phone.'","'.date("Y-m-d").'")';

                $sql_order = mysqli_query($conn, $insert_order);

                

                $select = "SELECT * FROM orders ORDER BY id DESC LIMIT 0,1";
                $query = mysqli_query($conn, $select);
                $row = mysqli_fetch_array($query);
               
                $insert = "INSERT INTO order_detail VALUES";
                if (!empty($_SESSION["cart"])) {
                    foreach ($_SESSION["cart"] as $key => $value) {
                        $product_id = $key;
                        $quantity = $_SESSION["cart"][$key]["sl"];
                        $price = $_SESSION["cart"][$key]["price"];

                        $insert .= '(0,"'.$row["id"].'","'.$product_id.'","'.$quantity.'","'.$price.'","'.$row["createdate"].'"),';
                    }
                    $insert = substr($insert, 0, strlen($insert) - 1);
                    
                }
                mysqli_query($conn, $insert);
                if (!empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        $masp = $_SESSION['cart'][$key]['masp'];
                        $sl = $_SESSION['cart'][$key]['sl'];
                        $soluong = $_SESSION['cart'][$key]['soluong'];
                        $tsl = $soluong - $sl;
                        $update = "UPDATE product SET p_number='$tsl' WHERE p_id='$masp'";
                        mysqli_query($conn, $update);
                    }
                }
                unset($_SESSION["cart"]);
                header('location: index.php');
            }
         ?>
        <?php 
            if (!empty($_SESSION["cart"])) {?>
                <div class="box_center_bottom">
                    <h3 style="color: red">Thông tin thanh toán</h3>
                    <form accept="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Họ Tên*</label>
                            <input type="text" class="form-control" name="hoten" placeholder="Họ và Tên" style="width: 400px">
                        </div>
                        <div class="form-group">
                            <label>Email*</label>
                            <input type="text" placeholder="Email của bạn" class="form-control" name="email" style="width: 400px">
                        </div4
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Address" style="width: 400px">
                        </div>
                        <div class="form-group">
                            <label>Telephone</label>
                            <input type="text" class="form-control" name="telephone" placeholder="Telephone" style="width: 400px">
                        </div>
                        <button type="submit" class="btn btn-primary" name="ThanhToan">Thanh Toán</button>
                    </form>
                </div>
            <?php

            }
         ?>
    </div>
</div>
<!-- Footer -->
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