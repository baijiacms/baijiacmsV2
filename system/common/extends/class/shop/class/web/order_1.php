<?php
  	 if($_CMS['addons_bj_message']) {
	 	
 $order = mysqld_select("select * from " . table('shop_order') . " where id='".$orderid."'");
 
	 	
              bj_message_sendddqrshtz( $order['ordersn'],$order['openid'],$orderid);
  }
    	 if($_CMS['addons_bj_tbk'])
			        {
			        	bj_tbk_sendxjdlshtz($orderid);
			        	 bj_tbk_checkexist_member_relect($order['openid']);
			        }
   	if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shop/class/web/order_1.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shop/class/web/order_1.php');
				}