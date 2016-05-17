<?php    
 if($_CMS['addons_bj_tbk'])
        {
        	if(is_login_account())
        	{
        			
        						$bj_tbk_member_relect = mysqld_select("SELECT fmr.* FROM " .table('bj_tbk_member_relect')." as fmr where fmr.openid=:openid ",array(":openid"=>$member['openid']  ));

       			if(is_login_account())
        	{
        		
        			$dzddes=$goods['title'];
						$dzdtitle=$goods['title']; 
						$dzdpic=WEBSITE_ROOT.'/attachment/'.$goods['thumb']; 
						
        		 $getdzd=bj_tbk_get_dzd();


							if(!empty($getdzd['isdzd']))
							{
					
					
						
								if(empty($dzddes))
		        				{
		        							$dzddes=$getdzd['dzddes'];
		        				}
		        				
		        					if(empty($dzdtitle))
		        				{
		        						$dzdtitle=$getdzd['dzdtitle'];
		        				}
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
		        			 	$bj_tbk_weixin_share=bj_tbk_weixin_share('detail',array('id'=>$goods['id']),$dzdtitle,$dzdpic,$dzddes,$settings);
				       
		        		 }
        		}
				   
        	}
        	bj_tbk_shareinfo();
        }
 	  if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/detail_2.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/detail_2.php');
				}