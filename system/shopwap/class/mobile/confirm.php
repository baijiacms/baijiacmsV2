<?php

		if($_GP["follower"]!="nologinby")
		{
				if(is_login_account()==false)
				{
					if(empty($_SESSION["noneedlogin"]))
					{
					tosaveloginfrom();
					header("location:".create_url('mobile',array('name' => 'shopwap','do' => 'login','from'=>'confirm')));	
					exit;
					}
				}
		
		}else
		{
			 $_SESSION["noneedlogin"]=true;
				clearloginfrom();	
		}
	
			$member=get_member_account();
				$openid =$member['openid'] ;
				$op = $_GP['op']?$_GP['op']:'display';
        $totalprice = 0;
        $allgoods = array();
        $id = intval($_GP['id']);
        $optionid = intval($_GP['optionid']);
        $total = intval($_GP['total']);
        if (empty($total)) {
            $total = 1;
        }
        $direct = false; //是否是直接购买
        $returnurl = ""; //当前连接
	$issendfree=0;
	 $defaultAddress = mysqld_select("SELECT * FROM " . table('shop_address') . " WHERE isdefault = 1 and openid = :openid and deleted=0 limit 1", array(':openid' => $openid));
        

        if (!empty($id)) {
        
            $item = mysqld_select("select * from " . table("shop_goods") . " where id=:id", array(":id" => $id));
			
				
					if($item['issendfree']==1||$item['isverify']==1)
                    		{
                    			$issendfree=1;	
                    		}
       
            if ($item['istime'] == 1) {
                if (time() > $item['timeend']) {
                    message('抱歉，商品限购时间已到，无法购买了！', refresh(), "error");
                }
            }

            if (!empty($optionid)) {
                $option = mysqld_select("select title,marketprice,weight,stock from " . table("shop_goods_option") . " where id=:id", array(":id" => $optionid));
                if ($option) {
                    $item['optionid'] = $optionid;
                    $item['title'] = $item['title'];
                    $item['optionname'] = $option['title'];
                    $item['marketprice'] = $option['marketprice'];
                    $item['weight'] = $option['weight'];
                }
            }
            $item['stock'] = $item['total'];
            $item['total'] = $total;
            $item['totalprice'] = $total * $item['marketprice'];
            $item['credit'] = $total* $item['credit'];
            $allgoods[] = $item;
            $totalprice+= $item['totalprice'];
            
                		//========促销活动===============
		$promotion=mysqld_selectall("select * from ".table('shop_pormotions')." where starttime<=:starttime and endtime>=:endtime",array(':starttime'=>TIMESTAMP,':endtime'=>TIMESTAMP));
			
			if(empty($issendfree))
			{
			foreach($promotion as $pro){
				


						if($pro['promoteType']==1)
								{
								if(	($item['totalprice'])>=$pro['condition'])
									{
									$issendfree=1;	
									
									}
								}
					 else if($pro['promoteType']==0)
							{
							if($total>=$pro['condition'])
								{
								$issendfree=1;	
							
								}
							}
						
			
			
        }
      }
            
            
            $direct = true;
            $returnurl = mobile_url("confirm", array("id" => $id, "optionid" => $optionid, "total" => $total));
        }
        if (!$direct) {
        
            //如果不是直接购买（从购物车购买）
            $list = mysqld_selectall("SELECT * FROM " . table('shop_cart') . " WHERE  session_id = '".$openid."'");
            if (!empty($list)) {
            	$totalprice=0;
            		$totaltotal=0;
                foreach ($list as &$g) {
                    $item = mysqld_select("select * from " . table("shop_goods") . " where id=:id", array(":id" => $g['goodsid']));
                    //属性
                    $option = mysqld_select("select * from " . table("shop_goods_option") . " where id=:id ", array(":id" => $g['optionid']));
                    if ($option) {
                    		if($item['issendfree']==1)
                    		{
                    			$issendfree=1;	
                    		}
                        $item['optionid'] = $g['optionid'];
                        $item['title'] = $item['title'];
                        $item['optionname'] = $option['title'];
                        $item['marketprice'] = $option['marketprice'];
                        $item['weight'] = $option['weight'];
                    }
                    $item['stock'] = $item['total'];
                    $item['total'] = $g['total'];
                    $item['totalprice'] = $g['total'] * $item['marketprice'];
                     $item['credit'] = $g['total'] * $item['credit'];
                    $allgoods[] = $item;
                    $totalprice+= $item['totalprice'];
                    if($totaltotal<$g['total'])
                    {
                   $totaltotal=$g['total'];
                 		 }
                }
                
                $promotion=mysqld_selectall("select * from ".table('shop_pormotions')." where starttime<=:starttime and endtime>=:endtime",array(':starttime'=>TIMESTAMP,':endtime'=>TIMESTAMP));
		
                 //========促销活动===============
			foreach($promotion as $pro){
						if($pro['promoteType']==1)
								{
								if(	($totalprice)>=$pro['condition'])
									{
									$issendfree=1;	
							
									
									}
								}
					 else if($pro['promoteType']==0)
							{
							if($totaltotal>=$pro['condition'])
								{
								$issendfree=1;	
								
							
								}
							}
						
			
			
        }
          //========end===============
                
                unset($g);
            }
            $returnurl = mobile_url("confirm");
        }

        if (count($allgoods) <= 0) {
            header("location: " . mobile_url('myorder'));
            exit();
        }
        //配送方式
       
       $dispatch=array();
     $dispatchcode=array();
     $addressdispatch1 = mysqld_selectall("select shop_dispatch.*,dispatchitem.name dname from " . table("shop_dispatch") . " shop_dispatch left join ". table('dispatch') . " dispatchitem on shop_dispatch.express=dispatchitem.code  WHERE shop_dispatch.deleted=0 and dispatchitem.enabled=1 and  shop_dispatch.id in (select dispatch.id from " . table("shop_dispatch_area") . " dispatch_area left join  " . table("shop_dispatch") . " dispatch on dispatch.id=dispatch_area.dispatchid WHERE dispatch.deleted=0 and ((dispatch_area.provance=:provance and dispatch_area.city=:city and dispatch_area.area=:area)))",array(":provance"=>$defaultAddress['province'],":city"=>$defaultAddress['city'],":area"=>$defaultAddress['area']));
    $addressdispatch2 = mysqld_selectall("select shop_dispatch.*,dispatchitem.name dname from " . table("shop_dispatch") . " shop_dispatch left join ". table('dispatch') . " dispatchitem on shop_dispatch.express=dispatchitem.code  WHERE shop_dispatch.deleted=0 and dispatchitem.enabled=1 and  shop_dispatch.id in (select dispatch.id from " . table("shop_dispatch_area") . " dispatch_area left join  " . table("shop_dispatch") . " dispatch on dispatch.id=dispatch_area.dispatchid WHERE dispatch.deleted=0 and ( (dispatch_area.provance=:provance and dispatch_area.city=:city and dispatch_area.area='') ))",array(":provance"=>$defaultAddress['province'],":city"=>$defaultAddress['city']));
   $addressdispatch3 = mysqld_selectall("select shop_dispatch.*,dispatchitem.name dname from " . table("shop_dispatch") . " shop_dispatch left join ". table('dispatch') . " dispatchitem on shop_dispatch.express=dispatchitem.code  WHERE shop_dispatch.deleted=0 and dispatchitem.enabled=1 and  shop_dispatch.id in (select dispatch.id from " . table("shop_dispatch_area") . " dispatch_area left join  " . table("shop_dispatch") . " dispatch on dispatch.id=dispatch_area.dispatchid WHERE dispatch.deleted=0 and ((dispatch_area.provance=:provance and dispatch_area.city='' and dispatch_area.area='') ))",array(":provance"=>$defaultAddress['province']));
   $addressdispatch4 = mysqld_selectall("select shop_dispatch.*,dispatchitem.name dname from " . table("shop_dispatch") . " shop_dispatch left join ". table('dispatch') . " dispatchitem on shop_dispatch.express=dispatchitem.code  WHERE shop_dispatch.deleted=0 and dispatchitem.enabled=1 and  shop_dispatch.id in (select dispatch.id from " . table("shop_dispatch_area") . " dispatch_area left join  " . table("shop_dispatch") . " dispatch on dispatch.id=dispatch_area.dispatchid WHERE dispatch.deleted=0 and (dispatch_area.provance='' and dispatch_area.city='' and dispatch_area.area='') )");

 	$addressdispatchs=array($addressdispatch1,$addressdispatch2,$addressdispatch3,$addressdispatch4);
 	$dispatchIndex=0;
   foreach ($addressdispatchs as $addressdispatch) {
	
 	 foreach ($addressdispatch as $d) {
 	 			if(!in_array ($d['express'],$dispatchcode))
 	 			{
      	$dispatch[$dispatchIndex]=$d;
      	$dispatchcode[$dispatchIndex]=$d['express'];
      	$dispatchIndex=$dispatchIndex+1;
      	}
    }	 	
  }

     
        foreach ($dispatch as &$d) {
            $weight = 0;

            foreach ($allgoods as $g) {
                $weight+=$g['weight'] * $g['total'];
                	if($g['issendfree']==1)
                    		{
                    			$issendfree=1;	
                    		}
            }

            $price = 0;
            if($issendfree!=1)
          	{
	            if ($weight <= $d['firstweight']) {
	                $price = $d['firstprice'];
	            } else {
	                $price = $d['firstprice'];
	                $secondweight = $weight - $d['firstweight'];
	                if ($secondweight % $d['secondweight'] == 0) {
	                    $price+= (int) ( $secondweight / $d['secondweight'] ) * $d['secondprice'];
	                } else {
	                    $price+= (int) ( $secondweight / $d['secondweight'] + 1 ) * $d['secondprice'];
	                }
	            }
         		}
            $d['price'] = $price;
        }
        unset($d);
		$paymentconfig="";
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger')) {
			$paymentconfig=" and code!='alipay'";
		}else
		{
			if (is_mobile_request()) {
					$paymentconfig=" and code!='weixin'";
				}	
		}
    $payments = mysqld_selectall("select * from " . table("payment")." where enabled=1 {$paymentconfig} order by `order` desc");
   
        if (checksubmit('submit')) {
       //if($direct)
 if($direct&&!empty($item['isverify']))
 {
 	  if (empty($_GP['verify_address_name'])) {
                message('请填写联系人！');
            }
              if (empty($_GP['verify_address_tell'])) {
                message('请填写联系电话！');
            }
 	$address['realname']=$_GP['verify_address_name'];
 	$address['mobile']=$_GP['verify_address_tell'];
 }else
 {
            $address = mysqld_select("SELECT * FROM " . table('shop_address') . " WHERE id = :id", array(':id' => intval($_GP['address'])));
            if (empty($address)) {
                message('抱歉，请您填写收货地址！');
            }
    }
             if (empty($_GP['dispatch'])) {
                message('请选择配送方式！');
            }
             if (empty($_GP['payment'])) {
                message('请选择支付方式！');
            }
            //商品价格
            $goodsprice = 0;
            $goodscredit=0;
            foreach ($allgoods as $row) {
                $goodsprice+= $row['totalprice'];
                if($row['issendfree']==1||$row['type']==1||$row['isverify']==1)
                    		{
                    			$issendfree=1;	
                    		}
                  $goodscredit+= intval($row['credit']);
            }
            //运费
        		$hasbonus=0;
        		$bonusprice=0;
        		 if(is_login_account())
  				{
        	  if (!empty($_GP['bonus'])) {
        	  //检测优惠券是否有效
        	  $bonus_sn=$_GP['bonus'];
        	  if($bonus_sn=='custom')
        	  {
        	  	  $bonus_sn=$_GP['custom_bonus_sn'];
        	 }
        	  $use_bonus = mysqld_select("select * from ".table('bonus_user')." where deleted=0 and isuse=0 and  bonus_sn=:bonus_sn limit 1",array(":bonus_sn"=>$bonus_sn));
            if(!empty($use_bonus['bonus_id']))
            {
            
             $bonus_type = mysqld_select("select * from ".table('bonus_type')." where deleted=0 and type_id=:type_id and    min_goods_amount<=:min_goods_amount and (send_type=0  or (send_type=1 ) or (send_type=2 and min_amount<:min_amount ) or send_type=3)  and use_start_date<=:use_start_date and use_end_date>=:use_end_date",array(":type_id"=>$use_bonus['bonus_type_id'],":min_amount"=>$goodsprice,":min_goods_amount"=>$goodsprice,":use_start_date"=>time(),":use_end_date"=>time()));
	           	if(!empty($bonus_type['type_id']))
	           	{
	           
	           	}else
	           	{
	           	 	message("优惠券已过期，请选择'无'可继续购买操作。");
	           	}
            }else
            {
           		 message("未找到相关优惠券");
            }
            }
          }
        	
        	
            $dispatchid = intval($_GP['dispatch']);
            $dispatchitem = mysqld_select("select sendtype,express from ".table('shop_dispatch')." where id=:id limit 1",array(":id"=>$dispatchid));
            $dispatchprice = 0;
            if($issendfree!=1)
          	{
	            foreach ($dispatch as $d) {
	                if ($d['id'] == $dispatchid) {
	                    $dispatchprice = $d['price'];
	                }
	            }
          	}				
					$ordersns= date('Ymd') . random(6, 1);
						$randomorder = mysqld_select("SELECT * FROM " . table('shop_order') . " WHERE  ordersn=:ordersn limit 1", array(':ordersn' =>$ordersns));
          	if(!empty($randomorder['ordersn']))
          	{
          				$ordersns= date('Ymd') . random(6, 1);
          		
          	}
          	$payment = mysqld_select("select * from " . table("payment")." where enabled=1 and code=:payment",array(':payment'=>$_GP['payment']));
   			if(empty($payment['id']))
   			{
   				message("没有获取到付款方式");	
   			}
   			
   				$paytype=$this->getPaytypebycode($payment['code']);
            $data = array(
                'openid' => $openid,	
                'ordersn' => $ordersns,
                'price' => $goodsprice + $dispatchprice,
                'dispatchprice' => $dispatchprice,
                'goodsprice' => $goodsprice,
                'credit'=> $goodscredit,
                'status' => 0,
                 'isverify'=> empty($item['isverify'])?'0':1,
                'paytype'=> $paytype,
                'sendtype' => intval($dispatchitem['sendtype']),
                 'dispatchexpress' => $dispatchitem['express'],
                'dispatch' => $dispatchid,
                'paytypecode' => $payment['code'],
                 'paytypename' => $payment['name'],
                'remark' => $_GP['remark'],
                'addressid'=> $address['id'],
                  'address_mobile' => $address['mobile'],
                   'address_realname' => $address['realname'],
                    'address_province' => $address['province'],
                     'address_city' => $address['city'],
                      'address_area' => $address['area'],
                       'address_address' => $address['address'],
                'createtime' => time()		
            );
            mysqld_insert('shop_order', $data);
            $orderid = mysqld_insertid();
          if(is_login_account())
  				{
            //插入优惠券
              if (!empty($_GP['bonus'])) {
        	  $bonus_sn=$_GP['bonus'];
        	  if($bonus_sn=='custom')
        	  {
        	  	  $bonus_sn=$_GP['custom_bonus_sn'];
        	 }
        	  $use_bonus = mysqld_select("select * from ".table('bonus_user')." where deleted=0 and isuse=0 and  bonus_sn=:bonus_sn limit 1",array(":bonus_sn"=>$bonus_sn));
	            if(!empty($use_bonus['bonus_id']))
	            {
	            
	            	
	             $bonus_type = mysqld_select("select * from ".table('bonus_type')." where deleted=0 and type_id=:type_id and    min_goods_amount<=:min_goods_amount and (send_type=0  or (send_type=1 ) or (send_type=2 and min_amount<:min_amount ) or send_type=3)  and use_start_date<=:use_start_date and use_end_date>=:use_end_date",array(":type_id"=>$use_bonus['bonus_type_id'],":min_amount"=>$goodsprice,":min_goods_amount"=>$goodsprice,":use_start_date"=>time(),":use_end_date"=>time()));
		           	if(!empty($bonus_type['type_id']))
		           	{
		          	
		           	$hasbonus=1;
		           	$bonusprice=$bonus_type['type_money'];
		           	
		        mysqld_update('bonus_user',array('isuse'=>1,'order_id'=>$orderid,'used_time'=>time()),array('bonus_id'=>$use_bonus['bonus_id']));
            mysqld_update('shop_order', array('price' => $goodsprice + $dispatchprice-$bonusprice,'hasbonus'=>$hasbonus,'bonusprice'=>$bonusprice),array('id'=>$orderid));
		           	 
		           	}else
		           	{
		           	
		           	}
	            }else
	            {
	            
	            }
            }
            
          
            
          }
            
            
            
            
            
            
            
            
            //插入订单商品
            foreach ($allgoods as $row) {
                if (empty($row)) {
                    continue;
                }
                $d = array(
                    'goodsid' => $row['id'],
                    'orderid' => $orderid,
                    'total' => $row['total'],
                    'price' => $row['marketprice'],
                    'createtime' => time(),
                    'optionid' => $row['optionid']
                );
                $o = mysqld_select("select title from ".table('shop_goods_option')." where id=:id limit 1",array(":id"=>$row['optionid']));
                if(!empty($o)){
                    $d['optionname'] = $o['title'];
                }
							//获取商品id
							$ccate = $row['ccate'];
                mysqld_insert('shop_order_goods', $d);
                    $ogid = mysqld_insertid();
                   
             
			        	require(WEB_ROOT.'/system/common/extends/class/shopwap/class/mobile/confirm_1.php');
			
            }
               require(WEB_ROOT.'/system/common/extends/class/shopwap/class/mobile/confirm_2.php');
            //清空购物车
            if (!$direct) {
                mysqld_delete("shop_cart", array( "session_id" => $openid));
            }
            clearloginfrom(); 
            header("Location:".mobile_url('pay', array('orderid' => $orderid,'topay'=>'1')) );
        }
  
  if(is_login_account())
  {
        $bonus_list=array();
   $bonus_types= mysqld_selectall("select * from " . table("bonus_type")." where deleted=0  and    min_goods_amount<=:min_goods_amount and (send_type=0  or (send_type=1 and send_start_date<=:send_start_date and send_end_date>=:send_end_date) or (send_type=2 and min_amount<:min_amount and send_start_date<=:send_start_date and send_end_date>=:send_end_date) or send_type=3)  and use_start_date<=:use_start_date and use_end_date>=:use_end_date",array(":min_amount"=>$totalprice,":min_goods_amount"=>$totalprice,":send_start_date"=>time(),":send_end_date"=>time(),":use_start_date"=>time(),":use_end_date"=>time()));
  
  foreach ($bonus_types as $bonus_type) {
  	if(!empty($bonus_type['type_id']))
  	{
  		if($bonus_type['send_type']==0)
  		{
  			   $bonus_users= mysqld_selectall("select * from " . table("bonus_user")." where deleted=0 and  isuse=0 and bonus_type_id=:bonus_type_id and openid=:openid",array(":bonus_type_id"=>$bonus_type['type_id'], ":openid" => $openid));
  					foreach ($bonus_users as $bonus_user) {
  						
  						$bonus_list[]=array("bonus_sn"=>$bonus_user['bonus_sn'],"bonus_name"=>$bonus_type['type_name']);
  						
  					}
  		}
  			if($bonus_type['send_type']==1)
  		{
  			   foreach ($allgoods as $good) {
  			 $bonus_good= mysqld_select("select * from " . table("bonus_good")." where good_id=:good_id and bonus_type_id=:bonus_type_id limit 1",array(":good_id"=>$good['id'],":bonus_type_id"=>$bonus_type['type_id']));
  				if(!empty( $bonus_good['id']))
  				{
  					 $bonus_user= mysqld_select("select * from " . table("bonus_user")." where deleted=0 and  isuse=0 and bonus_type_id=:bonus_type_id and openid=:openid limit 1",array(":bonus_type_id"=>$bonus_type['type_id'], ":openid" => $openid));
  						if(!empty($bonus_user['bonus_id']))
  						{
  							$bonus_list[]=array("bonus_sn"=>$bonus_user['bonus_sn'],"bonus_name"=>$bonus_type['type_name']);
  						}else
  						{
  							
  									 	$bonus_sn=date("Ymd",time()).$rank_model['type_id'].rand(1000000,9999999);
  									$bonus_user = mysqld_select("SELECT * FROM " . table('bonus_user')."where bonus_sn='".$bonus_sn."'" );
		  							while(!empty($bonus_user['bonus_id']))
		  							{
		  									 	$bonus_sn=date("Ymd",time()).$rank_model['type_id'].rand(1000000,9999999);
		  									 	$bonus_user = mysqld_select("SELECT * FROM " . table('bonus_user')."where bonus_sn='".$bonus_sn."'" );
		  							}
  									$data=array('createtime'=>time(),
  								'openid'=>$openid,
  								'bonus_sn'=>$bonus_sn,
			  					'deleted'=>0,
			  					'isuse'=>0,
  								'bonus_type_id'=>$bonus_type['type_id']);
  								mysqld_insert('bonus_user',$data);
  								
  								$bonus_list[]=array("bonus_sn"=>$bonus_sn,"bonus_name"=>$bonus_type['type_name']);
  								
  						}
  					
  				}
  			
  			}
  		}
  				if($bonus_type['send_type']==2)
  		{
  			
  				 $bonus_user= mysqld_select("select * from " . table("bonus_user")." where deleted=0 and  isuse=0 and bonus_type_id=:bonus_type_id and openid=:openid limit 1",array(":bonus_type_id"=>$bonus_type['type_id'], ":openid" => $openid));
  						if(!empty($bonus_user['bonus_id']))
  						{
  							$bonus_list[]=array("bonus_sn"=>$bonus_user['bonus_sn'],"bonus_name"=>$bonus_type['type_name']);
  						}else
  						{
  							
  									 	$bonus_sn=date("Ymd",time()).$rank_model['type_id'].rand(1000000,9999999);
  									$bonus_user = mysqld_select("SELECT * FROM " . table('bonus_user')."where bonus_sn='".$bonus_sn."'" );
		  							while(!empty($bonus_user['bonus_id']))
		  							{
		  									 	$bonus_sn=date("Ymd",time()).$rank_model['type_id'].rand(1000000,9999999);
		  									 	$bonus_user = mysqld_select("SELECT * FROM " . table('bonus_user')."where bonus_sn='".$bonus_sn."'" );
		  							}
  									$data=array('createtime'=>time(),
  								'openid'=>$openid,
  								'bonus_sn'=>$bonus_sn,
			  					'deleted'=>0,
			  					'isuse'=>0,
  								'bonus_type_id'=>$bonus_type['type_id']);
  								mysqld_insert('bonus_user',$data);
  								
  								$bonus_list[]=array("bonus_sn"=>$bonus_sn,"bonus_name"=>$bonus_type['type_name']);
  								
  						}
  			
  		}
  			if($bonus_type['send_type']==3)
  		{
  		$bonus_list[]=array("send_type"=>3,"bonus_name"=>$bonus_type['type_name']);
  							
  		}
  			
  			
  		
  	}
  	
  }
}

 
  
       include themePage('confirm');