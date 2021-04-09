<?php 
	require "connect.php";
	$user= "";
    $pass = "";
    $email = "";
    $fullname = "";
	if (isset($_POST["submit"])) {
		$user = isset($_POST['txtname'])?$_POST['txtname']:'';
        $pass = isset($_POST['txtpass'])?$_POST['txtpass']:'';
        $email = isset($_POST['txtemail'])?$_POST['txtemail']:'';
		$fullname = isset($_POST['txtfullname'])?$_POST['txtfullname']:'';

		$insert = "INSERT INTO user(user_id,username,fullname,password,email)
                VALUES (0,'".$user."','".$fullname."','".$pass."','".$email."')";

        $sql = mysqli_query($conn, $insert);
        echo "<script type='text/javascript'>";
		echo "alert('Đăng ký thành công!')</script>";
		
        header("location: http://localhost:8888/Website_ban_giay_TiTi/login.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
<div class="loginbox">
	<img src="img/banner/avatar.png" class="avatar">
	<h1>Login Here</h1>
	<form action="register.php" method="post" >
		<p>User name</p>
		<input type="text" name="txtname" placeholder="Enter Username">
		<p>PassWord</p>
		<input type="PassWord" name="txtpass" placeholder="Enter PassWord">
		<p>Full name</p>
		<input type="text" name="txtfullname" placeholder="Enter Fullname">
		<p>Email</p>
		<input type="text" name="txtemail" placeholder="Enter Email">
		<input type="submit" name="submit" value="Sign In">
		<a href="login.php">Login</a>
		<a href="#">Forget Account?</a>
	</form>
</div>
</body>
</html>