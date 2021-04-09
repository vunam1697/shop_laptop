<?php 
	require "../connect.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM orders WHERE id=".$id;
	$result = mysqli_query($conn, $sql);
	header("location: http://localhost/shop_laptop/admin/orders.php");
 ?>