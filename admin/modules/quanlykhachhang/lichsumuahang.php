<?php  
    if(isset($_GET['query'])=='chitiet'){
        $idnguoidung= $_GET['idnguoidung'];
        $sql_chitiet1 = " SELECT *  FROM user,orders
                                    WHERE  orders.userId = user.id and
                                    orders.userId = '$idnguoidung' " ;

        $query_lietke_chitiet1 = mysqli_query($conn,$sql_chitiet1);
        $row_chitiet1 = mysqli_fetch_array($query_lietke_chitiet1); 

        $sql_chitiet_order = " SELECT *  FROM orders
                                    WHERE  userId = '$idnguoidung' ";

        $query_ma_order = mysqli_query($conn,$sql_chitiet_order);
        $row_ma_order = mysqli_fetch_array($query_ma_order); 
        $order_id = $row_ma_order['id'];

		$sql_lietke_chitiet = " SELECT orderId,productId,img,nameProduct,color,orderdetail.quantity FROM orderdetail,product,orders
										WHERE orderdetail.productId = product.id
										AND orderdetail.orderId = orders.id
										AND  orders.userId = '$idnguoidung' ";
		$query_lietke_chitiet = mysqli_query($conn,$sql_lietke_chitiet);
	}
	 
?>
<div class="danhmuc " style=" width:86%;border-radius:4px; padding :20px 10px ;margin:20px auto ;background-color:#fff">
	<div class="danhmuc_text" style = "font-size:2rem;font-weight:500 ;color: #ee4d2d;">
		Hiển Thị Lịch Sử Mua Hàng
	</div>
		
		<table class = "table table-bordered" style = "text-align: center;font-size:1.6rem;text-transform: capitalize;">
			<thead>
				<tr>
					<th>Mã đơn hàng</th>  
					<th>Mã sản phẩm</th>  
					<th>Tên sản phẩm</th>
					<th>Ảnh sản phẩm</th> 
					<th>Màu sắc</th> 
					<th>Số Lượng </th> 		                                         
				</tr>
			</thead>
			<?php

				$i = 1;         
				while($row_chitiet = mysqli_fetch_array($query_lietke_chitiet)){
				
			?>                  
				<tbody>   
					<tr style="line-height: 50px;">
						<td><?php echo $row_chitiet['orderId'] ?></td>  
						<td><?php echo $row_chitiet['productId']?></td>
						<td><?php echo $row_chitiet['nameProduct']?></td>
						<td>
							<div class="img__be" style="background-image:url(modules/quanlysanpham/uploads/<?php echo $row_chitiet['img']?>);
														background-repeat: no-repeat;
														background-size: contain;
														background-position: center;
														height:50px;">  
							</div>               
						</td>
						<td><?php echo $row_chitiet['color']?></td>
						<td><?php echo $row_chitiet['quantity']?></td>
                                                 
					</tr> 
			<?php
				}
			?>    

				</tbody>                    
		</table>
</div>




