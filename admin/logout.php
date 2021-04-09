<?php 
	session_start();
	if (isset($_SESSION["username"])) {
		unset($_SESSION["username"]);
	}
	if (isset($_SESSION["password"])) {
		unset($_SESSION["password"]);
	}
	header("location: http://localhost/shop_laptop/admin/login.php");
 ?>