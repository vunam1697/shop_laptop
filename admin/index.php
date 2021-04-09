<?php 
    require "../connect.php";
    require "SessionLogin.php";
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <!-- Bootstrap -->
    <link href="Congcu/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link href="Congcu/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <!-- NProgress -->
    <link href="Congcu/vendors/nprogress/nprogress.css" rel="stylesheet" />
    <!-- iCheck -->
    <link href="Congcu/vendors/iCheck/skins/flat/green.css" rel="stylesheet" />
    <!-- bootstrap-progressbar -->
    <link href="Congcu/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" />
    <!-- JQVMap -->
    <link href="Congcu/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="Congcu/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

    <!-- Custom Theme Style -->
    <link href="Congcu/build/css/custom.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/style.css">

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
                                <img src="image/<?php echo $row_img['img'] ?>" alt="..." class="img-circle profile_img" />
                            </div>
                            <div class="profile_info">
                                <span>Welcome</span>
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
                                    <li>
                                        <a href="#"><i class="fa fa-home"></i>Trang chủ </a>
                                    </li>
                                    
                                    <li>
                                        <a><i class="fa fa-edit"></i>Quản lý sản phẩm <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="product/list-product.php">Danh sách sản phẩm </a></li>
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
                                        <img src="images/img.jpg" alt="" />
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
                                        <li>
                                            <a href="logout.php"><i class="fa fa-sign-out pull-right"></i>Log Out</a>
                                        </li>
                                    </ul>
                                </li>

                                <li role="presentation" class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">2</span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                        <li>
                                            <a>
                                                <span>
                                                    <span>Vu Nam</span>
                                                </span>
                                                <span class="message">Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                                <span>
                                                    <span>Vu Nam</span>
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

                <!-- page content -->
                <div class="right_col" role="main">
                    <!-- top tiles -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-tasks fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                                <?php 
                                                    $sql = "SELECT * FROM product";
                                                    $query = mysqli_query($conn, $sql);
                                                    $count = mysqli_num_rows($query);
                                                    echo $count;
                                                ?> 
                                             </div>
                                            <div>Sản phẩm!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="product/list-product.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-folder-o fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                                <?php 
                                                    $sql = "SELECT * FROM news";
                                                    $query = mysqli_query($conn, $sql);
                                                    $count = mysqli_num_rows($query);
                                                    echo $count;
                                                ?>
                                            </div>
                                            <div>Tin Tức!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="product/list_news.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                                <?php 
                                                    $sql = "SELECT * FROM orders";
                                                    $query = mysqli_query($conn, $sql);
                                                    $count = mysqli_num_rows($query);
                                                    echo $count;
                                                ?>
                                            </div>
                                            <div>Hóa Đơn!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="orders.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                                <?php 
                                                    $sql = "SELECT * FROM user";
                                                    $query = mysqli_query($conn, $sql);
                                                    $count = mysqli_num_rows($query);
                                                    echo $count;
                                                ?>
                                            </div>
                                            <div>Người dùng!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="user.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
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
        <script src="Congcu/vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="Congcu/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="Congcu/vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="Congcu/vendors/nprogress/nprogress.js"></script>
        <!-- Chart.js -->
        <script src="Congcu/vendors/Chart.js/dist/Chart.min.js"></script>
        <!-- gauge.js -->
        <script src="Congcu/vendors/gauge.js/dist/gauge.min.js"></script>
        <!-- bootstrap-progressbar -->
        <script src="Congcu/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
        <!-- iCheck -->
        <script src="Congcu/vendors/iCheck/icheck.min.js"></script>
        <!-- Skycons -->
        <script src="Congcu/vendors/skycons/skycons.js"></script>
        <!-- Flot -->
        <script src="Congcu/vendors/Flot/jquery.flot.js"></script>
        <script src="Congcu/vendors/Flot/jquery.flot.pie.js"></script>
        <script src="Congcu/vendors/Flot/jquery.flot.time.js"></script>
        <script src="Congcu/vendors/Flot/jquery.flot.stack.js"></script>
        <script src="Congcu/vendors/Flot/jquery.flot.resize.js"></script>
        <!-- Flot plugins -->
        <script src="Congcu/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
        <script src="Congcu/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
        <script src="Congcu/vendors/flot.curvedlines/curvedLines.js"></script>
        <!-- DateJS -->
        <script src="Congcu/vendors/DateJS/build/date.js"></script>
        <!-- JQVMap -->
        <script src="Congcu/vendors/jqvmap/dist/jquery.vmap.js"></script>
        <script src="Congcu/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
        <script src="Congcu/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="Congcu/vendors/moment/min/moment.min.js"></script>
        <script src="Congcu/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

        <!-- Custom Theme Scripts -->
        <script src="Congcu/build/js/custom.min.js"></script>
        <script src="Congcu/ckeditor/ckeditor.js"></script>
</body>

</html>