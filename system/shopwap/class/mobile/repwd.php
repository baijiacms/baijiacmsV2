<?php

					
		if(empty($cfg['regsiter_usesms']))
		{
			
			message("未开启短信接口无法进行密码取回");	
		}
				
		if (checksubmit("submit")) {
				if(empty($_GP['mobile']))
			{
					message("请输入手机号！");	
			}
			$member = mysqld_select("SELECT * FROM ".table('member')." where mobile=:mobile ", array(':mobile' => $_GP['mobile']));
			if(empty($member['openid']))
			{
					message("未找到相关账户！");	
			}
	
	
		if(empty($_GP['fromsmspage']))
		{
			  system_sms_send($_GP['mobile'],'change_pwd',"SMS_5022014","修改密码验证码");
					  	include themePage('repwd_newpwd');
					  	exit;
		}
			if(!empty($_GP['fromsmspage']))
		{
		
		if(empty($_GP['mobilecode']))
		{
				  message("请输入手机验证码。");
				  exit;
		}
						if($_GP['renewpwd']!=$_GP['recheckpwd'])
			{
				  message("两次密码不相同！");
				  exit;
			}
					 $vcode_check=system_sms_validate($_GP['mobile'],'change_pwd',$_GP['mobilecode']);
				
					  if( $vcode_check)
					  {
					 		$pwd=md5($_GP['recheckpwd']);
							mysqld_update('member',array('pwd'=>$pwd),array('openid'=>$member['openid']));
								  message('密码修改成功！', mobile_url('login'), 'success');
					  }else
					  {
					  	
					  		  message("验证码错误");		
					  	
					  }
		}
		
		
		
		
		
		}
	
		include themePage('repwd');