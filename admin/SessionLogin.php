<?php 
	session_start();
    $conn= new mysqli('localhost','root','','website_ban_giay_titi') or die("Không thể kết nối");
    mysqli_set_charset($conn,'utf8');
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		$account=$_SESSION['username'];
		$sql="SELECT * FROM user WHERE username='$account'";
		$query=mysqli_query($conn, $sql);
		$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
		$Account=$row['fullname'];
		$img=$row['img'];
		$id=$row['user_id'];
	}
	else{
		header("location: http://localhost/shop_laptop/admin/login.php");
	}
 ?>
 <!-- <?php 
    if (isset($_GET['id'])) {
      unset($_SESSION['username']);
      header("location: http://localhost/shop_laptop/admin/login.php");
    }
 ?> -->