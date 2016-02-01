<?php
defined('SYSTEM_IN') or exit('Access Denied');
define('subscribe_key', '系统_关注事件');
define('default_key', '系统_默认回复');
$_QMXK=array();
class weixinAddons  extends BjSystemModule {
	public function do_getopenid()
	{
		$weixinopenid=get_session_account(false);
		
	}
	
public function verifyorder($openid,$ordersn)
	{
			global $_CMS;
		if($_CMS['addons_bj_hx'])
				    {
				 $item = mysqld_select("SELECT * FROM " . table('shop_order') . " WHERE ordersn = :ordersn	", array(':ordersn' => $ordersn )); 	
	           	if (empty($item)) {
                return '抱歉，您的订单不存在或是已经被取消！';
            }
             
         $bj_hx_verify_saler = mysqld_select("SELECT * FROM " . table('bj_hx_verify_saler') . " WHERE openid = :openid", array( ':openid' => $openid )); 	
	       if(empty($bj_hx_verify_saler['verifyid']))
	       {
	       	   return '您不是核销员不能进行核销！';
	       }
          
            if($item['status']>0&&!empty($item['isverify']))
            {
            	 $shop_order_goods = mysqld_select("SELECT * FROM " . table('shop_order_goods') . " WHERE orderid = :orderid ", array(':orderid' => $item['id'] )); 	
					     $bj_hx_verify_goods = mysqld_select("SELECT * FROM " . table('bj_hx_verify_goods') . " WHERE goodsid = :goodsid  and verifyid=:verifyid", array(':goodsid' => $shop_order_goods['goodsid'],':verifyid' =>$bj_hx_verify_saler['verifyid'])); 	
					     if(!empty($bj_hx_verify_goods['goodsid']))
					     {
					     	
					    	return '<a href="'.WEBSITE_ROOT.create_url('mobile',array('name' => 'bj_hx','do' => 'verifycheck','ordersn' => $ordersn)).'">点击进入订单核销页面</a>';
					   }else
					     {
					     	
					     	return "未适用门店无法进行产品核销";	
					     }
            }else
            {
            	return '订单状态不符无法进行线下核销！';
            }
            
 	return '订单状态不符无法进行线下核销！';
			
		}
		return '';
		
	}
	public function do_process()
	{
		global $_GP,$_CMS;
		$settings=globaSetting();
	$configdata = $settings['weixintoken'];
	$token=$configdata;
    if(!$this->checkSign($token))
      	{
     	exit('Access Denied');
      	}
      	
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'get') {
			ob_clean();
			ob_start();
			exit($_GET['echostr']);
		}
		if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
			$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
		$message=$this->requestParse($postStr);
		if (empty($message)) {
				exit('Request Failed');
			}
			if($message['type']=='text'||$message['type']=='CLICK')
			{
				
				$key=$message['content'];
				
				if($message['type']=='CLICK')
				{
					
									$key=$message['eventkey'];
				}
				
				if(!empty($key))
				{
				$reply = mysqld_select('SELECT * FROM '.table('weixin_rule')."   WHERE  keywords = :keywords" , array(':keywords' =>$key));
				}
			
				if($_CMS['addons_bj_hx'])
				 {			
				 		$strpos=strstr($key,'hx');
						if(empty($reply['id'])&&!empty($key)&&strpos($key, 'hx')==0&&strpos($key, 'x')==1&&!empty($strpos))
						{
						//扩展模块代码
						$newkey=str_replace('hx','',$key);
						
						 $item = mysqld_select("SELECT * FROM " . table('shop_order') . " WHERE ordersn = :ordersn	", array(':ordersn' => $newkey )); 	
	   
	        	if (empty($item)) {
                   return $this->respText('抱歉，核销订单不存在或被取消',$message);	
            }
            if ($item['status']==3) {
                   return $this->respText('抱歉，核销订单已核销完成，不能重复核销！',$message);	
            }
            	$from_user=$message['from'];
            		$weixin_wxfans=mysqld_select('SELECT * FROM '.table('weixin_wxfans'). " WHERE weixin_openid = :weixin_openid", array(':weixin_openid' => $from_user));
								
            $str=$this->verifyorder($weixin_wxfans['openid'],$newkey);
            
             return $this->respText($str,$message);	
            }
				}
					
			if($_CMS['addons_bj_qrcode'])
							    {
							    	 
												if(!empty($reply['addonsrule'])&&!empty($key)&&$reply['addonsModule']=='bj_qrcode')
												{
															
														$from_user=$message['from'];
															
													 $spread = mysqld_select("SELECT * FROM " . table('bj_qrcode_qrcode')." where weixinkey=:weixinkey limit 1",array(':weixinkey'=>$key) );
													 
													 if(!empty($spread['id']))
													 {
													 		$weixin_wxfans=mysqld_select('SELECT * FROM '.table('weixin_wxfans'). " WHERE weixin_openid = :weixin_openid", array(':weixin_openid' => $from_user));
															 if(!empty($weixin_wxfans['openid']))
																{
																	
																	
													
																$media_id=bj_qrcode_qrcode($spread,$from_user,$weixin_wxfans['openid'],true,'media_id');
																
														 return $this->respImage($media_id,$message);
												
																		 			
																		 	
																}else
																{
																	return $this->respText('您还不是会员无法生成二维码',$message);	
																}
																
													 	
													 	
												
													 
													}
													 
													 
									  		 }
						  		 
						  		}
				
			}
					
					
					
				if($message['type']=='subscribe')
			{
					$reply = mysqld_select('SELECT * FROM '.table('weixin_rule')."   WHERE  keywords = :keywords" , array(':keywords' =>subscribe_key));
				
					if(	!empty($message['eventkey'])&&strlen($message['eventkey'])> 8)
					{
						$eventkey=	substr($message['eventkey'],8);
					}else
					{
							$eventkey=	$message['eventkey'];
					}
					
				$weixin_wxfans = mysqld_select('SELECT * FROM '.table('weixin_wxfans')."   WHERE  weixin_openid = :weixin_openid limit 1" , array(':weixin_openid' =>$message['from']));
				if(empty($weixin_wxfans['weixin_openid'])&&!empty($message['from']))
				{
							  		$row = array(
					'follow' => 1,
					'weixin_openid' => $message['from'],
					'avatar'=>'',
					'createtime' => TIMESTAMP
				);
					mysqld_insert('weixin_wxfans', $row);	
					
				}else
				{
				mysqld_update('weixin_wxfans',array('follow'=>1),array('weixin_openid'=>$message['from']));	
				}
				if($_CMS['addons_bj_qrcode'])
				{
				if(!empty($message['from'])&&!empty($eventkey))
					{
						
						$eventkey2=explode('-',$eventkey);
						if(!empty($eventkey2[0])&&!empty($eventkey2[1]))
						{
							
							bj_qrcode_qrcode_message($eventkey2,$message['from']);
						}
						
					
					}
				}
				
			}
			

			
			if($message['type']=='LOCATION')
			{
				$longitude=$message['longitude'];
				$latitude=$message['latitude'];
				$precision=$message['precision'];
					mysqld_update('weixin_wxfans',array('longitude'=>$longitude,'latitude'=>$latitude,'precision'=>$precision),array('weixin_openid'=>$message['from']));
		//		weixin_send_custom_message($message['from'],"您所在的经度：".$longitude.",维度".$latitude);
				exit('');
			}
				if($message['type']=='unsubscribe')
			{
							mysqld_update('weixin_wxfans',array('follow'=>0),array('weixin_openid'=>$message['from']));
				exit('');
			}
			if(empty($reply['id']))
			{
					$reply = mysqld_select('SELECT * FROM '.table('weixin_rule')."   WHERE  keywords = :keywords" , array(':keywords' =>default_key));
			}
				if($reply['ruletype']==1)
				{
						$reply['content'] = htmlspecialchars_decode($reply['description']);
		$reply['content'] = str_replace(array('<br>', '&nbsp;'), array("\n", ' '), $reply['content']);
		$reply['content'] = strip_tags($reply['content'], '<a>');
		return $this->respText($reply['content'],$message);
					
				}
				if($reply['ruletype']==2)
				{
					
						$news = array();
			$news = array(
				'title' => $reply['title'],
				'description' => $reply['description'],
				'picurl' => $reply['thumb'],
				'url' =>  $reply['url'],
			);
			return $this->respNews($news,$message);
					
				}

				
				exit('');
		
		}
		
	}
	
	
	   public function sendcustomIMG($from_user,$msg) {
    	$access_token=get_weixin_token();
    	 $url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$access_token}";
 
  $post='{"touser":"'.$from_user.'","msgtype":"image","image":{"media_id":"'.$msg.'"}}';

    http_post($url,$post);
    	
  }
	
		private function respImage($mid,$message) {
		if (empty($mid)) {
			return $this->respText('media_id为空错误', $message);
		}
		$response = array();
		$response['FromUserName'] = $message['to'];
		$response['ToUserName'] = $message['from'];
		$response['MsgType'] = 'image';
		$response['Image']['MediaId'] = $mid;
		return $this->response($response);
	}
		private function respText($content,$message) {
		$content = str_replace("\r\n", "\n", $content);
		$response = array();
		$response['FromUserName'] = $message['to'];
		$response['ToUserName'] = $message['from'];
		$response['MsgType'] = 'text';
		$response['Content'] = htmlspecialchars_decode($content);
		return $this->response($response);
	}
	
		private function respNews($row,$message) {
		if (empty($row)) {
			return exit( 'Invaild value');
		}
		$response = array();
		$response['FromUserName'] = $message['to'];
		$response['ToUserName'] = $message['from'];
		$response['MsgType'] = 'news';
		$response['ArticleCount'] = 1;
		$response['Articles'] = array();
			$response['Articles'][] = array(
				'Title' => $row['title'],
				'Description' => $row['description'],
				'PicUrl' => WEBSITE_ROOT.'attachment/'.$row['picurl'],
				'Url' => $row['url'],
				'TagName' => 'item',
			);
		return $this->response($response);
	}

	private function response($packet) {
	
		if (!is_array($packet)) {
			return $packet;
		}
		if(empty($packet['CreateTime'])) {
			$packet['CreateTime'] = time();
		}
		if(empty($packet['MsgType'])) {
			$packet['MsgType'] = 'text';
		}
		if(empty($packet['FuncFlag'])) {
			$packet['FuncFlag'] = 0;
		} else {
			$packet['FuncFlag'] = 1;
		}
		return $this->array2xml($packet);
	}
		private function array2xml($arr, $level = 1, $ptagname = '') {
		$s = $level == 1 ? "<xml>" : '';
		foreach($arr as $tagname => $value) {
			if (is_numeric($tagname)) {
				$tagname = $value['TagName'];
				unset($value['TagName']);
			}
			if(!is_array($value)) {
				$s .= "<{$tagname}>".(!is_numeric($value) ? '<![CDATA[' : '').$value.(!is_numeric($value) ? ']]>' : '')."</{$tagname}>";
			} else {
				$s .= "<{$tagname}>".self::array2xml($value, $level + 1)."</{$tagname}>";
			}
		}
		$s = preg_replace("/([\x01-\x08\x0b-\x0c\x0e-\x1f])+/", ' ', $s);
		return $level == 1 ? $s."</xml>" : $s;
	}
	private function requestParse($message) {
		$packet = array();
		if (!empty($message)){
			$obj = simplexml_load_string($message, 'SimpleXMLElement', LIBXML_NOCDATA);
			if($obj instanceof SimpleXMLElement) {
				$obj = json_decode(json_encode($obj),true);
				
				$packet['from'] = strval($obj['FromUserName']);
				$packet['to'] = strval($obj['ToUserName']);
				$packet['time'] = strval($obj['CreateTime']);
				$packet['type'] = strval($obj['MsgType']);
				$packet['event'] = strval($obj['Event']);
				$packet['eventkey'] = strval($obj['EventKey']);
				foreach ($obj as $variable => $property) {
					if (is_array($property)) {
						$property = array_change_key_case($property);
					}
					$packet[strtolower($variable)] = $property;
				}
				if($packet['type'] == 'event') {
					$packet['type'] = $packet['event'];
				}
			}
		}
		return $packet;
	}
	private function checkSign($token) {
		global $_GP;
	 $signature = $_GET["signature"];
   $timestamp = $_GET["timestamp"];
   $nonce = $_GET["nonce"];
        		
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
	

	
}


