<?php

   $member=get_member_account(true,true);
			$openid = $member['openid'];
       $member=member_get($openid);

	 $setting = mysqld_select("SELECT * FROM " . table('addon7_config') );
 $award_list = mysqld_selectall("SELECT * FROM " . table("addon7_award") . "  where `deleted`=0 and amount>0");
   

 include addons_page('index');