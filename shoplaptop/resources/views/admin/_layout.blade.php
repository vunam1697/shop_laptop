
@if(!Session::has('login'))
    <script>
		window.location.href="{{url('/admin/index-login')}}";
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
            @yield('main')           
        </div>
    </div>

    <!-- js layout-->
    @include('admin.components.js')

</body>

</html>