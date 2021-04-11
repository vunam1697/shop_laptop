@extends('admin._login')
@section('login')
<title>Đăng ký</title>

<link rel="stylesheet" type="text/css" href="{{ url('/admin/register.css') }}">
<h1>Tạo tài khoản ngay</h1>
	<form action="{{ route('admin.register') }}" method="POST"  >
		<p>Tên tài khoản</p>
		<input type="text" name="txtname" value="{{ $user ? $user -> name : '' }}" placeholder="Nhập tài khoản" required>
		<p>Mật khẩu</p>
		<input type="PassWord" name="txtpass"   placeholder="Nhập mật khẩu" required>
        <p>Xác nhận mật khẩu</p>
		<input type="PassWord" name="txtpassAgain" placeholder="Nhập lại mật khẩu" required>
		<p>Họ và tên</p>
		<input type="text" name="txtfullname" value="{{ $user ? $user -> full_name : '' }}" placeholder="Nhập tên">
		<p>Email</p>
		<input type="email" name="txtemail" placeholder="Nhập email" value="{{ $user ? $user -> email : '' }}">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" id="token">

        @if (!empty($errorMessage))
        <span class="error">{{ $errorMessage }}</span>
	    @endif

		<input type="submit" name="submit" value="Đăng ký">
		<a href="{{url('/admin/index-login')}}">Đăng nhập</a>
	</form>
@stop