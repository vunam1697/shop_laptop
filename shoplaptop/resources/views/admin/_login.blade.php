<!-- @if(Session::has('login'))
    <script>
		window.location.href="{{ route('admin.login') }}";
	</script>
@endif -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="{{ url('/admin/login.css') }}">
</head>
<body>
<div class="loginbox">
	@yield('login')	
</div>
</body>
</html>