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
    <link rel="stylesheet" type="text/css" href="../css/add-product.css">

</head>
<body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.php" class="site_title"><i class="fa fa-paw"></i><span>Admin</span></a>
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
                                    <li><a href="../index.php"><i class="fa fa-home"></i>Trang ch??? </a>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i>Qu???n l?? gi??y <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="../product/list-product.php">Danh s??ch s???n ph???m </a></li>
                                            <li><a href="add-product.php">Th??m </a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i>Qu???n l?? lo???i gi??y <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="../product/classify-product.php">Danh s??ch lo???i s???n ph???m </a></li>
                                            <li><a href="#">Th??m </a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-edit"></i>Qu???n tin t???c <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="product/list_news.php">Danh s??ch tin t???c </a></li>
                                            <li><a href="add_news.php">Th??m </a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="../orders.php"><i class="fa fa-desktop"></i>H??a ????n </a>
                                    </li>
                                    <li><a href="../user.php"><i class="fa fa-desktop"></i>Qu???n l?? ng?????i d??ng </a>
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
                                <li><a href="../index.php"><i class="icon-home2 posision-left"></i>Trang ch???</a></li>
                                <li><a href="../product/classify-product.php">Qu???n l?? lo???i gi??y</a></li>
                                <li class="active">Th??m</li>
                            </ul>
                        </div>
                        <!-- code php-->
                        <?php 
                            $id = "";
                            $ten = "";
                            if (isset($_POST["cmd"])) {
                                $ten = isset($_POST['CourseName'])?$_POST['CourseName']:'';
                                
                                $insert = "INSERT INTO category(cate_id,cate_name) VALUES (0,'".$ten."')";
                                $sql = mysqli_query($conn, $insert);
                                
                                echo "<script type='text/javascript'>";
                                echo "alert('Successfull')</script>";
                                
                            }

                         ?>
                         <!-- end code php-->

                        <div class="content">
                            <form id="add-form" action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">Th??m lo???i s???n ph???m</h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="col-sm-12">
                                                    <div class="panel-body">
                                                        <div class="form-group">
                                                            <label for="reg_input_name" class="req">T??n Lo???i s???n ph???m </label>
                                                            <input class="form-control" name="CourseName" type="text" />
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="form_sep">
                                                                    <input class="btn btn-info" name="cmd" type="submit" value="Save" /> </div>
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