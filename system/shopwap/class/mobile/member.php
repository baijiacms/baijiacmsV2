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
				
					
					$outgoldinfo=array('outgold_paytype'=>$_GP['outgold_paytype'],'outgold_bankname'=>$_GP['outgold_bankname'],'outgold_bankcardname'=>$_GP['outgold_bankcardname']
					,'outgold_bankcardcode'=>$_GP['outgold_bankcardcode'],'outgold_alipay'=>$_GP['outgold_alipay'],'outgold_weixin'=>$_GP['outgold_weixin']);
		
					
							$data = array('realname' => $_GP['realname'],
                    'email' => $_GP['email'],'outgoldinfo'=>serialize($outgoldinfo));
     
				
		
				mysqld_update('member', $data,array('openid'=>$openid));
				refresh_account($openid);
			  message('资料修改成功！', mobile_url('fansindex'), 'success');
			  
							}
		   include themePage('member');