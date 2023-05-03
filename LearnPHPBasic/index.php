<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	
	<?php
		
		include 'Connect.php'; 

		$search = isset($_GET['search']) ? $_GET['search'] : '';

		$trang = isset($_GET['trang']) ? $_GET['trang'] : 1;

		$sql_so_tin_tuc = "select count(*) from tin_tuc where tieu_de like '%$search%'";

		$mang_so_tin_tuc = mysqli_query($ket_noi,$sql_so_tin_tuc);

		$ket_qua_so_tin_tuc = mysqli_fetch_array($mang_so_tin_tuc);

		$so_tin_tuc = $ket_qua_so_tin_tuc['count(*)'];

		$so_tin_tuc_tren_mot_trang = 3;
		

		$so_trang = ceil($so_tin_tuc/$so_tin_tuc_tren_mot_trang);

		$bo_qua = $so_tin_tuc_tren_mot_trang * ($trang - 1);

		$sql = " select * from tin_tuc 
				where tieu_de like '%$search%' 
				limit $so_tin_tuc_tren_mot_trang
				offset $bo_qua";
 		$ket_qua = mysqli_query($ket_noi,$sql);
	?>
		<form >
		<input type="search" name="search" value="<?php echo $search ?>">
		<button>tìm kiếm</button>
	</form>
	<a href="form_insert.php">Thêm</a>
	
	<table border="1" width="100%">
		<tr>
		<th>Mã</th>
		<th>Tiêu Đề</th>
		<th>Ảnh</th>
		<th></th>
		</tr>
		
		<?php foreach ($ket_qua as $data){ ?>
		<tr>
			<td>
			<a href="show.php?ma=<?php echo $data['ma'] ?>">
			<?php echo $data['ma'] ?></a></td>
			<td><?php echo $data['tieu_de'] ?></td>
			<td><?php echo $data['anh'] ?></td>
			<td><a href="form_update.php?ma=<?php echo $data['ma'] ?>">Sửa</a>
				<a href="delete.php?ma=<?php echo $data['ma'] ?>">Xóa</a></td>
		</tr>
		<?php } ?>
		
	</table>
	<?php for($i = 1 ;$i <= $so_trang; $i++) {?>
		<a href="?trang=<?php echo $i ?>&search=<?php echo $search ?>">

		<?php echo $i ?>

		</a>
	<?php } ?>
	<?php mysqli_close($ket_noi) ?>
</body>
</html>