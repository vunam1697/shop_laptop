<?php 
    require "../connect.php";
    session_start();
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <!-- Bootstrap -->
    <link href="../Congcu/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="../Congcu/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!-- NProgress -->
    <link href="../Congcu/vendors/nprogress/nprogress.css" rel="stylesheet" />
    <!-- iCheck -->
    <link href="../Congcu/vendors/iCheck/skins/flat/green.css" rel="stylesheet" />
    <!-- bootstrap-progressbar -->
    <link href="../Congcu/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" />
    <!-- JQVMap -->
    <link href="../Congcu/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../Congcu/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

    <!-- Custom Theme Style -->
    <link href="../Congcu/build/css/custom.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../css/add-item.css">

</head>
<body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.html" class="site_title"><i class="fa fa-paw"></i><span>Admin</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <?php
                                $sql = "SELECT * FROM user WHERE username='".$_SESSION["username"]."' ";
                                $result = mysqli_query($conn, $sql);
                                $row_img = mysqli_fetch_array($result);
                            ?>
                            <div class="profile_pic">
                                <img src="../image/<?php echo $row_img['img'] ?>" alt="..." class="img-circle profile_img" />
                            </div>
                            <div class="profile_info">
                                <span>Welcome,</span>
                                <h2>
                                    <?php 
                                            if (!empty($_SESSION["username"])) {
                                                $sql = "SELECT * FROM user WHERE username='".$_SESSION["username"]."' ";
                                                $result = mysqli_query($conn, $sql);
                                                $row = mysqli_fetch_array($result);
                                                echo $row["fullname"];
                                            } 
                                        ?>
                                </h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>General</h3>
                                <ul class="nav side-menu">
                                    <li><a href="../index.php"><i class="fa fa-home"></i>Trang chủ </a>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i>Quản lý giày <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="../product/list-product.php">Danh sách sản phẩm </a></li>
                                            <li><a href="add-product.php">Thêm </a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i>Quản lý loại giày <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="../product/classify-product.php">Danh sách sản phẩm </a></li>
                                            <li><a href="add-classify.php">Thêm </a></li>
                                        </ul>
                                    </li>
                                     <li>
                                        <a><i class="fa fa-edit"></i>Quản tin tức <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="product/list_news.php">Danh sách tin tức </a></li>
                                            <li><a href="add_news.php">Thêm </a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="../orders.php"><i class="fa fa-desktop"></i>Hóa Đơn </a>
                                    </li>
                                    <li><a href="../user.php"><i class="fa fa-desktop"></i>Quản lý người dùng </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->                        
                    </div>
                </div>
                
                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="../images/img.jpg" alt="" /> 
                                        <?php 
                                            if (!empty($_SESSION["username"])) {
                                                $sql = "SELECT * FROM user WHERE username='".$_SESSION["username"]."' ";
                                                $result = mysqli_query($conn, $sql);
                                                $row = mysqli_fetch_array($result);
                                                echo $row["fullname"];
                                            } 
                                        ?>
                    <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="javascript:;">Profile</a></li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="badge bg-red pull-right">50%</span>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li><a href="javascript:;">Help</a></li>
                                        <li><a href="../logout.php"><i class="fa fa-sign-out pull-right"></i>Log Out</a></li>
                                    </ul>
                                </li>

                                <li role="presentation" class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">1</span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                        <li>
                                            <a>
                                                <span class="image">
                                                    <img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>Vu Nam</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="text-center">
                                                <a>
                                                    <strong>See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->
                <script type="text/javascript"></script>
                <!-- page content -->
                <div class="right_col" role="main">
                    <!-- top tiles -->
                    <div class="page-header">
                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><a href="../index.php"><i class="icon-home2 posision-left"></i>Trang chủ</a></li>
                                <li><a href="../product/list-product.php">Quản lý giày</a></li>
                                <li class="active">Update</li>
                            </ul>
                        </div>
                        <!-- code php-->
                        <?php 
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM product WHERE p_id = ".$id;
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($result);

                            if (isset($_POST['cmd'])) {
                                if (empty($_POST['CourseName']) || empty($_POST['classify']) || empty($_POST['CoursePrice']) || empty($_POST['CourseNumber']) || empty($_FILES['CourseImg']['name'])) {
                                    echo '<script>alert("Vui long khong de trong"); </script>';
                                } else{
                                    $name = $_POST['CourseName'];
                                    $classify = $_POST['classify'];
                                    $price = $_POST['CoursePrice'];
                                    $number= $_POST['CourseNumber'];
                                    $img= $_FILES['CourseImg']['name'];
                                    $describe= $_POST['Courseckeditor'];
                                    if ($row['p_name'] == $name && $row['p_cate'] == $classify && $row['p_price'] == $price && $row['p_number'] == $number && $row['p_img'] == $img && $row['p_describe'] == $describe) {
                                        
                                        
                                    }else{
                                        $update = "UPDATE product SET p_name='$name',p_cate='$classify',p_price='$price',p_number='$number',p_img='$img',p_describe='$describe' WHERE p_id=".$id;
                                        $result1 = mysqli_query($conn, $update);
                                        
                                        if ($result1) {
                                            echo "<script>alert('Bạn sửa thành công!');</script>";
                                            
                                        }
                                    }
                                }
                            }
                         ?>
                         <!-- end code php-->

                        <div class="content">
                            <form id="add-form" action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">Cập nhật sản phẩm</h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="col-sm-12">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label for="reg_input_name" class="req">Mã sản phẩm</label>
                                                            <input class="form-control" value="<?php echo $row['p_id'] ?>" name="CourseId" readonly="readonly" type="text" style='width: 400px'/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="reg_input_name" class="req">Tên sản phẩm </label>
                                                            <input class="form-control" value="<?php echo $row['p_name'] ?>" name="CourseName" type="text" style='width: 400px'/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="reg_input_name">Loại sản phẩm </label>
                                                            <select class="form-control" name="classify" style='width: 400px'>
                                                                <?php
                                                                    if (isset($_GET['id'])) {
                                                                        $id = $_GET['id'];
                                                                        $sql = "SELECT * FROM product,category WHERE category.cate_id = product.p_cate AND p_id = ".$id;
                                                                        $result = mysqli_query($conn, $sql);
                                                                        $row = mysqli_fetch_array($result);
                                                                        ?>
                                                                            <option value="<?php echo $row['cate_id'] ?>"><?php echo $row["cate_name"] ?>
                                                                            </option>
                                                                        <?php
                                                                    }
                                                                 ?>
                                                                 <?php 
                                                                    $sql1 = "SELECT * FROM category";
                                                                    $result1 = mysqli_query($conn, $sql1);
                                                                    while ($row1 = mysqli_fetch_array($result1)) {?>
                                                                        <option value="<?php echo $row['cate_id'] ?>"><?php echo $row1["cate_name"] ?></option>
                                                                    <?php    
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="reg_input_name" class="req">Giá </label>
                                                            <input class="form-control" value="<?php echo $row['p_price'] ?>" name="CoursePrice" type="text" style='width: 400px'/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="reg_input_name" class="req">Số lượng </label>
                                                            <input class="form-control" value="<?php echo $row['p_number'] ?>" name="CourseNumber" type="text" style='width: 400px'/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="reg_input_name" class="reg">Ảnh</label>
                                                            <input type="file" name="CourseImg">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="reg_input_name" class="req">Mô tả </label><br>
                                                            <textarea cols="50" class="ckeditor" rows="10" id="detail" name="Courseckeditor"><?php echo $row['p_describe'] ?></textarea>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="form_sep">
                                                                    <input class="btn btn-info" name="cmd" type="submit" value="Cập nhật" /> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>    
                    </div>

                    
                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        The site sells SeaFood!
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>
        <!-- jQuery -->
        <script src="../Congcu/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../Congcu/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../Congcu/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../Congcu/vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="../Congcu/vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="../Congcu/vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="../Congcu/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="../Congcu/vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="../Congcu/vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="../Congcu/vendors/Flot/jquery.flot.js"></script>
        <script src="../Congcu/vendors/Flot/jquery.flot.pie.js"></script>
        <script src="../Congcu/vendors/Flot/jquery.flot.time.js"></script>
        <script src="../Congcu/vendors/Flot/jquery.flot.stack.js"></script>
        <script src="../Congcu/vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="../Congcu/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="../Congcu/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="../Congcu/vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="../Congcu/vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="../Congcu/vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="../Congcu/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="../Congcu/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="../Congcu/vendors/moment/min/moment.min.js"></script>
        <script src="../Congcu/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="../Congcu/build/js/custom.min.js"></script>
        <script src="../Congcu/ckeditor/ckeditor.js"></script>
</body>

</html>