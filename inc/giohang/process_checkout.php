<?php
	session_start(); 
	$cart = $_SESSION['cart'];
	include './../../admin/config/config.php';
	 // Đăng ký mua hàng nhanh
    if(isset($_POST['thanhtoan1']) && $_POST['taikhoan'] != '' 
                                   && $_POST['matkhau'] != '' && $_POST['fullname'] != '' 
                                   && $_POST['sdt'] != '' && $_POST['diachi'] != ''){ 
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau'];
        $fullname = $_POST['fullname']; 
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];
        $typePay = $_POST['hinhthucthanhtoan'];
        $note = $_POST['note'];

         $sql_kiemtra = "SELECT * FROM user WHERE userName = '$taikhoan'";

        $old = mysqli_query($conn,$sql_kiemtra);
        if(mysqli_num_rows($old)>0){
            echo '<script>alert("Tài khoản đã tồn tại !")</script>';
        }else{
            $sql_dangkynhanh = mysqli_query($conn,"INSERT INTO user(userName,fullname,password,phone,adress) 
                                              VALUES ('".$taikhoan."','".$fullname."','".$matkhau."','".$sdt."','".$diachi."')");
            if($sql_dangkynhanh){

                $sql_select_buy = mysqli_query($conn,"SELECT * FROM user ORDER BY id DESC LIMIT 1");
                $row_id_buy = mysqli_fetch_array($sql_select_buy);
                $id_khachhang = $row_id_buy['id'];
                              
                    $total = $_POST['total'];
                    $sql_order = " INSERT INTO orders(userId,typePay,description,total) VALUES('$id_khachhang','$typePay','$note','$total')";
                    
                    $sql_donhang = mysqli_query($conn,$sql_order);

					if($sql_donhang){
                        $sql_select_donhang = mysqli_query($conn,"SELECT * FROM orders WHERE userId = '$id_khachhang'  ORDER BY id DESC LIMIT 1 ");
                        $row_ma_donhang = mysqli_fetch_array($sql_select_donhang);
                        $ma_donhang = $row_ma_donhang['id'];
                    foreach ($cart as $product_id => $each) {
                    	$quantity = $each['quantity'];
                    	$price = $each['price'];
                        $sql_thanhtoan = mysqli_query($conn," INSERT INTO orderdetail(orderId,productId,price,quantity) 
                                                              VALUES('$ma_donhang','$product_id','$price','$quantity')");
                    }
                     unset($_SESSION['cart']);
    		header("location:./../../giohang.php");  
                }   
            }   
            
        }
	   
         }else{   
        header("location:./../../giohang.php");     
    }
    
// thanh toán khi đã đăng nhập
    if(isset($_POST['thanhtoan2'])){ 
        $id_khachhang= $_SESSION['idnguoidung'];
        $typePay = $_POST['hinhthucthanhtoan'];
        $note = $_POST['ghichu'];
        $total = $_POST['total'];
                    $sql_order = " INSERT INTO orders(userId,typePay,description,total) VALUES('$id_khachhang','$typePay','$note','$total')";
                    
                    $sql_donhang = mysqli_query($conn,$sql_order);

					if($sql_donhang){
                        $sql_select_donhang = mysqli_query($conn,"SELECT * FROM orders WHERE userId = '$id_khachhang'  ORDER BY id DESC LIMIT 1 ");
                        $row_ma_donhang = mysqli_fetch_array($sql_select_donhang);
                        $ma_donhang = $row_ma_donhang['id'];
                    foreach ($cart as $product_id => $each) {
                    	$quantity = $each['quantity'];
                    	$price = $each['price'];
                        $sql_thanhtoan = mysqli_query($conn," INSERT INTO orderdetail(orderId,productId,price,quantity) 
                                                              VALUES('$ma_donhang','$product_id','$price','$quantity')");
                    }
                     unset($_SESSION['cart']);
    		header("location:./../../giohang.php");  
                }   
    }else{
        
        header("location:./../../giohang.php"); 
        
    }
   