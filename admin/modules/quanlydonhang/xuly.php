<?php
include '../../config/config.php';   
    //cập nhập tình trạng đơn hàng
    if(isset($_POST['capnhapdonhang'])){
        $trangthaidonhang = $_POST['trangthaidonhang'];
        $madon = $_POST['xulymadonhang'];
        $sql_update_donhang = mysqli_query($conn, "UPDATE orders SET orderStatus = '$trangthaidonhang' WHERE id = '$madon'");
        header('Location:../../dashboard.php?action=quanlydonhang&query=lietke');
    }
?>