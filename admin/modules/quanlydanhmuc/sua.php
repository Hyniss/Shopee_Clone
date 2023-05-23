<?php
    include 'config/config.php';
    $sql_sua_danhmuc = "SELECT * FROM category WHERE id = '$_GET[iddanhmuc]' LIMIT 1 ";
    $query_sua_danhmuc = mysqli_query($conn,$sql_sua_danhmuc);
?>
<div class="add__danhmuc"> 
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-left">Sửa Danh Mục sản phẩm : </h2>
			</div>
			<div class="panel-body">
				<form method="post" action="modules/quanlydanhmuc/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>">
                    <?php
                        while($row = mysqli_fetch_array($query_sua_danhmuc)){
                    ?>
					<div class="form-group">
                        <label>Số thứ tự</label>
                        <input required="true" type="number" autocomplete="off" class="form-control" name="numbers" value="<?php echo $row['numbers']; ?>">
                    </div>
					<div class="form-group">
                        <label>Tên danh mục sản phẩm </label>
                        <input type="text" class="form-control" autocomplete="off" name="nameCategory" value="<?php echo $row['nameCategory']; ?>">
					</div>
					<button class="btn btn-primary" name="suadanhmuc" style="width:20%">Lưu</button>
                    <?php
                        }
                    ?>
				</form>
			</div>
		</div>
	</div>

