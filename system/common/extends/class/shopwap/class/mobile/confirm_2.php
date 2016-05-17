<?php
 if($_CMS['addons_bj_message']) {
              bj_message_sendddtjtz($ordersns,($data['price']),$openid,$orderid);
  }
    if($_CMS['addons_bj_tbk'])
			        {
			        	$parentmember=bj_tbk_get_parentmember();
			        	 $weixin_wxfans = mysqld_select('select * from '.table('weixin_wxfans')." where openid=:openid limit 1",array(":openid"=>$openid));
			        	bj_tbk_sendgmsptz($ordersns,$goodsprice,$openid,$parentmember['openid']);
			      
			        }
    if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/confirm_2.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/confirm_2.php');
				}