@extends('admin._login')
@section('login')

<title>Đăng nhập</title>

<link rel="stylesheet" type="text/css" href="{{ url('/admin/login.css') }}">
<h1>Đăng nhập ngay</h1>
<form action="{{ route('admin.login') }}" method="POST">
	<p>Tài khoản</p>
	<input type="text" name="txtname" value="{{ $userName ? $userName : '' }}" placeholder="Nhập tài khoản" required>	
	<p>Mật khẩu</p>
	<input type="password" name="txtpass" placeholder="Nhập mật khẩu" required>
	<input type="hidden" name="_token" value="{!! csrf_token() !!}" id="token">

	
	@if (!empty($errorMessage))
		<span class="error">{{ $errorMessage }}</span>
	@endif

	<input type="submit" name="submit" value="Đăng nhập">

	<a href="{{url('/admin/register')}}">Tạo tài khoản</a>
	<!-- <a href="#">Quên mật khẩu?</a> -->
</form>
@stop