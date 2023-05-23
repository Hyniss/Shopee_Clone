<?php
    $sql_lietke_donhang = " SELECT orders.id,fullName,orderDate,orderStatus,total FROM orders,user
                            WHERE  orders.userId = user.id" ;
    $query_lietke_donhang = mysqli_query($conn,$sql_lietke_donhang);
?>

<div class="danhmuc " style=" width:86%;border-radius:4px; padding :20px 10px ;margin:20px auto ;background-color:#fff">
    <span class="danhmuc_text" style = "font-size:2rem;font-weight:500 ;color: #ee4d2d;">
        Hiển Thị Danh Sách Đơn Hàng   
    </span>
    <table class = "table table-bordered" style = "text-align: center;font-size:1.6rem">
        <thead>
            <tr style = "text-transform: capitalize;">
                <th>Stt</th>
                <th>Tên người nhận</th>  
                <th>Mã đơn hàng</th>              
                <th>Ngày đặt</th>  
                <th>Tổng tiền</th> 
                <th>Trạng thái đơn hàng</th>  
                <th colspan="2" style="text-align:center">Chức năng</th>                           
            </tr>
        </thead>
        <?php
            $i = 1;            
            while($row_donhang = mysqli_fetch_array($query_lietke_donhang)){
        ?>
        <tbody>   
            <tr style="line-height: 50px;">
                <td><?php echo $i++ ?></td>
                <td><?php echo $row_donhang['fullName']?></td>
                <td><?php echo $row_donhang['id']?></td>
                <td><?php echo date("d/m/Y",strtotime($row_donhang['orderDate']))?></td>
                <td><?php echo number_format($row_donhang['total'],0,',','.')?> ₫</td>
                <td>
                    <?php 
                        if($row_donhang['orderStatus']==0){
                            echo'Đang Chờ Xử Lý';
                        }elseif($row_donhang['orderStatus']==1){
                            echo'Đã Xác Nhận';
                        }elseif($row_donhang['orderStatus']==2){
                            echo'Đang Giao Hàng';
                        }elseif($row_donhang['orderStatus']==3){
                            echo'Đã Thanh Toán';
                        }else{
                            echo'Đã Hủy';
                        }
                    ?>
                </td>
                <td>
                    <a href="?action=quanlydonhang&query=chitiet&madonhang=<?php echo $row_donhang['id'] ?>">
                        <button class="btn btn-primary">Chi tiết</button>
                    </a>
                </td>                      
                      
            </tr>                    
        </tbody>  
        <?php
            }
        ?>           
    </table>
</div>