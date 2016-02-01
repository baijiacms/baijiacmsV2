<?php
  	 if($_CMS['addons_bj_message']) {
	 	
 $order = mysqld_select("select * from " . table('shop_order') . " where id='".$orderid."'");
 $express_dispatch = mysqld_select("select * from " . table('dispatch') . " where code='".$order['express']."'");
 

              bj_message_sendddfhtz( $order['ordersn'],$express_dispatch['name'],$order['expresssn'],$order['openid'],$orderid);
  }
  	if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shop/class/web/order_4.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shop/class/web/order_4.php');
				}