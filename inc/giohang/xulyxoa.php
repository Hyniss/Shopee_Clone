<?php 
	session_start();
	if(isset($_GET['xoa']))
    {
        $id = $_GET['xoa'];
        unset($_SESSION['cart'][$id]);
        header("location:./../../giohang.php"); 
        exit();
    }
