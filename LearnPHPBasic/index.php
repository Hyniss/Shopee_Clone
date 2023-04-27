<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
		$ket_noi = mysqli_connect('localhost','root','','j2school');

		mysqli_set_charset($ket_noi,'utf8');

		$sql = "select * from tin_tuc";
		//die($sql);

 		$ket_qua = mysqli_query($ket_noi,$sql);
	?>
	<a href="form_insert.php">Thêm</a>
	
	<table border="1" width="100%">
		<tr>
		<th>Mã</th>
		<th>Tiêu Đề</th>
		<th>Ảnh</th>
		</tr>
		
		<?php foreach ($ket_qua as $data){ ?>
		<tr>
			<td>
			<a href="show.php?ma=<?php echo $data['ma'] ?>">
			<?php echo $data['ma'] ?></a></td>
			<td><?php echo $data['tieu_de'] ?></td>
			<td><?php echo $data['anh'] ?></td>
		</tr>
		<?php } ?>
		
	</table>
	
</body>
</html>