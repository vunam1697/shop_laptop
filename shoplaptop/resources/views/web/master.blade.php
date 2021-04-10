<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ | </title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="copyright" content="" />
    <meta property="og:image" content="">
    <!--link css-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/jquery.mmenu.all.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>

    @include('web.components.header')
    <main>
        @yield('main')
    </main>

	@include('web.components.footer')
<!--Link js-->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/private.js"></script>
</body>
</html>