<?php 
	require "../connect.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM user WHERE user_id=".$id;
	$result = mysqli_query($conn, $sql);
	header("location: http://localhost/shop_laptop/admin/user.php"); 
 ?>