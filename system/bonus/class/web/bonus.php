<?php

			$operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
			if($operation=='delete')
			{
				
				mysqld_update('bonus_type',array('deleted'=>1),array('type_id'=>intval($_GP['id'])));
						message("删除成功！","refresh","success");
			}
			if($operation=='post')
			{

        
					$bonus = mysqld_select("SELECT * FROM " . table('bonus_type')." where type_id='".intval($_GP['id'])."' " );
  	   if (checksubmit('submit')) {
					  if(	empty($_GP['id']))
					   {
					   	

					   	
				$data=array('type_name'=>
				$_GP['type_name'],'type_money'=>
				$_GP['type_money'],'send_type'=>
				$_GP['send_type'],'min_amount'=>
				$_GP['min_amount'],'max_amount'=>
				$_GP['max_amount'],'send_start_date'=>
				strtotime($_GP['send_start_date']),'send_end_date'=>
				strtotime($_GP['send_end_date']),'use_start_date'=>
				strtotime($_GP['use_start_date']),'use_end_date'=>
				strtotime($_GP['use_end_date']),'min_goods_amount'=>
				$_GP['min_goods_amount']);

            
				
				mysqld_insert('bonus_type',$data);
				message("添加成功",create_url('site', array('name' => 'bonus','do' => 'bonus','op'=>'display')),"success");
					}else
					{
			$data=array('type_name'=>
				$_GP['type_name'],'type_money'=>
				$_GP['type_money'],'send_type'=>
				$_GP['send_type'],'min_amount'=>
				$_GP['min_amount'],'max_amount'=>
				$_GP['max_amount'],'send_start_date'=>
				strtotime($_GP['send_start_date']),'send_end_date'=>
				strtotime($_GP['send_end_date']),'use_start_date'=>
				strtotime($_GP['use_start_date']),'use_end_date'=>
				strtotime($_GP['use_end_date']),'min_goods_amount'=>
				$_GP['min_goods_amount']);
                
				mysqld_update('bonus_type',$data,array('type_id'=>$_GP['id']));
				
				message("修改成功","refresh","success");
					}
				}
				    	include page('bonus');
				    	exit;
			}
		$bonus_list = mysqld_selectall("SELECT *,0 sendcount,0 usercount FROM " . table('bonus_type')." where deleted=0" );
  	   	 foreach($bonus_list as $index=>$bonus)
  	 {
  	 	$bonus_list[$index]['sendcount']= mysqld_selectcolumn("SELECT count(*) FROM " . table('bonus_user')." where deleted=0 and bonus_type_id=:bonus_type_id",array(":bonus_type_id"=>$bonus['type_id']));
  	 	$bonus_list[$index]['usercount']= mysqld_selectcolumn("SELECT count(*) FROM " . table('bonus_user')." where deleted=0 and isuse=1 and bonus_type_id=:bonus_type_id",array(":bonus_type_id"=>$bonus['type_id']));
  	 }
        	include page('bonus_list');