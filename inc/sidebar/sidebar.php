
<div class="home-filter">
    <span class="home-filter__label">
        Sắp xếp theo
    </span>
    <button class="home-filter__btn btn" style="font-size:14px;" > Phổ biến </button>
    <button class="btn home-filter__btn" style="font-size:14px;"> Mới nhất </button>
    <button class="btn home-filter__btn" style="font-size:14px;"> Bán chạy </button>
    <div class="select-input">
        <?php 
        if($sort==''){
            $price_sort = "Giá";
        }else{
            $price_sort = $sort == 'asc' ? "Giá : Thấp đến cao" : "Giá : Cao đến thấp";
        }
        ?>
        <span class="select-input__label"> <?php echo $price_sort ?> </span>
        <i class="fa fa-angle-down" aria-hidden="true"></i>
        <ul class="select-input__list" >
            <li class="select-input__item">
                <a href="index.php?sort=asc&id=<?php echo $id ?>" class="select-input__link" > Giá : Thấp đến cao</a>
            </li>
            <li class="select-input__item">                                        
                <a href="index.php?sort=desc&id=<?php echo $id ?>" class="select-input__link"> Giá : Cao đến thấp </a>
            </li>
        </ul>
    </div>
    <div class="home-filter__page">
        <span class="home-filter__page-num">
            <span class="home-filter__page-current"><?php echo $page_current ?></span>/<?php echo $total_page ?>
        </span>
        <div class="home-filter__page-control">
            <?php
            if($page_current>1){
                        $prev = $page_current - 1;
                ?>
                        
                         <a href="?page=<?php echo $prev ?>" class="home-filter__page-btn ">
                <i class="home-filter__page-icon fa fa-angle-left" aria-hidden="true"></i>
                        </a>
                    <?php
                        }
                    ?>
                    <?php
                        if($page_current < $total_page){
                            $next_page = $page_current + 1;
                    ?>
                        <a href="?page=<?php echo $next_page ?>" class="home-filter__page-btn">
                    <i class="home-filter__page-icon fa fa-angle-right" aria-hidden="true"></i>
                        </a>
                        <?php
                            }
                        ?>
            
        </div>
    </div>
</div>
