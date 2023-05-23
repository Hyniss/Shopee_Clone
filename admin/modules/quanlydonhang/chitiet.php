<?php  
    if(isset($_GET['query'])=='chitiet'){
        $madonhang= $_GET['madonhang'];




        $sql_chitiet1 = " SELECT orderId,productId,img,nameProduct,color,orderStatus, orderdetail.quantity FROM orderdetail,product,orders WHERE orderdetail.productId = product.id AND orderdetail.orderId = orders.id AND  orderdetail.orderId = '$madonhang' ";
        $query_lietke_chitiet1 = mysqli_query($conn,$sql_chitiet1);
        $row_chitiet = mysqli_fetch_array($query_lietke_chitiet1)
?>
        <div class="danhmuc " style=" width:86%;border-radius:4px; padding :20px 10px ;margin:20px auto ;background-color:#fff">
            <span class="danhmuc_text" style = "font-size:2rem;font-weight:500 ;color: #ee4d2d;">
                Hiển Thị Chi Tiết Đơn Hàng 
            </span>
            <form method="post" action="modules/quanlydonhang/xuly.php">
                <input type="hidden" name="xulymadonhang" value="<?php echo $madonhang ?>">
                <div class="flex " style="margin:10px 10px;justify-content:space-between;">
                    <div style="text-transform: capitalize;">
                        
                    <div class="" style = "margin: 0 30px;">
                        <div class="">
                            <div class=""style = "font-size:1.6rem;font-weight:500 ;color: #ee4d2d;margin:0 0 5px 0;">
                                Trạng Thái Đơn Hàng :
                            </div>
                            <select name="trangthaidonhang" class="form-control" style="height:32px">
                                <option value="<?php $row_chitiet['orderStatus']?> ">
                                    <?php 
                                        if($row_chitiet['orderStatus']==0){
                                            echo'Đang Chờ Xử Lý';
                                        }elseif($row_chitiet['orderStatus']==1){
                                            echo'Đã Xác Nhận';
                                        }elseif($row_chitiet['orderStatus']==2){
                                            echo'Đang Giao Hàng';
                                        }elseif($row_chitiet['orderStatus']==3){
                                            echo'Đã Thanh Toán';
                                        }else{
                                            echo'Đã Hủy';
                                        }
                                    ?>
                                </option>
                                <option value="0">Đang Chờ Xử Lý</option>
                                <option value="1">Đã Xác Nhận</option>
                                <option value="2">Đang Giao Hàng</option>                 
                                <option value="3">Đã Thanh Toán</option>
                                <option value="4">Đã Hủy</option>
                            </select>   
                        </div>                       
                        <button 
                            class="btn btn-lg" 
                            name="capnhapdonhang" 
                            style="
                                color:#fff;font-size:14px;
                                background-color:#ee4d2d;
                                padding:10px 16px;margin:10px 0">
                                    Cập Nhập Đơn Hàng
                        </button>                      
                    </div>
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
                foreach ($query_lietke_chitiet1 as $key) {
                
                
            ?>                  
                <tbody>   
                    <tr style="line-height: 50px;">
                        <td><?php echo $key['orderId'] ?></td>  
                        <td><?php echo $key['productId']?></td>
                        <td><?php echo $key['nameProduct']?></td>
                        <td>
                            <div class="img__be" style="background-image:url(modules/quanlysanpham/uploads/<?php echo $key['img']?>);
                                                        background-repeat: no-repeat;
                                                        background-size: contain;
                                                        background-position: center;
                                                        height:50px;">  
                            </div>               
                        </td>
                        <td><?php echo $key['color']?></td>
                        <td><?php echo $key['quantity']?></td>
                                                 
                    </tr> 
            <?php
                }
            ?>    

                </tbody>                    
        </table>
            </form>
        </div>


<?php
    } else{

    }
?>

