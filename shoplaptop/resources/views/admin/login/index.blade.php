@extends('admin._login')
@section('login')

<img src="{{ url('/image/login.jpg') }}" class="avatar">
<h1>Login Here</h1>
<form action="{{ route('admin.login') }}" method="POST">
	<p>Tài khoản</p>
	<input type="text" name="txtname" placeholder="Nhập tài khoản">	
	<p>Mật khẩu</p>
	<input type="password" name="txtpass" placeholder="Nhập mật khẩu">
	<input type="hidden" name="_token" value="{!! csrf_token() !!}" id="token">

	
	@if (!empty($error))
		<span class="error">Tài khoản hoặc mật khẩu không tồn tại</span>
	@endif

	<input type="submit" name="submit" value="Đăng nhập">

	<a href="register.php">Tạo tài khoản</a>
	<a href="#">Quên mật khẩu?</a>
</form>
@stop