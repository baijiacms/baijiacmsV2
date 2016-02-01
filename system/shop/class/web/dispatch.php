<?php
		
		      $operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
		      $code=$_GP['code'];
		      
						require WEB_ROOT.'/system/modules/plugin/dispatch/'.$code.'/lang.php';
		 if ($operation == 'display') {
		 	  $list = mysqld_selectall("SELECT * FROM " . table('shop_dispatch') . " where deleted=0 and express=:code ORDER BY displayorder desc",array(':code'=>$code));
       	    foreach ($list as $index=> $item ) {
       	    	$list[$index]['dispatch_areas']= mysqld_selectall("SELECT * FROM " . table('shop_dispatch_area') . " WHERE dispatchid = :dispatchid", array(':dispatchid' => $item['id']));
    
       	    	
       	    }
       	   
       	     include page('dispatch_list');
			}
			if ($operation == 'post') {
				
				    $id = intval($_GP['id']);
				    
				     $dispatch = mysqld_select("SELECT * FROM " . table('dispatch') . " where code=:code",array(':code'=>$code));
       
				    
            if (!empty($id)) {
                $item = mysqld_select("SELECT * FROM " . table('shop_dispatch') . " WHERE id = :id", array(':id' => $id));
        		 $dispatch_areas = mysqld_selectall("SELECT * FROM " . table('shop_dispatch_area') . " WHERE dispatchid = :dispatchid", array(':dispatchid' => $id));
         
            }
            
            
            if (checksubmit('submit')) {
            	
            	  if(empty($_GP['regions']))
		           	{
		           	message("请点击+按钮添加一个区域");	
		           	}
            	 	  if(empty($_GP['express']))
		           	{
		           	message("需要选择配送方式");	
		           	}
		          
		           			 	 foreach ($_GP['regions'] as $region ) {
								 	 	$regions = explode("-",$region);
								 	 	$country=$regions[0];
								 	 		$provance=$regions[1];
								 	 			$city=$regions[2];
								 	 				$area=$regions[3];
								 	 $shop_dispatch_areas = mysqld_selectall("SELECT shop_dispatch_area.* FROM " . table('shop_dispatch_area') . " shop_dispatch_area left join " . table('shop_dispatch') . " shop_dispatch on shop_dispatch.id=shop_dispatch_area.dispatchid WHERE shop_dispatch.deleted=0 and shop_dispatch.express=:code and shop_dispatch_area.country = :country and shop_dispatch_area.provance = '".$provance."' and shop_dispatch_area.city = '".$city."' and shop_dispatch_area.area = '".$area."'",  array(':code'=>$code,':country'=>$country));
        		
        			 foreach ($shop_dispatch_areas as $shop_dispatch_area ) {
								 	
								 	 		if($shop_dispatch_area['dispatchid']!=$id)
								 	 		{
								 	 		message("'".$region."'该区域已在此配送方式中存在。");
								 		 	}
								 	}
								 	}
		           	
            	 $data = array(
                    'displayorder' => intval($_GP['displayorder']),
                    'dispatchname' => $_GP['dispatchname'],
                    'firstprice' => $_GP['firstprice'],
                    'secondprice' => $_GP['secondprice'],
                     'provance' => '',
                      'city' => '',
                       'area' =>'',
                     'firstweight' => intval($_GP['firstweight']),
              			  'secondweight' => intval($_GP['secondweight']),
                         'express' => $_GP['express'],
                          'deleted' => 0,
                    'sendtype' => intval($_GP['sendtype'])
                );
                if (empty($id)) {
                    mysqld_insert("shop_dispatch", $data);
                    $id = mysqld_insertid();
                } else {
                    mysqld_update("shop_dispatch", $data, array('id' => $id));
                }
                
                
              
		           		 mysqld_delete("shop_dispatch_area", array("dispatchid"=>$id));
								 	 foreach ($_GP['regions'] as $region ) {
								 	 	$regions = explode("-",$region);
								 	 	$country=$regions[0];
								 	 		$provance=$regions[1];
								 	 			$city=$regions[2];
								 	 				$area=$regions[3];
								 	 				
								 	 				
                    mysqld_insert("shop_dispatch_area", array('dispatchid'=>$id,'country'=>$country,'provance'=>$provance,'city'=>$city,'area'=>$area));
								 	 	
								 	}
		           	
                
                message('配送方式操作成功！', create_url('site', array('name' => 'shop','do' => 'dispatch','op'=>'display','code'=>$code)), 'success');
            }
					include page('dispatch');
				}elseif ($operation == 'delete') {
            $id = intval($_GP['id']);
            $row = mysqld_select("SELECT id FROM " . table('shop_dispatch') . " WHERE id = :id", array(':id' => $id));
            if (empty($row)) {
                message('抱歉，配送方式不存在或是已经被删除！');
            }
            //修改成不直接删除
            mysqld_update("shop_dispatch",array('deleted'=>1), array('id' => $id));
            message('删除成功！', 'refresh', 'success');
        }