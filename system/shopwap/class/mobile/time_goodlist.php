<?php
				
        	$condition .= " AND istime = 1 and timeend>=:timeend";




       
        $list = mysqld_selectall("SELECT * FROM " . table('shop_goods') . " WHERE  deleted=0 AND status = '1' $condition  ",array(":timeend"=>time()));
  
       
				
	
        include themePage('time_goodlist');