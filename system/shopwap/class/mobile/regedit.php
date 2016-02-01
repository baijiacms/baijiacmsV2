<?php

					
			if(empty($cfg['shop_openreg']))
			{
					message("商城已关闭注册");	
			}
					
		if (checksubmit("submit")) {
			$member = mysqld_select("SELECT * FROM ".table('member')." where mobile=:mobile ", array(':mobile' => $_GP['mobile']));
			if(!empty($member['openid']))
			{
					message($_GP['mobile']."已被注册。");	
			}
				if(empty($_GP['mobile']))
			{
					message("请输入手机号！");	
			}
			if(empty($_GP['third_login']))
			{
					if(empty($_GP['pwd']))
				{
						message("请输入密码！");	
				}
				$pwd=md5($_GP['pwd']);
		}else
		{
			$pwd='';
		}
		$shop_regcredit=intval($cfg['shop_regcredit']);
		
		$openid=date("YmdH",time()).rand(100,999);
		  $hasmember = mysqld_select("SELECT * FROM " . table('member') . " WHERE openid = :openid ", array(':openid' => $openid));
			if(!empty($hasmember['openid']))
			{
						$openid=date("YmdH",time()).rand(100,999);
			}
			$data = array('mobile' => $_GP['mobile'],
                    'pwd' => $pwd,
                    'createtime' => time(),
                    'status' => 1,
                    'istemplate'=>0,
                    'experience'=> 0 ,
                    'openid' =>$openid);
				mysqld_insert('member', $data);
				
				$member=get_session_account();
					$oldsessionid=$member['openid'];
				
				require(WEB_ROOT.'/system/common/extends/class/shopwap/class/mobile/regedit_1.php');
				
				if(!empty($shop_regcredit))
				{
				member_credit($openid,$shop_regcredit,"addcredit","注册系统赠送积分");
				}
				
	
					
				$loginid=save_member_login('',$openid);
			
					integration_session_account($loginid,$oldsessionid);
			  message('注册成功！', to_member_loginfromurl(), 'success');
		}
			$qqlogin = mysqld_select("SELECT * FROM " . table('thirdlogin') . " WHERE enabled=1 and `code`='qq'");
				if(!empty($qqlogin)&&!empty($qqlogin['id']))
				{
					$showqqlogin=true;
				}
		include themePage('regedit');