<?php
    $sql_danhmuc = "SELECT * FROM category ORDER BY numbers ASC" ;
    $query_danhmuc = mysqli_query($conn,$sql_danhmuc);
?>
<?php
    
    $page_item = 10 ;
    $page_current = !empty($_GET['page']) ? $_GET['page'] : 1;
    $id = !empty($_GET['id']) ? $_GET['id'] : null;
    $sort = !empty($_GET['sort']) ? $_GET['sort'] : '';
    $input_search = !empty($_GET['input_search']) ? $_GET['input_search'] : '';
    $id_category  = !empty($_GET['id']) ? $_GET['id'] : null;
    $chuoi_id =  !empty($_GET['id']) ? " and categoryId = $id " : '';
    $chuoi_sort =  !empty($_GET['sort']) ? " order by price $sort " : '';
    $sql_total_sp = "SELECT * FROM product where nameProduct like '%$input_search%'".$chuoi_id.$chuoi_sort ;
    $query_total_sp = mysqli_query($conn,$sql_total_sp);
    $query_total_sp = $query_total_sp -> num_rows;
    $total_page = ceil($query_total_sp/$page_item);
    $offset = ($page_current-1) * $page_item ;
    $sql_all_sp = "SELECT * FROM product where nameProduct like '%$input_search%' ".$chuoi_id.$chuoi_sort." LIMIT ".$page_item." OFFSET ".$offset."";

    $query_sp = mysqli_query($conn, $sql_all_sp);


    
?>

<div class="grid">    
    <div class="row" style=" padding:10px 15px;" >
        <div class="category col-lg-2">
            <h3 class="category-heading">
                <i class="fas fa-list"></i>
                Tất Cả Danh mục 
            </h3>
            <ul class="category-list">              
                <li class="category-item category-item--active">
                    <a href="index.php" class="category-item__link">Tất Cả Sản phẩm </a>
                </li>
                <?php
                    while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                ?>
                <li class="category-item">
                    <a href="index.php?quanly=quanlydanhmuc&id=<?php echo $row_danhmuc['id']?>&input_search=<?php echo $input_search ?>&sort=<?php echo $sort ?>" class="category-item__link" <?php if($row_danhmuc['id'] == $id){?>
                        style = "color:red;right:-4px" <?php } ?> >
                        <?php echo $row_danhmuc['nameCategory']?>
                    </a>
                </li>
                <?php
                    }
                ?>
            </ul>
        </div>
        <div class="col-lg-10" style="padding-right: 0;">
            <?php if(!empty($_GET['input_search'])) { ?>
            <div class="flex home-filter" style="font-size:1.8rem;padding:12px 0;margin-bottom:10px;margin-top:6px; ">
                <div class="" style="padding:0 10px 0 10px;color:#ee4d2d">
                    <i class="far fa-question-circle"></i>
                </div>
                <div class="">
                    Kết quả tìm kiếm cho từ khoá : ' <span style="color:#ee4d2d"><?php echo  $input_search ?></span> '
                </div>
            </div>
            <?php } ?>

            <?php
                include 'inc/sidebar/sidebar.php';
            ?>
            <div class="home-product">
                <div class="grid">
                    <div class="row" style=" padding:10px 10px 10px 5px">
                    <?php
                        while ($row_sp = mysqli_fetch_array($query_sp)){
                    ?>
                        <div class="col-xs-2-4">
                            <a href="./chitietsanpham.php?id=<?php echo $row_sp['id']?>" class="" style="text-decoration: none;" >
                                <div class="home-product-item">                                       
                                    <div class="home-product-item__img" style="background-image: url(./admin/modules/quanlysanpham/uploads/<?php echo $row_sp['img']?>)"></div>                   
                                    <span class="home-product-item__name">
                                        <?php  echo $row_sp['nameProduct'] ?>
                                    </span>
                                    <div class="home-product-item__price">
                                        <?php echo number_format($row_sp['price'],0,',','.').' ₫'?>
                                    </div>                                      
                                </div>
                            </a>
                        </div>   
                        <?php
                            }
                        ?>          
                    </div>
                </div>
            </div>                     
            <div class="phan_trang"> 
                <?php
                    if($page_current>2){
                       $start_page = 1;
                ?>
                    <a href="?page=<?php echo $start_page ?>&input_search=<?php echo $input_search ?>&id=<?php echo $id ?>" class="phan_trang_icon"><i class="fas fa-angle-double-left"></i></a>
                <?php
                    }if($page_current>1){
                        $prev = $page_current - 1;
                ?>
                        <a href="?page=<?php echo $prev ?>&input_search=<?php echo $input_search ?>&id=<?php echo $id ?>" class="phan_trang_icon"><i class="fas fa-chevron-left"></i> </a>
                    <?php
                        }
                    ?>
                    <?php
                        for($i=1 ; $i <= $total_page ; $i++){
                            if($i != $page_current){
                                if($i > $page_current - 3 && $i < $page_current + 3){
                    ?>
                                    <a href="?page=<?php echo $i?>&input_search=<?php echo $input_search ?>&id=<?php echo $id ?>" class="phan_trang_icon"> <?php echo $i?> </a>
                                <?php
                                    }
                                ?>
                        <?php
                            }else{
                        ?>
                        <a href="?page=<?php echo $i?>&input_search=<?php echo $input_search ?>&id=<?php echo $id ?>" class="phan_trang_icon phan_trang_icon_active "> <?php echo $i?> </a>
                        <?php
                            }
                        ?>
                    <?php
                        }if($page_current < $total_page){
                            $next_page = $page_current + 1;
                    ?>
                        <a href="?page=<?php echo $next_page ?>&input_search=<?php echo $input_search ?>&id=<?php echo $id ?>" class="phan_trang_icon"> <i class="fas fa-chevron-right"></i> </a>
                        <?php
                            }
                        ?>
                <?php
                    if($page_current < $total_page - 2){
                       $end_page = $total_page;
                ?>
                    <a href="?page=<?php echo $end_page ?>&input_search=<?php echo $input_search ?>&id=<?php echo $id ?>" class="phan_trang_icon"><i class="fas fa-angle-double-right"></i></a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>













