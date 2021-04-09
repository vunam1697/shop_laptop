<?php 
	require "../connect.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM product WHERE p_id=".$id;
	$result = mysqli_query($conn, $sql);
	header("location: http://localhost/shop_laptop/admin/product/list-product.php"); 
 ?>