<?php
							$member=get_member_account(true,true);
					$openid =$member['openid'] ;
					$memberinfo=member_get($openid);
					if(empty($memberinfo['pwd']))
					{
						$hiddenoldpwd=true;
					}
				if (checksubmit("submit")) {
		
					
					if(!empty($memberinfo['pwd']))
					{
						if(empty($_GP['pwd']))
						{
								message("请输入密码！");	
						}
						if($memberinfo['pwd']!=md5($_GP['oldpwd']))
						{
								message("原始密码错误！");	
						}
				}
				
								$data = array('pwd' => md5($_GP['pwd']));
								if(empty($_GP['mobile']))
					{
							message("请输入手机号！");	
					}
					
					
					      if(!empty($_GP['mobile']))
           {
							if(empty($memberinfo['mobile'])||(!empty($memberinfo['mobile'])&&$memberinfo['mobile']!=$_GP['mobile']))
							{
								$ckmember = mysqld_select("SELECT * FROM ".table('member')." where mobile=:mobile ", array(':mobile' => $_GP['mobile']));
								if(!empty($ckmember['openid']))
								{
										message($_GP['mobile']."已被注册。");	
								}
								$data['mobile']=$_GP['mobile'];
							}
					}
				

				mysqld_update('member', $data,array('openid'=>$openid));
					refresh_account($openid);
			  message('密码修改成功！', mobile_url('fansindex'), 'success');
				}
					   include themePage('member_pwd');