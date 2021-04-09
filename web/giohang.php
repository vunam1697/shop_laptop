<?php 
    require "connect.php";
    session_start();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM product WHERE p_id= ".$id;
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_row($result);
            
        if (!empty($_SESSION["cart"])) {
            // kiểm tra lần thứ 2 mua hàng đã có ID phần tử mảng chưa
            if (array_key_exists($id, $_SESSION["cart"])) {
                $_SESSION["cart"][$id] = array(
                    "sl"=>(int)$_SESSION["cart"][$id]["sl"]+1,
                    "price"=>$data[6],
                    "soluong"=>$data[4],
                    "masp"=>$data[0],
                    "name"=>$data[2],
                    "image"=>$data[5]
                );
            }
            else
            {
                // lần đầu tiên mua hàng
                $_SESSION["cart"][$id] = array(
                    "sl"=>1,
                    "price"=>$data[6],
                    "soluong"=>$data[4],
                    "masp"=>$data[0],
                    "name"=>$data[2],
                    "image"=>$data[5]
                );
            }
        }   
        else
        {
            $_SESSION["cart"][$id] = array(
                "sl"=>1,
                "price"=>$data[6],
                "soluong"=>$data[4],
                "masp"=>$data[0],
                "name"=>$data[2],
                "image"=>$data[5]
            );
        }
        header("location: http://localhost:8888/Website_ban_giay_TiTi/index.php");
        /*$_SESSION['cart'] = $cart;*/
    }else{
        // quay lại trang chi tiết
    }
 ?>
