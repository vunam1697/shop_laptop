<?php 
	require "../connect.php";
	$id = $_GET['id'];
	$sql = "DELETE FROM news WHERE new_id=".$id;
	$result = mysqli_query($conn, $sql);
	header("location: http://localhost/shop_laptop/admin/product/list_news.php"); 
 ?>