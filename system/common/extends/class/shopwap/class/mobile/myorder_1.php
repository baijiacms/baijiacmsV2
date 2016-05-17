<?php
 if($_CMS['addons_bj_tbk'])
			        {
			        	bj_tbk_sendxjdlshtz($orderid);
			        	  		 bj_tbk_checkexist_member_relect($openid);
			        }
 if($_CMS['addons_bj_message']) {
	 	

              bj_message_sendddqrshtz( $order['ordersn'],$order['openid'],$orderid);
  }
  
    if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/myorder_1.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/myorder_1.php');
				}