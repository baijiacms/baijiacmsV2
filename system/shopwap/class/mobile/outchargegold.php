<?php
		   $member=get_member_account(true,true);
			$openid = $member['openid'];
       $member=member_get($openid);
       
      if(empty( $member['outgoldinfo']))
       {
       message('您的资料不完善，请提现相关账户资料。',mobile_url('member'),'error');
       }
       	$op = $_GP['op']?$_GP['op']:'display';
       	if($op=='display')
       	{
       				  if (checksubmit('submit')) {
       			
       				  		if(empty($_GP['charge'])||round($_GP['charge'],2)<=0)
		{
		message("请输入要提取的金额");	
		}	  	$fee=round($_GP['charge'],2);
		if($fee>$member['gold'])
		{
			message('账户余额不足,最多能提取'.$member['gold'].'元');
			
		}
				$ordersn= 'rg'.date('Ymd') . random(6, 1);
	 $gold_order = mysqld_select("SELECT * FROM " . table('gold_teller') . " WHERE ordersn = '{$ordersn}'");
	         if(!empty($gold_order['ordersn']))
	         {
	         		$ordersn= 'rg'.date('Ymd') . random(6, 1);
	         }
       				 	member_gold($openid,$fee,'usegold','余额提取'.$fee.'元');
       				  	mysqld_insert('gold_teller',array('openid'=>$openid,'fee'=>$fee,'status'=>0,'ordersn'=>$ordersn,'createtime'=>time()));
       				  	
       				  	require(WEB_ROOT.'/system/common/extends/class/shopwap/class/mobile/outchargegold_1.php');
       		message('余额提取申请成功！','refresh','success');
       	exit;
       	 }
       	$applygold=mysqld_selectcolumn("select sum(fee) from ".table("gold_teller")." where status=0 and openid=".	$openid);
				if(empty($applygold))
				{
				$applygold='0';	
				}
				include themePage('outchargegold');
				exit;
				}

				if($op=='history')
       	{
       		   $pindex = max(1, intval($_GP['page']));
            $psize = 20;
				       $list = mysqld_selectall("select * from ".table("gold_teller")." where openid=:openid order by createtime desc LIMIT " . ($pindex - 1) * $psize . ',' . $psize ,array(":openid"=>$openid));
            $total = mysqld_selectcolumn('SELECT COUNT(*) FROM ' . table('gold_teller') . " where  openid=:openid ",array(":openid"=>$openid));
            $pager = pagination($total, $pindex, $psize);
				
       			include themePage('outchargegold_history');
				exit;
       	}