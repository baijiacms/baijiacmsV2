<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 百家威信 <QQ:1987884799> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');

function get_weixin_fans_byopenid($openid,$weixin_openid) {
			global $_CMS;
		$weixin_wxfans = mysqld_select("SELECT * FROM ".table('weixin_wxfans')." where openid=:openid or weixin_openid=:weixin_openid ", array(':openid' => $openid,':weixin_openid' => $weixin_openid));
		return $weixin_wxfans;
}
function get_js_ticket() {
 	$configs=globaSetting();

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
		//发送模板消息
	function bj_message_sendtempmsg($from_user,$template_id, $tourl, $bj_message_data, $topcolor) {
	

   	if(empty($from_user))
    {
       return;
    }

		 
    	$access_token=get_weixin_token();
    	 $url = "https://api.weixin.qq.com/cgi-bin/message/template/send?access_token={$access_token}";
 	$postarr = '{"touser":"'.$from_user.'","template_id":"'.$template_id.'","url":"'.$tourl.'","topcolor":"'.$topcolor.'","data":'.$bj_message_data.'}';
	
   http_post($url,$postarr);
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
function weixin_share_2($mobilearray,$sharetitle,$shareimg,$sharedesc,$settings)
	{
			$shareimg=$shareimg;
        $sharelink = WEBSITE_ROOT . create_url('mobile',$mobilearray);

    
			  $sharedata = array(
      "title"       => $sharetitle,
      "imgUrl"       => $shareimg,
      "link"      => $sharelink,
      "description" => $sharedesc
    );
    
      $signPackage = weixin_js_signPackage($sharedata);
		return $signPackage;
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


	function register_snsapi_userinfo($access_token,$openid,$state)
	{
				global $_GP,$_CMS;
				
				if($state==2)
				{
	
					$oauth2_url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
					$content = http_get($oauth2_url);
					$info = @json_decode($content, true);
					$follow=0;
				}else
				{
					$access_token=get_weixin_token();
					$oauth2_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$openid."&lang=zh_CN";
					$content = http_get($oauth2_url);
					$info = @json_decode($content, true);
					if($info['subscribe']==1)
					{
						$follow=1;
					}else
					{
						$settings=globaSetting();
						 $appId        = $settings['weixin_appId'];
						 $url          = WEBSITE_ROOT . '/index.php?' . $_SERVER['QUERY_STRING'];
						    $authurl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appId . "&redirect_uri=" . urlencode($url) . "&response_type=code&scope=snsapi_userinfo&state=2#wechat_redirect";
	            header('location: ' . $authurl);
	            exit();
					}
				}
			$fans = mysqld_select("SELECT openid,weixin_openid FROM " . table('weixin_wxfans') . " WHERE weixin_openid=:weixin_openid ", array(':weixin_openid' =>$openid));
		  $gender=$info["gender"];
			$nickname=$info["nickname"];
			if(empty($fans['weixin_openid']))
			{
				  		$row = array(
					'nickname'=> $nickname,
					'follow' => $follow,
					'gender' => intval($gender),
					'weixin_openid' => $openid,
					'avatar'=>'',
					'createtime' => TIMESTAMP
				);
					mysqld_insert('weixin_wxfans', $row);	
					if(!empty($info["headimgurl"])){
				mysqld_update('weixin_wxfans', array('avatar'=>$info["headimgurl"]), array('weixin_openid' => $openid));	
					}
				}else
				{
					
					$row = array(
					'follow' => $follow,
					'gender' => intval($gender)
				);
				if(!empty($nickname))
				{
					$row['nickname']=$nickname;
				}
				mysqld_update('weixin_wxfans', $row, array('weixin_openid' => $openid));	
		
						if(!empty($info["headimgurl"])){
				mysqld_update('weixin_wxfans', array('avatar'=>$info["headimgurl"]), array('weixin_openid' => $openid));	
					}
					
				}
					$fans = mysqld_select("SELECT openid FROM " . table('weixin_wxfans') . " WHERE weixin_openid=:weixin_openid  ", array(':weixin_openid' =>$openid));
		
				if(!empty($fans['openid'])&&!empty($nickname))
				{
					$member = mysqld_select("SELECT nickname FROM " . table('member') . " WHERE openid=:openid  ", array(':openid' =>$fans['openid']));
		 	if(empty($member['nickname']))
		 	{
		 		mysqld_update('member', array('nickname'=>$nickname), array('openid' => $fans['openid']));
		 	}
				 	if(empty($member['realname']))
		 	{
		 		mysqld_update('member', array('realname'=>$nickname), array('openid' => $fans['openid']));
		 	}
						
					
				}
				
				
	}
define('WEIXIN_COOKIE_ID', "__s".md5(SESSION_PREFIX)."_open");
function get_weixin_openid() {
	global $_GP,$_CMS;
	if ( is_use_weixin()==false ) {
		return true;
	}
	$settings=globaSetting();
$lifeTime = 24 * 3600 * 1;
session_set_cookie_params($lifeTime);
@session_start();
 $cookieid = WEIXIN_COOKIE_ID;
$openid   = base64_decode($_COOKIE[$cookieid]);
	if (!empty($openid)) {
		if(empty($_SESSION[MOBILE_WEIXIN_OPENID]))
		{
		$_SESSION[MOBILE_WEIXIN_OPENID]=$openid;
		}
           return $openid;
  }
    $appId        = $settings['weixin_appId'];
        $appSecret    = $settings['weixin_appSecret'];
        	if(empty($appId) || empty($appSecret)){
					message('微信公众号没有配置公众号AppId和公众号AppSecret!') ;
					}
        $access_token = "";
        $code         = $_GP['code'];
        $url          = WEBSITE_ROOT . '/index.php?' . $_SERVER['QUERY_STRING'];
       
    if (empty($code)) {
    			if($_GP['state']==2)
    			{
            $authurl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appId . "&redirect_uri=" . urlencode($url) . "&response_type=code&scope=snsapi_userinfo&state=2#wechat_redirect";
            header('location: ' . $authurl);
            exit();
          }else
          {
          	  $authurl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appId . "&redirect_uri=" . urlencode($url) . "&response_type=code&scope=snsapi_base&state=1#wechat_redirect";
            header('location: ' . $authurl);
            exit();
          }
        } else {
            $tokenurl = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $appId . "&secret=" . $appSecret . "&code=" . $code . "&grant_type=authorization_code";
         		$resp = http_get($tokenurl);
						$token = @json_decode($resp, true);
            if (!empty($token) && is_array($token) && $token['errmsg'] == 'invalid code') {
            	if($_GP['state']==2)
		    			{
		            $authurl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appId . "&redirect_uri=" . urlencode($url) . "&response_type=code&scope=snsapi_userinfo&state=2#wechat_redirect";
		            header('location: ' . $authurl);
		            exit();
		          }else
		          {
            $authurl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appId . "&redirect_uri=" . urlencode($url) . "&response_type=code&scope=snsapi_base&state=1#wechat_redirect";
                header('location: ' . $authurl);
                exit();
              }
            }
            if (is_array($token) && !empty($token['openid'])) {
                $access_token = $token['access_token'];
                $openid       = $token['openid'];
              
                register_snsapi_userinfo($access_token,$openid,$_GP['state']);
                  setcookie($cookieid, base64_encode($openid));
                $_SESSION[MOBILE_WEIXIN_OPENID]=$openid;
       
                
            } else {
                $querys = explode('&', $_SERVER['QUERY_STRING']);
                $newq   = array();
                foreach ($querys as $q) {
                    if (!strexists($q, 'code=') && !strexists($q, 'state=') && !strexists($q, 'from=') && !strexists($q, 'isappinstalled=')) {
                        $newq[] = $q;
                    }
                }
                $rurl    = WEBSITE_ROOT. 'index.php?' . implode('&', $newq);
                $authurl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . $appId . "&redirect_uri=" . urlencode($rurl) . "&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
                header('location: ' . $authurl);
                exit;
            }
        }
          return $openid;
}
function strexists($string, $find) {
	return !(strpos($string, $find) === FALSE);
}

function weixin_js_signPackage($signPackage=array())
{
	if ( is_use_weixin()==false ) {
		return true;
		}
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

function weixin_code_access_token($state=0,$scope="snsapi_base",$refresh=false)
	{
	if ( is_use_weixin()==false ) {
		return true;
		}
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
			 $_SESSION[SESSION_PREFIX.'_Turl']=$url;
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
			header("location:".$_SESSION[SESSION_PREFIX.'_Turl']);
			exit;
		    return $token;
		}
	}else
	{
		return $sessionToken;
	}
		
	}



	  function weixin_address_signInfo($url,$signPackage)
	{
		if ( is_use_weixin()==false ) {
		return true;
		}
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
	function is_in_weixin()
{
	if ((strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')!== false)) {
		return true;
	}
	return false;
}
function is_use_weixin()
{
		global $_CMS,$_GP;
	
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