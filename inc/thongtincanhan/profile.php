<?php
    $sql_fullname = "SELECT * FROM user where id = '$_SESSION[idnguoidung]'";
    $query_fullname = mysqli_query($conn,$sql_fullname);
    $row_fullname = mysqli_fetch_array($query_fullname);
       
?>


<form action="?quanly=quanlythongtincanhan&query=xuly" method="post" enctype="multipart/form-data">
    <div class="list__profile">
        <div class="list__profile-title">
            <div class="list__profile-title1">Hồ Sơ Của Tôi</div>
            <div class="list__profile-title2">Quản lý thông tin hồ sơ để bảo mật tài khoản</div>
        </div>
        <div class="flex list__profile-main">
            <div class="col-sm-8">
                <div class="flex form-group list__profile--name">
                    <div class="col-sm-3 profile--name">Tên Đăng Nhập :</div>
                    <div class="col-sm-9" style="padding:4px 0 0 0"><?php echo $row_fullname['userName'] ?></div>
                </div>
                <div class="flex form-group list__profile--name">
                    <div class="col-sm-3 profile--name">Họ Và Tên :</div>
                    <input type="text" name="fullname" class="col-sm-9 form-control" value="<?php echo $row_fullname['fullName'] ?>"></input>
                </div>
                <div class="flex form-group list__profile--name">
                    <div class="col-sm-3 profile--name">Email :</div>
                    <input type="email" name= "email" class="col-sm-9 form-control" value="<?php echo $row_fullname['email'] ?>"></input>
                </div>
                <div class="flex form-group list__profile--name">
                    <div class="col-sm-3 profile--name">Số Điện Thoại :</div>
                    <input type="number" name="phone" class="col-sm-9 form-control" value="<?php echo $row_fullname['phone'] ?>"></input>
                </div>
                <div class="flex form-group list__profile--name">
                    <div class="col-sm-3 profile--name">Địa chỉ:</div>
                    <input type="text" name="adress" class="col-sm-9 form-control" value="<?php echo $row_fullname['adress']?>"></input>
                </div>
                <div class="flex form-group list__profile--name">
                    <div class="col-sm-3 profile--name">Giới Tính :</div>
                    <div class="col-sm-9 " style="padding:0">
                        <select name="gender" class="col-sm-3 form-control" style="height:32px;font-size:1.4rem;">
                            <option value="<?php echo $row_fullname['gender']?>">
                                <?php 
                                    if($row_fullname['gender']==0){
                                        echo'Nam';
                                    }elseif($row_fullname['gender']==1){
                                        echo'Nữ';
                                    }else{
                                        echo'Khác';
                                    }
                                ?>
                            </option>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option value="2">Khác</option>     
                         </select>            
                    </div>
                </div>
                <div class="flex form-group list__profile--name">
                    <div class="col-sm-3 profile--name">Ngày sinh :</div>
                    <div class="col-sm-3 " style="padding-left:0">
                        <select class="form-control" name="dob" style="height:30px;font-size:1.4rem;">
                            <option value="<?php echo $row_fullname['dob'] ?>">
                               <?php echo $row_fullname['dob'] ?>
                            </option>
                            <?php for($i=1;$i<=31;$i++){?>
                                <option value="<?php echo $i?>"><?php echo $i?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class=" form-control" name="mob" style="height:30px;font-size:1.4rem">
                            <option value="<?php echo $row_fullname['mob'] ?>"> 
                                Tháng <?php echo $row_fullname['mob'] ?>
                            </option>
                            <?php for($i=1;$i<=12;$i++){?>
                                <option value="<?php echo $i?>">Tháng <?php echo $i?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select class=" form-control" name="yob" style="height:30px;font-size:1.4rem" >
                            <option value="<?php echo $row_fullname['yob']?>">
                                <?php echo $row_fullname['yob'] ?>
                            </option>
                            <?php for($i=2021;$i>=1930;$i--){?>
                                <option value="<?php echo $i?>"><?php echo $i?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div style="padding:20px  0 10px 50%">
                    <button class="btn btn-luu"  name="luu_taikhoan" style="font-size: 1.4rem;">Lưu</button>
                </div>
                
            </div>
    
            <div class="col-sm-4">
                <div class="profile__avatar">
                    <div  class = "profile__avatar-img" >
                        <image 
                            style="height:100px;width:100px;border-radius: 50%;"
                            id = "uploadavatar"
                            src =" ./img/avatar/<?php echo $row_fullname['avatar'] ?> "
                        >        
                        </image>
                    </div>
                    
                    <input 
                        type="file"  
                        accept=".jpg,.jpeg,.png" 
                        class="btn custom-file-input" 
                        name="avatar" 
                        id="upload" 
                        style = "margin:0 92px ;padding:23px;width:92px; position: absolute;" 
                        
                    >
                    <button class="btn btn-light" style="padding:10px ;border: 1px solid black;font-size:1.6rem;margin: 0 92px;">Chọn ảnh</button>
                    <div class="profile__avatar-note">
                        <div class="profile__avatar-note-text">Dung lượng file tối đa 1 MB</div>
                        <div class="profile__avatar-note-text">Định dạng:.JPEG, .PNG</div>
                    </div>
                </div>
                <script>             
                    const input = document.getElementById("upload");
                    const image = document.getElementById("uploadavatar");

                    input.addEventListener("change", (e) => {
                    if (e.target.files.length) {
                        const src = URL.createObjectURL(e.target.files[0]);
                        image.src = src;
                    }
                    });
                </script>
            </div>
        </div>
    </div>

</form>