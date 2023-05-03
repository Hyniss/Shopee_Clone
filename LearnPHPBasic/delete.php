<?php  
$ma = $_GET['ma'];

include 'Connect.php';

$sql = "DELETE FROM tin_tuc  WHERE ma = $ma ";
 mysqli_query($ket_noi,$sql);

 $loi = mysqli_error($ket_noi);
 echo $loi;
 mysqli_close($ket_noi);