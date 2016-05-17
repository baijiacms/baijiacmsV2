<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: baijiacms <QQ:1987884799> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');

function system_sms_validate($tell,$smstype,$vcode) {
	$sms_cache = mysqld_select("SELECT * FROM " . table('sms_cache').'where tell=:tell and smstype=:smstype',array(":tell"=>$tell,":smstype"=>$smstype) );
 	$settings=globaSetting();
 
  if(!empty($sms_cache['vcode']))
  {
  	
  	if($vcode==$sms_cache['vcode'])
  	{
  		
  	return true;	
  	}
  	
  }
  return false;
	
	
}
function system_sms_curlsend($tell,$smstype,$sms_template_code,$sms_free_sign_name,$vcode) 
{
	 $settings=globaSetting();
	 $header = array(
		            'X-Ca-Key: '.	$settings['sms_key'],
		            'X-Ca-Secret: '.	$settings['sms_secret'],
		        );
		        
		    $url="https://ca.aliyuncs.com/gw/alidayu/sendSms?rec_num=".$tell."&sms_template_code=".$sms_template_code."&sms_free_sign_name=".$sms_free_sign_name."&sms_type=normal&extend=".$tell."&sms_param={\"code\":\"".$vcode."\",\"product\":\"百家cms\"}";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				//curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
				curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:9.0.1) Gecko/20100101 Firefox/9.0.1');
				$data = curl_exec($ch);
				curl_close($ch);

}
//$sms_template_code 短信模板
//$sms_free_sign_name 短信前面
//$smstype 区分用
function system_sms_send($tell,$smstype,$sms_template_code,$sms_free_sign_name) {
	$sms_cache = mysqld_select("SELECT * FROM " . table('sms_cache').'where tell=:tell and smstype=:smstype',array(":tell"=>$tell,":smstype"=>$smstype) );
 	$settings=globaSetting();
  if(empty($sms_cache['id'])||($sms_cache['createtime']+intval($settings['sms_secret_resec']))<=time())
  {
  	$sms_secret_count=5;
	if(!empty($settings['sms_secret_count']))
	{
		 	$sms_secret_count=intval($settings['sms_secret_count']);
	}
		if($sms_cache['checkcount']>=$sms_secret_count&&(($sms_cache['createtime']+(60*60*12))>=time()))
		{
			
		}else
		{
			$vcode=rand(10000,99999);
			$insertdate=array('createtime'=>time(),'smstype'=>$smstype,'vcode'=>$vcode,'tell'=>$tell);
			if(empty($sms_cache['id']))
			{
				$insertdate['checkcount']=1;
				
				mysqld_insert('sms_cache',$insertdate);
			}else
			{
					if($sms_cache['checkcount']>=5)
					{
						$insertdate['checkcount']=1;
					}else
					{
						$insertdate['checkcount']=$sms_cache['checkcount']+1;
					}
				mysqld_update('sms_cache',$insertdate,array('id'=>$sms_cache['id']));
			}
		
			system_sms_curlsend($tell,$smstype,$sms_template_code,$sms_free_sign_name,$vcode);
		}
  }
}
function system_sms_test($tell) 
{
	$vcode=rand(10000,99999);
	system_sms_curlsend($tell,'register_dingding',"SMS_5022016","注册验证",$vcode);
}