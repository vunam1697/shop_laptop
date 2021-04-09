<?php 
	require "connect.php";
	session_start();

	if (isset($_POST["submit"])) {
		$name = $_POST['txtname'];
		$pass = $_POST['txtpass'];

		$sql = "select * from user where username='".$name."'AND password='".$pass."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		if ($row) {
			$_SESSION["username"] = $name;
			$_SESSION["password"] = $pass;
			header("location: http://localhost/shop_laptop/admin/index.php");
		}else{
			echo "<script type='text/javascript'>";
			echo "alert('Tài khoản hoặc mật khẩu không đúng')</script>";
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<div class="loginbox">
	<img src="image/avatar.png" class="avatar">
	<h1>Login Here</h1>
	<form action="login.php" method="post" >
		<p>User name</p>
		<input type="text" name="txtname" placeholder="Enter Username">
		<p>PassWord</p>
		<input type="PassWord" name="txtpass" placeholder="Enter PassWord">
		<input type="submit" name="submit" value="LOGIN">
		<a href="register.php">Create Account</a>
		<a href="#">Forget Account?</a>
	</form>
</div>
</body>
</html>