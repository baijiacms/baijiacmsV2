<?php
				if (checksubmit("submit")) {
					if(empty($_GP['mobile']))
					{
					message("请输入手机号");	
					}
					if(empty($_GP['pwd']))
					{
					message("请输入密码");	
					}
					
				$member=get_session_account();
				$oldsessionid=$member['openid'];
			$loginid=member_login($_GP['mobile'],$_GP['pwd']);
			if($loginid==-1)
			{
					message("账户已被禁用！");	
			}
			if(empty($loginid))
			{
			message("用户名或密码错误");	
			}else
			{
				integration_session_account($loginid,$oldsessionid);
				header("location:".to_member_loginfromurl());		
			}
		}
			$qqlogin = mysqld_select("SELECT * FROM " . table('thirdlogin') . " WHERE enabled=1 and `code`='qq'");
				if(!empty($qqlogin)&&!empty($qqlogin['id']))
				{
					$showqqlogin=true;
				}
			include themePage('login');