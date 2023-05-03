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

		$sql = "select * from tin_tuc where ma = $ma ";
		//die($sql);

 		$ket_qua = mysqli_query($ket_noi,$sql);
 		$databyid = mysqli_fetch_array($ket_qua);
	?>
	<form method="post" action="process_update.php">
	<input type="hidden" name="id" value="<?php echo $databyid['ma'] ?>">
	<label>Tiêu đề</label>
	<input type="text" name="tieu_de" value="<?php echo $databyid['tieu_de'] ?>"><br>
	<label>Nội Dung</label>
	<textarea name="noi_dung" ><?php echo $databyid['noi_dung'] ?></textarea><br>
	<label>Ảnh</label>
	<input type="text" name="anh" value="<?php echo $databyid['anh'] ?>"><br>	
	<button>Thêm</button>
	</form>
	<?php mysqli_close($ket_noi) ?>
</body>
</html>