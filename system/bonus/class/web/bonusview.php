<?php

			$operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
					if($operation=='delete')
			{
				   if (checksubmit('submit')) {
				   		 	 foreach ($_GP['check'] as $k ) {
				   		 	 	
				   		 	 	
				mysqld_update('bonus_user',array('deleted'=>1),array('bonus_id'=>intval($k)));
				   		 	 	
				   		 	}
				   		 	
						message("批量删除成功！","refresh","success");
				  }
				mysqld_update('bonus_user',array('deleted'=>1),array('bonus_id'=>intval($_GP['id'])));
						message("删除成功！","refresh","success");
			}
			     $pindex = max(1, intval($_GP['page']));
            $psize = 20;
		$bonus_user_list = mysqld_selectall("SELECT user.*,member.mobile mobile,member.realname,orders.ordersn FROM " . table('bonus_user')." user left join " . table('member')." member on member.openid=user.openid left join " . table('shop_order')." orders on orders.id=user.order_id where user.deleted=0 and user.bonus_type_id=:bonus_type_id order by user.bonus_id desc LIMIT " . ($pindex - 1) * $psize . ',' . $psize,array(":bonus_type_id"=>$_GP['id']) );
  $total = mysqld_selectcolumn("SELECT count(user.bonus_id) FROM " . table('bonus_user')." user left join " . table('member')." member on member.openid=user.openid left join " . table('shop_order')." orders on orders.id=user.order_id where user.deleted=0 and user.bonus_type_id=:bonus_type_id",array(":bonus_type_id"=>$_GP['id']));
            $pager = pagination($total, $pindex, $psize);
            
        	include page('bonus_view');