<?php    
		$tam = isset($_GET['quanly']) ? $_GET['quanly'] : '';
		
		if($tam =='quanlydanhmuc'){
            include("inc/slider.php");
			include("main/index.php");		
		}elseif($tam =='quanlythongtincanhan'){
			include("thongtincanhan/index.php");
		}elseif($tam =='timkiem'){
			include("main/index.php");
		}else{
            include("inc/slider.php");		
			include("main/index.php");
		}
?>

                   
         