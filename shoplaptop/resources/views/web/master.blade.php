<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ | Laptop</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="copyright" content="" />
    <meta property="og:image" content="">
    <!--link css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/slick.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/slick-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/jquery.mmenu.all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/web/css/toastr.min.css') }}">
    <script type="text/javascript" src="{{ url('/web/js/jquery.min.js') }}"></script>
</head>
<body>

    @include('web.components.header')
    <main>
        @yield('main')
    </main>

	@include('web.components.footer')
    
    <!--Link js-->
    <script type="text/javascript" src="{{ url('/web/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/web/js/jquery.mmenu.all.js') }}"></script>
    <script type="text/javascript" src="{{ url('/web/js/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('/web/js/private.js') }}"></script>
    <script type="text/javascript" src="{{ url('/web/js/toastr.min.js') }}"></script>

    @yield('script')
    
    @if(Session::has('message'))
        <script type='text/javascript'>
            toastr["{!! Session::get('level') !!}"]("{!! Session::get('message') !!}")
        </script>
    @endif
</body>
</html>