<?php 
	$conn = mysqli_connect("localhost", "root", "") or die("Can't not server");
	mysqli_select_db($conn, "website_ban_giay_titi") or die ("Can't not database");
	mysqli_set_charset($conn,"utf8");
 ?>