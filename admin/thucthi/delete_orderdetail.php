<?php 
	require "../connect.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM order_detail WHERE id=".$id;
	$result = mysqli_query($conn, $sql);
	header("location: http://localhost/shop_laptop/admin/orders.php");
 ?>