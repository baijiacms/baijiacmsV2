<?php
		   $operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
		 if ($operation == 'display') {
		 			$status =1;
		 	  $condition .= " AND status = '" . intval($status) . "'";
		 	    $list = mysqld_selectall("SELECT * FROM " . table('shop_order') . " WHERE 1=1 $condition ");
          $total = mysqld_selectcolumn("SELECT count(*) FROM " . table('shop_order') . " WHERE 1=1 $condition ");
          
          $dispatchs = mysqld_selectall("SELECT * FROM " . table('shop_dispatch') );
						$dispatchdata=array();
					  if(is_array($dispatchs)) { foreach($dispatchs as $disitem) { 
					  	$dispatchdata[$disitem['id']]=$disitem;
							 } }
							 
           if (checksubmit('sendbatexpress')) {
           	 	$index=0;
           	if(!empty($_GP['check']))
           	{
           		
						 	 foreach ($_GP['check'] as $k ) {
						 	 	$item = mysqld_select("SELECT status,ordersn FROM " . table('shop_order') . " WHERE id = :id", array(':id' => $k));
						     
						$isexpress=$_GP['express'.$k];
						 	 	if ($isexpress!='-1' && empty($_GP['expressno'.$k])) {
						                    message('订单'.$item['ordersn'].'没有快递单号，请填写完整！');
						                }
						 	 	      if($item['status']!=1)
						          {
						          	
						          	 message('订单'.$item['ordersn'].'状态不是待发货状态，请重新点击”批量发货“后进行操作。');
						          }     
						 	}
						
						 foreach ($_GP['check'] as $k ) {
						                $item = mysqld_select("SELECT * FROM " . table('shop_order') . " WHERE id = :id", array(':id' => $k));
						                
						                
						             $express=$_GP['express'.$k];
						                if($express=='-1')
						                {
						                	$express=='';
						                	}
						                     	 if($item['paytypecode']=='bank'||$item['paytypecode']=='delivery')
                 	 {
                 		updateOrderStock($k);
                 		}
						                mysqld_update('shop_order', array(
						                    'status' => 2,
						                    'express' => $express,
						                    'expresscom' => $_GP['expresscom'.$k],
						                    'expresssn' => $_GP['expressno'.$k],
						                        ), array('id' => $k));
						 	$index= 	$index+1;
						
						
						}
						 	}
						                message('批量发货操作完成,成功处理'.$index.'条订单', refresh(), 'success');
						
						}
        $dispatchlist = mysqld_selectall("SELECT * FROM " . table('dispatch')." where sendtype=0" );
					
		 	  include page('orderbat');
		}