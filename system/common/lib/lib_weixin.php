<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 百家威信 <QQ:2752555327> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');

function get_weixin_fans_byopenid($openid,$weixin_openid) {
		$weixin_wxfans = mysqld_select("SELECT * FROM ".table('weixin_wxfans')." where openid=:openid or weixin_openid=:weixin_openid", array(':openid' => $openid,':weixin_openid' => $weixin_openid));
		return $weixin_wxfans;
}
function get_js_ticket() {
 	$configs=globaSetting(array("jsapi_ticket","jsapi_ticket_exptime"));

		$jsapi_ticket=$configs['jsapi_ticket'];
		$jsapi_ticket_exptime = intval($configs['jsapi_ticket_exptime']);
		if(empty($jsapi_ticket)||empty($jsapi_ticket_exptime)||$jsapi_ticket_exptime< time()) {
			
			$accessToken = get_weixin_token();
    	 $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
     		$content = http_get($url);
      $res = @json_decode($content,true);
      $ticket = $res['ticket'];
      
      if (!empty($ticket)) {
      	$cfg = array(
						'jsapi_ticket' => $ticket,
						'jsapi_ticket_exptime' => time() + intval($res['expires_in'])
					);
					refreshSetting($cfg);
      	return $ticket;
      }
      return '';
			
			} else {
			return $jsapi_ticket;
			}
	}
function get_weixin_token($refresh=false) {
	if($refresh)
	{
			$cfg = array('weixin_access_token'=>'');
		refreshSetting($cfg);
	}
	$configs=globaSetting(array("weixin_access_token","weixin_appId","weixin_appSecret"));
	$weixin_access_token=unserialize($configs['weixin_access_token']);
	if(is_array($weixin_access_token) && !empty($weixin_access_token['token']) && !empty($weixin_access_token['expire']) && $weixin_access_token['expire'] > TIMESTAMP) {
		return $weixin_access_token['token'];
	} else {
			$appid = $configs['weixin_appId'];
			$secret = $configs['weixin_appSecret'];
		
		if (empty($appid) || empty($secret)) {
			message('请填写公众号的appid及appsecret！');
		}
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret={$secret}";
		$content = http_get($url);
		if(empty($content)) {
			message('获取微信公众号授权失败, 请稍后重试！');
		}
		$token = @json_decode($content, true);
		if(empty($token) || !is_array($token)) {
			message('获取微信公众号授权失败, 请稍后重试！ 公众平台返回原始数据为:' . $token);
		}
		if(empty($token['access_token']) || empty($token['expires_in'])) {
			message('解析微信公众号授权失败, 请稍后重试！');
		}
		$record = array();
		$record['token'] = $token['access_token'];
		$record['expire'] = TIMESTAMP + $token['expires_in'];
		$cfg = array('weixin_access_token'=>serialize($record));
		refreshSetting($cfg);
		return $record['token'];
	}
}

function weixin_send_custom_message($from_user,$msg) {
	  
    	$access_token=get_weixin_token();
    	 $url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$access_token}";
 	$msg = str_replace('"', '\\"',$msg);
  $post='{"touser":"'.$from_user.'","msgtype":"text","text":{"content":"'.$msg.'"}}';

    http_post($url,$post);
    	
} 
function weixin_send_custom_msgnews($from_user,$title,$turl,$picurl,$description) {
	  
    	$access_token=get_weixin_token();
    	 $url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$access_token}";
 	$msg = str_replace('"', '\\"',$msg);
  $post='{"touser":"'.$from_user.'","msgtype":"news","news":{"articles":[{"title":"'.$title.'", "description":"'.$description.'", "url":"'.$turl.'",  "picurl":"'.$picurl.'"}]}}';

    http_post($url,$post);
    	
} 

function weixin_share($mobile_url,$mobilearray,$sharetitle,$shareimg,$sharedesc,$settings)
	{
			$shareimg=$shareimg;
			 
        $sharelink = WEBSITE_ROOT . mobile_url($mobile_url, $mobilearray);
 
    
			  $sharedata = array(
      "title"       => $sharetitle,
      "imgUrl"       => $shareimg,
      "link"      => $sharelink,
      "description" => $sharedesc
    );
    
      $signPackage = weixin_js_signPackage($sharedata);
		return $signPackage;
	}

function is_use_weixin()
{
		$configs=globaSetting();
		$no_access=intval($configs['weixin_noaccess']);
		if(empty($configs['weixin_appId']))
		{
			return false;
			}
		if(empty($configs['weixin_appSecret']))
		{
			return false;
		}
	if ((strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')!== false)&&empty($no_access)) {
		
		return true;
	}
	return false;
}

if ( is_use_weixin() ) {

function weixin_code_access_token($state=0,$scope="snsapi_base",$refresh=false)
	{

		global $_GP;
		$tokenSession="weixin_token_".$state.$scope;
		if($refresh)
		{
		unset($_SESSION[SESSION_PREFIX.$tokenSession]);	
		}
		if(!empty($_SESSION[SESSION_PREFIX.$tokenSession]))
		{
		$sessionToken=unserialize($_SESSION[SESSION_PREFIX.$tokenSession]);
		}
			if(empty($sessionToken)||empty($sessionToken['access_token'])||empty($sessionToken['expires_in'])||$sessionToken['expires_in']< time()) {
		
			$settings=globaSetting();
			
				$appid = $settings['weixin_appId'];
		if($refresh||empty($_GP['code']))
		{
			$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if($state==1)
			{
			$scope="snsapi_userinfo";
			
		}else{
			$scope="snsapi_base";
		}
			$oauth2_code = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appid."&redirect_uri=".urlencode($url)."&response_type=code&scope=".$scope."&state=".$state."#wechat_redirect";//$state 0 不拉取用户资料 1拉取用户资料
			header("location:$oauth2_code");
			exit;
		}else
		{
				$code=$_GP['code'];
				$secret = $settings['weixin_appSecret'];
			
			
				$oauth2_code = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$appid."&secret=".$secret."&code=".$code."&grant_type=authorization_code";
		    
		    $content = http_get($oauth2_code);
		    $token = @json_decode($content, true);
		   if(!empty($token['expires_in']))
		   {
		   $token['expires_in']=time()+$token['expires_in']-10;
			  }
		 	 $_SESSION[SESSION_PREFIX.$tokenSession]=serialize($token);
		    return $token;
		}
	}else
	{
		return $sessionToken;
	}
		
	}
	
function xoauth() {
//	message("维护中");
		global $_GP;
		//用户不授权返回提示说明
		if ($_GP['code']=="authdeny"){
			echo "authdeny";
			 exit;
		}	
		$state=$_GP['state'];
	if ($state==1){
		$token=weixin_code_access_token(1,"snsapi_userinfo");
	}else
	{
			$token=weixin_code_access_token(0,"snsapi_base");
	}
		if(!empty($token))
		{
			 $from_user = $token['openid'];
				$access_token =get_weixin_token();
				$oauth2_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$from_user."&lang=zh_CN";
			
			
				$content = http_get($oauth2_url);
				$info = @json_decode($content, true);
				
							if($info['subscribe']==1)
				{
					$follow=1;
					
				}else
				{
					$follow=0;
					
				}
			$fans = mysqld_select("SELECT * FROM " . table('weixin_wxfans') . " WHERE weixin_openid=:weixin_openid ", array(':weixin_openid' =>$from_user));
		  $gender=$info["gender"];
			$nickname=$info["nickname"];
			
		 if(empty($fans)||empty($fans['weixin_openid'])||empty($fans["nickname"]))
			{
			
				if($follow==0&&$state==0)
				{
					weixin_code_access_token(1,"snsapi_userinfo",true);
					return;
				}
		
				if($follow==0&&$state==1)
				{
				    $access_token = $token['access_token'];
						$oauth2_url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$from_user."&lang=zh_CN";
						$content = http_get($oauth2_url);
						$info = @json_decode($content, true);
				}
		
				/*
				if(empty($info) || !is_array($info) || empty($info['openid'])   ) {
					weixin_code_access_token(1,"snsapi_userinfo",true);
					return;
				}*/
		
			
					$gender=$info['sex'];
					$nickname=$info["nickname"];
					
				}
			if(empty($fans['weixin_openid']))
			{
				  		$row = array(
					'nickname'=> $nickname,
					'follow' => $follow,
					'gender' => intval($gender),
					'weixin_openid' => $from_user,
					'avatar'=>'',
					'createtime' => TIMESTAMP
				);
					mysqld_insert('weixin_wxfans', $row);	
					if(!empty($info["headimgurl"])){
				mysqld_update('weixin_wxfans', array('avatar'=>$info["headimgurl"]), array('weixin_openid' => $from_user));	
					}
				}else
				{
					
					$row = array(
					'follow' => $follow,
					'gender' => intval($gender),
					'avatar'=>''
				);
				if(!empty($nickname))
				{
					$row['nickname']=$nickname;
				}
				mysqld_update('weixin_wxfans', $row, array('weixin_openid' => $from_user));	
				
				
						if(!empty($info["headimgurl"])){
				mysqld_update('weixin_wxfans', array('avatar'=>$info["headimgurl"]), array('weixin_openid' => $from_user));	
					}
					
				}
				if(!empty($fans['openid'])&&!empty($nickname))
				{
					$member = mysqld_select("SELECT realname FROM " . table('member') . " WHERE openid=:openid ", array(':openid' =>$fans['openid']));
		 	if(empty($member['realname']))
		 	{
		 		mysqld_update('member', array('realname'=>$nickname), array('openid' => $fans['openid']));
		 	}
					
					
				}
				
				
				
				return $from_user;
		}
		return '';
	
	}

function get_weixin_openid($state=0) {
		global $_GP;
			$settings=globaSetting(array("weixin_appId","weixin_appSecret"));
				$appid = $settings['weixin_appId'];
				$secret = $settings['weixin_appSecret'];
				if(empty($appid) || empty($secret)){
					message('微信公众号没有配置公众号AppId和公众号AppSecret!') ;
				}
		if(!empty($_SESSION[MOBILE_WEIXIN_OPENID])&&!empty($_SESSION[MOBILE_SESSION_ACCOUNT])&&!empty($_SESSION[MOBILE_SESSION_ACCOUNT]['openid']))
		{
		$weixinfans = mysqld_select("SELECT * FROM " . table('weixin_wxfans') . " WHERE weixin_openid=:weixin_openid ", array(':weixin_openid' => $_SESSION[MOBILE_SESSION_ACCOUNT]['openid']));
		 if(empty($weixinfans['weixin_openid'])||$_SESSION[MOBILE_WEIXIN_OPENID]!=$_SESSION[MOBILE_SESSION_ACCOUNT]['openid'])
		 {
		 	 unset($_SESSION[MOBILE_WEIXIN_OPENID]);
		 		unset($_SESSION[MOBILE_SESSION_ACCOUNT]);
		 }
		 
		 
		}
	if(empty($_SESSION[MOBILE_WEIXIN_OPENID])||empty($_SESSION[MOBILE_SESSION_ACCOUNT])||empty($_SESSION[MOBILE_SESSION_ACCOUNT]['openid']))
		{
		 $from_user=xoauth();
		
				$_SESSION[MOBILE_WEIXIN_OPENID]=$from_user;
				$sessionAccount=array('openid'=>$from_user);
				$_SESSION[MOBILE_SESSION_ACCOUNT]=$sessionAccount;
				return $from_user;
				exit;
		}else
		{
			return 	$_SESSION[MOBILE_WEIXIN_OPENID];
		}
	}
	$weixinthirdlogin = mysqld_select("SELECT * FROM " . table('thirdlogin') . " WHERE enabled=1 and `code`='weixin'");

if(!empty($weixinthirdlogin)&&!empty($weixinthirdlogin['id']))
{
$weixin_openid=get_weixin_openid();

	}




function weixin_js_signPackage($signPackage=array())
{
			$settings=globaSetting();
	  $timestamp = time();
    $nonceStr =weixin_createNonceStr(16);
     $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
   
   	 $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 $jsapiTicket = get_js_ticket();
	 $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
   
	
	   $signature = sha1($string);
	   
	   $signPackage["appId"]=$settings['weixin_appId'];
	    $signPackage["nonceStr"]=$nonceStr;
	      $signPackage["timestamp"]=$timestamp;
	      $signPackage["url"]=$url;
	    $signPackage["signature"]=$signature;
	   $signPackage["rawString"]=$string;
	       
		
		return $signPackage;
	
}



	  function weixin_address_signInfo($url,$signPackage)
	{
	$weixintoken=weixin_code_access_token();
		$accesstoken=$weixintoken['access_token'];
		
		$noncestr=weixin_createNonceStr(6);
		$Parameters=array();
		$Parameters["accesstoken"] = $accesstoken;
		$Parameters["appid"] = $signPackage['appId'];
		$Parameters["noncestr"] = $noncestr;
	  $Parameters["timestamp"] = $signPackage['timestamp'];
		$Parameters["url"] = $url;
		ksort($Parameters);
		$String = weixin_formatBizQueryParaMap($Parameters, false);
		$addrSign = sha1($String);
		
		   $infoarray = array(
		'appId' => $signPackage['appId'],
		'scope' =>'jsapi_address',
		'signType' =>"sha1",
		"addrSign" =>  $addrSign,
		'timeStamp'=> "".$signPackage['timestamp'],
		'nonceStr' =>   $noncestr
	);
		
	$result_ = json_encode($infoarray);
		return $result_;
	}
	


	}
	
	
	 function weixin_createNonceStr($length = 16) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = "";
    for ($i = 0; $i < $length; $i++) {
      $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $str;
  }
  
	function weixin_formatBizQueryParaMap($paraMap, $urlencode)
	{
		$buff = "";
		ksort($paraMap);
		foreach ($paraMap as $k => $v)
		{
		    if($urlencode)
		    {
			   $v = urlencode($v);
			}
			$buff .= $k . "=" . $v . "&";
		}
		$reqPar="";
		if (strlen($buff) > 0) 
		{
			$reqPar = substr($buff, 0, strlen($buff)-1);
		}
		return $reqPar;
	}