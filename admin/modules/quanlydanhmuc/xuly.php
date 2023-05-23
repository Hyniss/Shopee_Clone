<?php
include '../../config/config.php';
$tendanhmuc = $_POST['nameCategory'];
$stt = $_POST['numbers'];
if(isset($_POST['themdanhmuc'])) {
    //them
    $sql_them = "INSERT INTO category(numbers,nameCategory) VALUE(' " . $stt . "', '" . $tendanhmuc . "')";
    mysqli_query($conn,$sql_them);
    header('Location:../../dashboard.php?action=quanlydanhmuc&query=lietke');
}elseif (isset($_POST['suadanhmuc'])) {
    //sua
    $sql_update = "UPDATE category SET numbers = '" . $stt . "',nameCategory = '" . $tendanhmuc . "' WHERE id='$_GET[iddanhmuc]'";
    mysqli_query($conn,$sql_update);
    header('Location:../../dashboard.php?action=quanlydanhmuc&query=lietke');
}else{
    //xoa
    $id = $_GET['iddanhmuc'];
    $sql_xoa = "DELETE FROM category WHERE id = '" . $id . "'";
    mysqli_query($conn,$sql_xoa);
    header('Location:../../dashboard.php?action=quanlydanhmuc&query=lietke');
}

?>