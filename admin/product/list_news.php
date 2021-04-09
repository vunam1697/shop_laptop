<?php 
    require "../connect.php";
    require "../SessionLogin.php";
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
    <script type="text/javascript">
        function delete_news(){
            return confirm("Bạn có muốn xóa?");
        }
    </script>

</head>
<body class="nav-md">
    <form id="form1" runat="server">
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
                                            <li><a href="list-product.php">Danh sách sản phẩm </a></li>
                                            <li><a href="../thucthi/add-product.php">Thêm </a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i>Quản lý loại giày <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="classify-product.php">Danh sách loại sản phẩm </a></li>
                                            <li><a href="../thucthi/add-classify.php">Thêm </a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a><i class="fa fa-edit"></i>Quản tin tức <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="#">Danh sách tin tức </a></li>
                                            <li><a href="../thucthi/add_news.php">Thêm </a></li>
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

                <!-- page content -->
                <div class="right_col" role="main">
                    <!-- top tiles -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bảng tin tức <small><a href="../thucthi/add_news.php" class="btn btn-info"><i class="fa fa-plus"> Thêm tin tức</i></a></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th class="column-title">Tên Tin Tức </th>
                            <th class="column-title">Ảnh 1</th>
                            <th class="column-title">Mô Tả Đầu </th>
                            <th class="column-title">Mô Tả Giữa </th>
                            <th class="column-title">Mô Tả cuối </th>
                            <th class="column-title no-link last" colspan="2" style="text-align: center;"><span class="nobr">Thao tác</span>
                            </th>
                            <th class="bulk-actions" colspan="11">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <?php 
                            $sql = "SELECT * FROM news ";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tbody>
                                  <tr class="even pointer">
                                    <td class="a-center ">
                                      <input type="checkbox" class="flat" name="table_records">
                                    </td>
                                    <td class=" "><?php echo $row["new_name"] ?></td>
                                    <td class=" "><img src="../../new/<?php echo $row["new_img"] ?>"> </td>
                                    <td class=" ">
                                        <?php
                                            if (strlen($row["new_describe"]) > 20) {
                                                $substr = substr($row["new_describe_1"], 0, 50);
                                                echo $substr.' ... <a href="#">Xem them</a>';
                                            }
                                            else{
                                                echo $row["new_describe_1"];
                                            }
                                        ?>

                                    </td>
                                    <td class=" ">
                                        <?php
                                            if (strlen($row["new_describe_1"]) > 20) {
                                                $substr = substr($row["new_describe_1"], 0, 50);
                                                echo $substr.' ... <a href="#">Xem them</a>';
                                            }
                                            else{
                                                echo $row["new_describe_1"];
                                            }
                                        ?>

                                    </td>
                                    <td class=" ">
                                        <?php
                                            if (strlen($row["new_describe_2"]) > 20) {
                                                $substr = substr($row["new_describe_1"], 0, 50);
                                                echo $substr.' ... <a href="#">Xem them</a>';
                                            }
                                            else{
                                                echo $row["new_describe_1"];
                                            }
                                        ?>

                                    </td>
                                    <td class=" last" style="text-align: center;"><a href="../thucthi/update_news.php?id=<?php echo $row["new_id"] ?>"><i class="fa fa-edit" style="font-size:20px"></i></a>
                                    </td>
                                    <td class=" last" style="text-align: center;"><a onclick="return delete_news();" href="../thucthi/delete_news.php?id=<?php echo $row["new_id"] ?>"><i class="fa fa-trash-o" style="font-size:20px"></i></a>    
                                    </td>
                                  </tr>
                                </tbody>
                            <?php    
                            }
                            
                         ?>
                      </table>
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
    </form>
</body>
</html>