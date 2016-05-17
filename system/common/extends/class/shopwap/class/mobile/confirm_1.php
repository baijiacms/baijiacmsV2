<?php
 if($_CMS['addons_bj_tbk'])
			        {
			        	if(!empty($ogid))
			        	{
			        	
			        		bj_tbk_create_commission_order($orderid,$ogid);
			     		  }
			        }
    if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/confirm_1.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/confirm_1.php');
				}