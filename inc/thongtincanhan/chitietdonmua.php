<?php  
    if(isset($_GET['query'])=='chitiet'){
        $madonhang= $_GET['madonhang'];




        $sql_chitiet1 = " SELECT orderId,productId,img,nameProduct,color,orderdetail.quantity as quantity,orderStatus FROM orderdetail,product,orders WHERE orderdetail.productId = product.id AND orderdetail.orderId = orders.id AND  orderdetail.orderId = '$madonhang' ";
        $query_lietke_chitiet1 = mysqli_query($conn,$sql_chitiet1);

 
?>
        <div class="danhmuc " style=" width:86%;border-radius:4px; padding :20px 10px ;margin:20px auto ;background-color:#fff">
            <span class="danhmuc_text" style = "font-size:2rem;font-weight:500 ;color: #ee4d2d;">
                Hiển Thị Chi Tiết Đơn Hàng 
            </span>
           
                
                <div class="flex " style="margin:10px 10px;justify-content:space-between;">
                 
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
                while($row_chitiet = mysqli_fetch_array($query_lietke_chitiet1)){
                
            ?>                  
                <tbody>   
                    <tr style="line-height: 50px;">
                        <td><?php echo $row_chitiet['orderId'] ?></td>  
                        <td><?php echo $row_chitiet['productId']?></td>
                        <td><?php echo $row_chitiet['nameProduct']?></td>
                        <td>
                            <div class="img__be" style="background-image:url(admin/modules/quanlysanpham/uploads/<?php echo $row_chitiet['img']?>);
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


<?php
    } else{

    }
?>

