<?php
if($_CMS['addons_bj_tbk'])
        {
        	if(is_login_account())
        	{
        				
        					
       			 $member=get_member_account(true,true);
       				bj_tbk_shareinfo();
       			    bj_tbk_checkexist_member_relect($member['openid']);
       			
        		$dzdpic=$member['avatar'];
        	}
        	bj_tbk_shareinfo();
        
	        	   
        $getdzd=bj_tbk_get_dzd();

				
					if(!empty($getdzd['isdzd']))
					{
						$dzddes=$getdzd['dzddes'];
						$dzdtitle=$getdzd['dzdtitle'];
						$dzdpic=$getdzd['dzdpic'];

			if(empty($dzdpic)&&!empty($member['avatar']))
			{
				$dzdpic=$member['avatar'];
			}
							$weixinfans=get_weixin_fans_byopenid($member['openid'],$member['openid']);
		
			if(empty($dzdpic)&&!empty($weixinfans)&&!empty($weixinfans['avatar']))
			{
				$dzdpic=$weixinfans['avatar'];
			}
									if(empty($dzdpic))
        				{
        					$dzdpic=	WEBSITE_ROOT.'/attachment/'.$settings['shop_logo'];
        				}
        		
						$isdzd=true;
						include themePage('dzd_shopindex');	
					 
					}


        }
    if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/shopindex_1.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/shopindex_1.php');
				}