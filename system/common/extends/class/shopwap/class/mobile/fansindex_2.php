<?php 
					 if($_CMS['addons_bj_tbk']&&is_use_weixin())
        {
        	
        	if(is_login_account())
        	{
        		 $getdzd=bj_tbk_get_dzd();
        		 	if(!empty($getdzd['isdzd']))
							{
								$dzddes=$getdzd['dzddes'];
								$dzdtitle=$getdzd['dzdtitle'];
							//	$dzdpic=$getdzd['dzdpic'];
							 
							}
        			if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
        				if(empty($dzddes))
        				{
        					$dzddes=	$settings['bj_tbk_description'];
        				}
        				
        					if(empty($dzdtitle))
        				{
        					$dzdtitle=	$settings['shop_title'];
        				}
        					if(empty($dzdpic))
        				{
        					$dzdpic=	WEBSITE_ROOT.'/attachment/'.$settings['shop_logo'];
        				}
        			
        				$bj_tbk_weixin_share=bj_tbk_weixin_share('shopindex',array(),$dzdtitle,$dzdpic,$dzddes,$settings);
       			 }
        	
        	
	        	if ( strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false ) {
					include WEB_ROOT.'/addons/bj_tbk/template/mobile/weixinshare.php';
				}
			}
				}else
				{
				if ( is_use_weixin() ) {
        		
        					$dzddes=	$settings['shop_description'];
        			
        					$dzdtitle=	$settings['shop_title'];
        				
        					$dzdpic=	WEBSITE_ROOT.'/attachment/'.$settings['shop_logo'];
        				
        		
        				$shopwap_weixin_share=weixin_share('shopindex',array(),$dzdtitle,$dzdpic,$dzddes,$settings);
       			 }
        	
        	
	        	if ( is_use_weixin()) {
					include WEB_ROOT.'/system/common/template/mobile/weixinshare.php';
				}
		}
				  if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/fansindex_2.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/fansindex_2.php');
				}
		