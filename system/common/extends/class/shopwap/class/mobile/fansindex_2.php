<?php 
				
			if ( is_use_weixin() ) {
        		
        					$dzddes=	$settings['shop_description'];
        			
        					$dzdtitle=	$settings['shop_title'];
        				
        					$dzdpic=	WEBSITE_ROOT.'/attachment/'.$settings['shop_logo'];
        				
        		
        				$shopwap_weixin_share=weixin_share('shopindex',array(),$dzdtitle,$dzdpic,$dzddes,$settings);
       			 }
        	
        	
	        	if ( is_use_weixin()) {
					include WEB_ROOT.'/system/common/template/mobile/weixinshare.php';
				}
				
				  if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/fansindex_2.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/fansindex_2.php');
				}