<?php    
if ( is_use_weixin() ) {
        		
        					$dzddes=	$goods['description'];
        			
        					$dzdtitle=	$goods['title'];
        				
        					$dzdpic=	WEBSITE_ROOT.'/attachment/'.$goods['thumb'];
        				if(empty($dzddes))
        				{
        										$dzddes=	$settings['shop_description'];
        				}
        			if(empty($dzdtitle))
        				{
        					
        			
        					$dzdtitle=	$settings['shop_title'];
        				}
        		
        			if(empty($dzdpic))
        				{
        					
        				
        					$dzdpic=	WEBSITE_ROOT.'/attachment/'.$settings['shop_logo'];
        				}
        		
        				$shopwap_weixin_share=weixin_share('detail',array('id'=>$goods['id']),$dzdtitle,$dzdpic,$dzddes,$settings);
       			 }
        	
        	
	        	if ( is_use_weixin()) {
					include WEB_ROOT.'/system/common/template/mobile/weixinshare.php';
				}
				
				
				  if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/detail_3.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/detail_3.php');
				}