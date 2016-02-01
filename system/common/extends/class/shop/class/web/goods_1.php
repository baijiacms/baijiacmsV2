<?php
 if($_CMS['addons_bj_hx']) {
              
                  if(!empty($_GP['isverify']))
                    {
                    	if(empty($_GP['verifyshop_cb']))
	                    {
	                    	message("请添加适用门店");
	                    		
	                    }
                    		
                    }
                  }
                  
                   	if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shop/class/web/goods_1.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shop/class/web/goods_1.php');
				}