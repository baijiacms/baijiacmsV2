<?php 

			$hasqrcode=false;

	   if($_CMS['addons_bj_tbk'])
        {
        	$spread = mysqld_select("SELECT * FROM " . table('bj_tbk_qrcode')." order by active desc limit 1" );
			if(!empty($spread['id']))
			{
				$hasqrcode=true;
			}
        	if(is_login_account())
        	{
        			 bj_tbk_checkexist_member_relect($member['openid']);
        		$bj_tbk_member_relect = mysqld_select("SELECT fmr.* FROM " .table('bj_tbk_member_relect')." as fmr where fmr.openid=:openid ",array(":openid"=>$member['openid']  ));

        				
       		
       		
        	}
        	bj_tbk_shareinfo();
        	
        	$parent_member = mysqld_select("SELECT member.mobile,member.realname,member.openid FROM " . table('bj_tbk_member_relect')." relect left join  " . table('member')." member on member.openid=relect.parentid where relect.openid=:openid ",array(":openid"=>$member['openid']) );	
		
        	
        }

  if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/fansindex_1.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/fansindex_1.php');
				}