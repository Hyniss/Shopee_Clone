<?php
include '../../config/config.php';
$tensanpham = $_POST['tensanpham'];
//xu ly anh 
$anhsanpham = $_FILES['anhsanpham']['name'];
$anhsanpham_tmp = $_FILES['anhsanpham']['tmp_name'];
$mota = $_POST['mota'];;
$mausac = $_POST['mausac'];
$soluong = $_POST['soluong'];
$gia = $_POST['gia'];
$danhmuc = $_POST['danhmuc'];

if(isset($_POST['themsanpham'])) {
    //them
    $sql_them = "INSERT INTO product(nameProduct,img,descript,color,quantity,price,categoryId)
                 VALUE('".$tensanpham."','".$anhsanpham."',
                       '".$mota."','".$mausac."','".$soluong."',
                       '".$gia."','".$danhmuc."')";
    mysqli_query($conn,$sql_them);
    move_uploaded_file($anhsanpham_tmp,'uploads/'.$anhsanpham);
    header('Location:../../dashboard.php?action=quanlysanpham&query=lietke');
}elseif (isset($_POST['suasanpham'])) {
    //sua
    if($anhsanpham!=''){
            move_uploaded_file($anhsanpham_tmp,'uploads/'.$anhsanpham);
            $id = $_GET['idsanpham'];
            $sql_update = "UPDATE product SET  nameProduct = '" .$tensanpham. "' ,
                                                img = '" .$anhsanpham. "' , descript = '".$mota. "' ,
                                                color = '".$mausac."' , quantity = '" .$soluong. "' ,
                                                price = '" .$gia. "',
                                                categoryId='".$danhmuc."'
                                                WHERE id='$_GET[idsanpham]'";
    //xoa anh cu 
            $sql="SELECT * FROM product WHERE id = '$_GET[idsanpham]' LIMIT 1";
            $query = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($query);
            if($row['img']!=$anhsanpham){
                unlink('uploads/'.$row['img']);
            }
    }else{
        move_uploaded_file($anhsanpham_tmp,'uploads/'.$anhsanpham);
        $sql_update = "UPDATE product SET  nameProduct = '" .$tensanpham. "' , 
                                            descript = '" .$mota. "' ,color = '" .$mausac. "' , 
                                            quantity = '" .$soluong. "' ,price = '" .$gia. "',
                                            categoryId='".$danhmuc."'
                                            WHERE id='$_GET[idsanpham]'";
        
    }
    mysqli_query($conn,$sql_update);
    header('Location:../../dashboard.php?action=quanlysanpham&query=lietke');
}else{
    //xoa
    $id = $_GET['idsanpham'];
    $sql="SELECT * FROM product WHERE id='$id' LIMIT 1";
    $query = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($query)){
        unlink('uploads/'.$row['anhsanpham']);
    }
    $sql_xoa = "DELETE FROM product WHERE id = '" . $id . "'";
    mysqli_query($conn,$sql_xoa);
    header('Location:../../dashboard.php?action=quanlysanpham&query=lietke');
}

?>