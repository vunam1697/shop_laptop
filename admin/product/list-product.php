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
        function delete_product(){
            return confirm("Bạn có muốn xóa?");
        }
    </script>

</head>
<body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="../index.php" class="site_title"><i class="fa fa-paw"></i><span>Admin</span></a>
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
                                            <li><a href="#">Danh sách sản phẩm </a></li>
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
                                            <li><a href="list_news.php">Danh sách tin tức </a></li>
                                            <li><a href="#">Thêm </a></li>
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
                            <h2>Bảng sản phẩm <small><a href="../thucthi/add-product.php" class="btn btn-info"><i class="fa fa-plus"> Thêm sản phẩm</i></a></small></h2>
                            <form action="search_product.php" method="post">
                              <div class="input-group">
                                <input type="text" style="margin-top: 5px" class="form-control" placeholder="Search" name="search_form">
                                <div class="input-group-btn">
                                  <button type="submit" name="btnsearch" style="margin-top: 5px" class="btn btn-default">Submit</button>
                                </div>
                              </div>
                            </form>
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
                                  <th class="column-title">STT </th>
                                  <th class="column-title">Tên Sản Phẩm </th>
                                  <th class="column-title">Ảnh </th>
                                  <th class="column-title">Giá </th>
                                  <th class="column-title">Số lượng </th>
                                  <th class="column-title">Loại Sản Phẩm </th>
                                  <th class="column-title no-link last" colspan="2" style="text-align: center;"><span class="nobr">Thao tác</span>
                                  </th>
                                  <th class="bulk-actions" colspan="9">
                                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>

                                  </th>
                              </tr>
                          </thead>
                          <?php 
                            // TÌM TỔNG SỐ RECORDS
                          $result = mysqli_query($conn,'Select count(p_id) as total from product');
                          $row = mysqli_fetch_assoc($result);
                          $total_record = $row['total'];
                            // TÌM LIMIT VÀ CURRENT_PAGE
                          $current_page = isset($_GET['page'])? $_GET['page'] : 1;
                          $limit = 10;
                            // Tổng số trang
                          $total_page = ceil($total_record / $limit);

                            // Giới hạn current_page trong khoảng 1 đến total_page
                          if($current_page > $total_page){
                            $current_page = $total_page;
                        }
                        else if ($current_page < 1){
                            $current_page = 1;
                        }
                            // Tìm 'start'
                        $start = ( $current_page - 1 ) * $limit;

                            // TRUY VẤN LẤY DANH SÁCH TIN TỨC
                            // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
                       
                        $sql = "SELECT * FROM product, category WHERE category.cate_id = product.p_cate ORDER BY product.p_id";
                        $result = mysqli_query($conn, $sql ." LIMIT $start, $limit");
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tbody>
                              <tr class="even pointer">
                                <td class="a-center ">
                                  <input type="checkbox" class="flat" name="table_records">
                              </td>
                              <td class=" "><?php echo $row["p_id"] ?></td>
                              <td class=" "><?php echo ucwords($row["p_name"]) ?> </td>
                              <td class=" "><img style="width: 100px;height: 100px" src="../../uploads/<?php echo $row["p_img"] ?>"></td>
                              <td class=" "><?php echo $row["p_price"] ?> </td>
                              <td class=" "><?php echo $row["p_number"] ?></td>
                              <td class="a-right a-right "><?php echo $row["cate_name"] ?></td>
                              <td class=" last" style="text-align: center;"><a href="../thucthi/repair-product.php?id=<?php echo $row["p_id"] ?>"><i class="fa fa-edit" style="font-size:20px"></i></a>
                              </td>
                              <td class=" last" style="text-align: center;"><a onclick="return delete_product();" href="../thucthi/delete_product.php?id=<?php echo $row["p_id"] ?>"><i class="fa fa-trash-o" style="font-size:20px"></i></a>    
                              </td>
                          </tr>
                      </tbody>
                      <?php    
                  }

                  ?>
              </table>
                <div>
                <ul class="pagination">
                    <?php 
                    // BƯỚC 7: HIỂN THỊ PHÂN TRANG
                    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                    if($current_page > 1 && $total_page > 1){
                        echo '<li><a href="list-product.php?page='.($current_page - 1).'">Prev</a></li>';
                    }

                     // Lặp khoảng giữa
                    for ($i = 1; $i <= $total_page; $i++){
                    // Nếu là trang hiện tại thì hiển thị thẻ span
                    // ngược lại hiển thị thẻ a
                        if ($i == $current_page){
                            // echo '<span>'.$i.'</span> | ';
                            echo '<li class="active"><a>'.$i.'</a></li>';
                        }
                        else{
                            echo '<li><a href="list-product.php?page='.$i.'">'.$i.'</a><li> ';
                        }
                    }

                    if($current_page < $total_page && $total_page > 1){
                        echo '<li><a href="list-product.php?page='.($current_page + 1).'">Next</a></li>';
                    }
                 ?>
                </ul>
                
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