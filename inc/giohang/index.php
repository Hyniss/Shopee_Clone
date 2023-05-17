<?php
    $cart = $_SESSION['cart'];
    $sum = 0;
?>
<div class="main">
    <div class="container">
        <div class="privacy">
            <h3 class="tittle-text">
                Giỏ hàng của bạn
            </h3>
            
                <table class="table table-bordered" style="background-color: #fff; margin-top: 20px; text-align: center; font-size: 1.6rem;">
                    <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Tên Sản phẩm</th>
                            <th>Hình ảnh sản phẩm</th>
                            <th>Màu sắc</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Giá tổng</th>
                            <th style="text-align: center;">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            $total=0;
                            foreach ($cart as $id => $each) 
                            {
                                $subtotal = $each['quantity'] * $each['price'];
                                $total += $subtotal;
                        ?>
                        <tr style="line-height: 50px;">
                            <td><?php echo $i++?></td>
                            <td><?php echo $each['name'] ?></td>
                            <td>
                                <div
                                    class="img__be"
                                    style="background-image: url(./admin/modules/quanlysanpham/uploads/<?php echo $each['img']?>); background-repeat: no-repeat; background-size: contain; background-position: center; height: 50px;"
                                ></div>
                            </td>
                            <td><?php echo $each['color']?></td>
                            <td>
                                <input type="number" min="1" class="quantity" name="soluong" value="<?php echo $each['quantity']?>" />
                                <input type="hidden" name="product_id" value="<?php echo $id?>" />
                            </td>
                            <td>
                                <?php echo number_format($each['price'],0,',','.')?>
                                <span style="color: #d0011b; font-size: 1.4rem; margin-left: 2px;">₫</span>
                            </td>
                            <td>
                                <?php echo number_format($subtotal,0,',','.')?>
                                <span style="color: #d0011b; font-size: 1.4rem;">₫</span>
                            </td>

                            <td>
                                <a href="./inc/giohang/xulyxoa.php?xoa=<?php echo $id ?>" class="btn btn-primary" style="font-size: 1.6rem;">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <td colspan="8">
                                <span style="color: #d0011b;">Tổng số tiền thanh toán sản phẩm : </span>
                                <span style="color: #d0011b;"><?php echo number_format($total,0,',','.')?></span>
                                <span style="color: #d0011b; font-size: 1.4rem;">₫</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <button class="btn btn-muahang" name="capnhapgiohang" style="font-size: 1.4rem;">
                                    <span> Cập nhập giỏ hàng </span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                   
                <form action="./inc/giohang/xuly.php" method="post">  
                <div class="add__danhmuc" style="margin: 20px 0; background-color: #fff; padding: 10px 20px; border-radius: 4px;">
                    <div class="panel panel-primary">                      
                        <div class="panel-heading" style="margin: 30px 0; color: #ee4d2d; text-transform: capitalize;">
                            <?php
                                if(!isset($_SESSION['idnguoidung'])){
                            ?>
                            <h2 class="text-left">Đăng ký nhanh để mua hàng :</h2>
                            <?php
                            }else{
                            ?>
                    
                            <h2 class="text-left">Hình thức mua hàng :</h2>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="panel-body" style="margin: 10px 0; font-size: 1.4rem;">
                            <?php
                                if(!isset($_SESSION['idnguoidung'])){
                            ?>
                            <div class="form-group">
                                <label>Tên đăng nhập <span style="color: red;"> * </span> :</label>
                                <input type="text" autocomplete="off" class="form-control" name="taikhoan" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu <span style="color: red;"> * </span> :</label>
                                <input type="password" autocomplete="off" class="form-control" name="matkhau" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Họ và tên <span style="color: red;"> * </span> :</label>
                                <input type="text" autocomplete="off" class="form-control" name="fullname" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại <span style="color: red;"> * </span> :</label>
                                <input type="number" class="form-control" autocomplete="off" name="sdt" />
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ nhận hàng <span style="color: red;"> * </span> :</label>
                                <input type="text" autocomplete="off" class="form-control" name="diachi" />
                            </div>
                            <div class="form-group">
                                <label>Hình thức thanh toán :</label>
                                <select name="hinhthucthanhtoan" class="form-control" style="height: 32px;">
                                    <option value="0">Thanh toán khi nhận hàng</option>
                                    <option value="1">Thanh toán qua ATM</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú :</label>
                                <textarea type="text" autocomplete="off" class="form-control" name="note" placeholder="thêm ghi chú"></textarea>
                            </div>
                        </div>
                        
                        <div class="flex justify-content-center" style="padding: 10px 0 20px 0;">
                            <button class="btn btn-muahang" name="thanhtoan1" style="font-size: 1.4rem;">
                                Thanh toán
                            </button>
                        </div>

                        <?php
                            }else{
                        ?>
                         
                        <div class="form-group">
                            <label>Hình thức thanh toán :</label>
                            <select name="hinhthucthanhtoan" class="form-control" style="height: 32px;">
                                <option value="0">Thanh toán khi nhận hàng</option>
                                <option value="1">Thanh toán qua ATM</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Ghi chú :</label>
                            <textarea type="text" autocomplete="off" class="form-control" name="ghichu" placeholder="thêm ghi chú"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id_nguoidung" value="<?php echo $_SESSION['idnguoidung'] ?>" />
                    <div class="flex justify-content-center" style="padding: 10px 0 20px 0;">
                        <button class="btn btn-muahang" name="thanhtoan2" style="font-size: 1.4rem;">
                            Thanh toán
                        </button>
                    </div>
                    <?php 
                            }
                        ?>
                </div>
            </form>
        </div>
    </div>
</div>
