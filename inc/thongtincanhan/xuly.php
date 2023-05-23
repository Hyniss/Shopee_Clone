<?php
    //xử lý lưu thông tin 
    
        $id = $_SESSION['idnguoidung'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $sdt = $_POST['phone'];
        $diachi = $_POST['adress'];
        $gioitinh = $_POST['gender'];
        $ngaysinh = $_POST['dob'];
        $thangsinh = $_POST['mob'];
        $namsinh = $_POST['yob'];
        $avatar = $_FILES['avatar']['name'];

        $avatar_tmp = $_FILES['avatar']['tmp_name'];
        if(isset($_POST['luu_taikhoan'])){
        if($avatar != ''){
            move_uploaded_file($avatar_tmp,'img/avatar/'.$avatar);
            $sql_xuly_profile = "UPDATE user SET fullName = '".$fullname."' , email = '".$email."' ,
                                        phone = '".$sdt."' ,adress = '".$diachi."' , gender = '".$gioitinh."' ,
                                        dob = '".$ngaysinh."' , mob = '".$thangsinh."' ,yob = '".$namsinh."' ,
                                        avatar = '".$avatar."'
                                        WHERE id = '$id' ";          
            //xóa ảnh cũ
            $sql_xoa_avatar = "SELECT * FROM user where id = '$id' LIMIT 1";
            $query_xoa_avatar= mysqli_query($conn,$sql_xoa_avatar);
            $row_xoa_avatar = mysqli_fetch_array($query_xoa_avatar);
            
            if($row_xoa_avatar['avatar'] != $avatar){
                unlink('img/avatar/'.$row_xoa_avatar['avatar']);
            }
           
            
           
        }else{
            move_uploaded_file($avatar_tmp,'img/avatar/'.$avatar);
            $sql_xuly_profile = "UPDATE user SET fullName = '".$fullname."' , email = '".$email."' ,
                                        phone = '".$sdt."' ,adress = '".$diachi."' , gender = '".$gioitinh."' ,
                                        dob = '".$ngaysinh."' , mob = '".$thangsinh."' ,yob = '".$namsinh."' ,
                                        avatar = '".$avatar."'
                                        WHERE id = '$id' "; 
           
        }
        $row = mysqli_query($conn, $sql_xuly_profile);


    }
?>
 <?php
    if(isset($_POST['capnhapdonhang'])){
        $trangthaidonhang = $_POST['trangthaidonhang'];
        $madon = $_POST['xulymadonhang'];
        $sql_update_donhang = mysqli_query($conn, "UPDATE tbl_donhang SET trangthai = '$trangthaidonhang' WHERE madonhang = '$madon'");
    }
?> 