<?php
							$member=get_member_account(true,true);
					$openid =$member['openid'] ;
					$memberinfo=member_get($openid);
				
				if (checksubmit("submit")) {
		
						if(empty($memberinfo['weixin_openid'])&&empty($memberinfo['alipay_openid']))
							{
								message("该手机号是此账户唯一绑定，无法解绑。");
								
							}
					
						if(empty($_GP['oldpwd']))
						{
								message("请输入密码！");	
						}
						if($memberinfo['pwd']!=md5($_GP['oldpwd']))
						{
								message("原始密码错误！");	
						}
					if(empty($memberinfo['mobile']))
							{
								message("手机号为空没有需要注销的信息");
								
							}
				
								$data = array('pwd' => '','mobile'=>'');
						
					
					
					 
				mysqld_update('member', $data,array('openid'=>$openid));
					refresh_account($openid);
			  message('手机号解绑成功！', mobile_url('fansindex'), 'success');
				}
					   include themePage('logoutmobile');