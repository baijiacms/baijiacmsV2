<?php 
	$settings=globaSetting();
        		
		    	$member=get_member_account(false);
				$member=member_get($member['openid']);
			if(empty($member['openid']))
				{
				$member=get_member_account(false);	
				$member['createtime']=time();
				}
			$is_login=is_login_account();
			$weixinid=$_SESSION[MOBILE_WEIXIN_OPENID];
			$weixinfans=get_weixin_fans_byopenid($member['openid'],$weixinid);
			if(!empty($weixinfans)&&!empty($weixinfans['avatar']))
			{
				$avatar=$weixinfans['avatar'];
			}
			if($is_login)
			{
					$fansindex_menu_list = mysqld_selectall("SELECT * FROM " . table('shop_diymenu')." where menu_type='fansindex' order by torder desc" );	
			}
		
		$nologout=false;	
			if ( is_use_weixin() ) {
$weixinthirdlogin = mysqld_select("SELECT * FROM " . table('thirdlogin') . " WHERE enabled=1 and `code`='weixin'");

if(!empty($weixinthirdlogin)&&!empty($weixinthirdlogin['id']))
{
$nologout=true;
}
}
			
					require(WEB_ROOT.'/system/common/extends/class/shopwap/class/mobile/fansindex_1.php');
			 
			include themePage('fansindex');
			
		
					require(WEB_ROOT.'/system/common/extends/class/shopwap/class/mobile/fansindex_2.php');
			 