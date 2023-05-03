<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
	$ma = $_GET['ma'];
		include 'Connect.php';

		$sql = "select tieu_de from tin_tuc where ma = $ma";
		//die($sql);

 		$ket_qua = mysqli_query($ket_noi,$sql);
 		$tintucbyid = mysqli_fetch_array($ket_qua);
	?>
<h1> <?php echo nl2br($tintucbyid['tieu_de']) ?></h1>
</body>
</html>