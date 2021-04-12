@if(!Session::has('login'))
    <script>
        window.location.href = "{{url('/admin/index-login')}}";
    </script>
@endif
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head runat="server">
    <title></title>
    <!-- css layout-->
    @include('admin.components.css')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{url('/admin/home')}}" class="site_title"><i class="fa fa-paw"></i><span> Quản trị web</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <!-- <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="image/" alt="..." class="img-circle profile_img" />
                        </div>
                        <div class="profile_info">
                            <span>Welcome</span>
                            <h2>
                            </h2>
                        </div>
                    </div> -->
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    @include('admin.components.sidebar_menu')
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            @include('admin.components.top_navigation')
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <!-- top tiles -->
                @yield('main')
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <!-- <footer>
                <div class="pull-right">
                    The site sells SeaFood!
                </div>
                <div class="clearfix"></div>
            </footer> -->
            <!-- /footer content -->
        </div>
    </div>

    <!-- js layout-->
    @include('admin.components.js')

</body>

</html>