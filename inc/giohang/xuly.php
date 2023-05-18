<?php 
    session_start();
    
        $id = $_POST['idsanpham'];
        $name = $_POST['tensanpham'];
        $img = $_POST['anhsanpham'];
        $color= $_POST['mausac'];
        $quantity = $_POST['soluong'];
        $price = $_POST['gia'];
        $sum_price = $_POST['quantity'];
    
    if(empty($_SESSION['cart'][$id])){
    $_SESSION['cart'][$id]['name'] = $name;
    $_SESSION['cart'][$id]['img'] = $img;
    $_SESSION['cart'][$id]['price'] = $price;
    $_SESSION['cart'][$id]['quantity'] = $quantity;
    $_SESSION['cart'][$id]['color'] = $color;
    } else {
    $_SESSION['cart'][$id]['quantity']+= $quantity;
    }

    if (isset($_POST['themgiohang']) )
    {

    header("location:./../../chitietsanpham.php?id=$id");
    exit();

    }else{
    header("location:./../../giohang.php"); 
    exit();
    }
     

     
