<?php
  	 if($_CMS['addons_bj_message']) {
	 	

	 	
              bj_message_sendsyetxcgtz( $gold_teller['fee'],$gold_teller['openid']);
  }
   	if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shop/class/web/outchargegold_2.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shop/class/web/outchargegold_2.php');
				}