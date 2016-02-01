<?php
				$member=get_member_account();
					$openid =$member['openid'] ;
        $orderid = intval($_GP['orderid']);
        $order = mysqld_select("SELECT * FROM " . table('shop_order') . " WHERE id = :id and openid =:openid", array(':id' => $orderid,':openid'=>$openid));
        $goodsstr="";
     	if(empty($order['id']))
     	{
     		message("未找到相关订单");
     	}	
     		if($_GP['isok'] == '1'&&$order['paytypecode']=='weixin') {
					message('支付成功！',WEBSITE_ROOT.mobile_url('myorder'),'success');
				}
        if (($order['paytype'] !=3 && $order['status'] >0)&&(!($order['paytype'] ==3&&$order['status'] ==1))) {
            message('抱歉，您的订单已经付款或是被关闭，请重新进入付款！', mobile_url('myorder'), 'error');
        }
        
            $ordergoods = mysqld_selectall("SELECT goodsid,optionid,total FROM " . table('shop_order_goods') . " WHERE orderid = '{$orderid}'");
            if (!empty($ordergoods)) {
            	$goodsids=array();
              foreach ($ordergoods as $gooditem) {
              	$goodsids[]=$gooditem['goodsid'];
              }
                $goods = mysqld_selectall("SELECT id, title, thumb, marketprice, total,credit FROM " . table('shop_goods') . " WHERE id IN ('" . implode("','", $goodsids) . "')");
            }
            $goodtitle='';
            		if (!empty($goods)) {
                    foreach ($goods as $row) {
                    	if(empty($goodtitle))
                    	{
                    		 $goodtitle=$row['title'];
                    	}
                    	$_optionid=$ordergoods[$row['id']]['optionid'];
                    	$optionidtitle ='';
                    	if(!empty($_optionid))
                    	{
                    	 $optionidtitle = mysqld_select("select title from " . table("shop_goods_option")." where id=:id",array('id'=>$_optionid));
                    	 $optionidtitle=$optionidtitle['title'];
  										}
												$goodsstr .="{$row['title']} {$optionidtitle} X{$ordergoods[$row['id']]['total']}\n";
                      }
                }
                $paytypecode=$order['paytypecode'];
                if(!empty($_GP['paymentcode']))
                {
                	  $paytypecode=$_GP['paymentcode'];
                }
                 $payment = mysqld_select("select * from " . table("payment")." where enabled=1 and `code`=:code ",array('code'=>$paytypecode));
  		if(empty($payment['id']))
         {
         message("未找到付款方式，付款失败");	
         }
         	if(!empty($order['isverify'])&&empty($payment['online']))
         {
         	   message("核销产品订单只能在线付款！");	
        }
         
         if($order['paytypecode']!=$paytypecode)
         {
      
         	$paytype=$this->getPaytypebycode($paytypecode);
         	$status=$order['status'];
         	if($paytype!=3)
         	{
         		$status=0;	
         	}
         		if($paytype==3)
         	{
         		$status=1;	
         	}
         	mysqld_update('shop_order', array('paytypecode'=>$payment['code'],'status'=>$status,'paytypename'=>$payment['name'],'paytype'=>$paytype),array('id'=>$orderid));
         }
         
    	require(WEB_ROOT.'/system/modules/plugin/payment/'.$paytypecode.'/payaction.php'); 
    	exit;