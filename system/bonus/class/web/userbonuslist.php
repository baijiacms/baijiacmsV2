<?php
	 		
			$bonuslist = mysqld_selectall("select bonus_user.*,bonus_type.type_name,bonus_type.type_money,bonus_type.use_start_date,bonus_type.use_end_date from " . table("bonus_user")." bonus_user left join  " . table("bonus_type")." bonus_type on bonus_type.type_id=bonus_user.bonus_type_id where bonus_user.deleted=0  and `openid`=:openid order by isuse,bonus_type.send_type ",array(':openid'=>$_GP['openid'] ));
  	
        	include page('userbonuslist');