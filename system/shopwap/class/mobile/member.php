<?php
							$member=get_member_account(true,true);
					$openid =$member['openid'] ;
					$memberinfo=member_get($openid);
					if ( is_use_weixin() ) {
$weixinthirdlogin = mysqld_select("SELECT * FROM " . table('thirdlogin') . " WHERE enabled=1 and `code`='weixin'");

if(!empty($weixinthirdlogin)&&!empty($weixinthirdlogin['id']))
{
	$isweixin=true;
					$weixin_openid=get_weixin_openid();
				}
			}
			if (checksubmit("submit")) {
				$member = mysqld_select("SELECT * FROM ".table('member')." where openid=:openid ", array(':openid' => $openid));
		
					$member1 = mysqld_select("SELECT * FROM ".table('member')." where mobile=:mobile ", array(':mobile' => $_GP['mobile']));
			if(!empty($member1['openid'])&&$member1['openid']!=$member['openid'])
			{
					message($_GP['mobile']."已被注册。");	
			}
					
					$outgoldinfo=array('outgold_paytype'=>$_GP['outgold_paytype'],'outgold_bankname'=>$_GP['outgold_bankname'],'outgold_bankcardname'=>$_GP['outgold_bankcardname']
					,'outgold_bankcardcode'=>$_GP['outgold_bankcardcode'],'outgold_alipay'=>$_GP['outgold_alipay'],'outgold_weixin'=>$_GP['outgold_weixin']);
			if(empty($_GP['realname']))
			{
			message("用户名不能空");	
				
			}
					if(empty($_GP['mobile']))
			{
			message("手机号不能空");	
				
			}
			$doaction=true;
			if(!empty($cfg['regsiter_usesms']))
			{
			$doaction=false;
					if($member['mobile']!=$_GP['mobile']&&empty($_GP['fromsmspage']))
				{
						  system_sms_send($_GP['mobile'],'change_mobile',"SMS_5022016","注册验证");
							  	include themePage('member_smscheck');
							  	exit;
				}
					if(!empty($_GP['fromsmspage']))
				{
							  $vcode_check=system_sms_validate($_GP['mobile'],'change_mobile',$_GP['mobilecode']);
							  if( $vcode_check)
							  {
							  		$doaction=true;
							  
							  }else
							  {
							 	 message("验证码错误");		
							  }
				}
	}
				if($doaction)
					{
							$data = array('realname' => $_GP['realname'],'mobile' => $_GP['mobile'],
                    'email' => $_GP['email'],'outgoldinfo'=>serialize($outgoldinfo));
     
				mysqld_update('member', $data,array('openid'=>$openid));
				refresh_account($openid);
			  message('资料修改成功！', mobile_url('fansindex'), 'success');
				}
							}
		   include themePage('member');