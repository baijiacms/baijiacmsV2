<?php
 if($_CMS['addons_bj_message']) {
              bj_message_sendddtjtz($ordersns,($data['price']),$openid,$orderid);
  }
  
    if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/confirm_2.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/confirm_2.php');
				}