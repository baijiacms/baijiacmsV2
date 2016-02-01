<?php
  	 if($_CMS['addons_bj_message']) {
	 	
 $order = mysqld_select("select * from " . table('shop_order') . " where id='".$orderid."'");
 
	 	
              bj_message_sendddqrshtz( $order['ordersn'],$order['openid'],$orderid);
  }
  
   	if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shop/class/web/order_1.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shop/class/web/order_1.php');
				}