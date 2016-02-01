<?php

			$operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
				if($operation=='display')
			{
				$pormotions = mysqld_selectall("SELECT  * FROM " . table('shop_pormotions') );
  	
				include page('promotion_list');
				    	exit;
					}
			if($operation=='delete')
			{
				
				mysqld_delete('shop_pormotions',array('id'=>intval($_GP['id'])));
						message("删除成功！","refresh","success");
							    	exit;
			}
			if($operation=='post')
			{
				 $id=intval($_GP['id']);
				 $pro=mysqld_select("select * from ".table('shop_pormotions'). "where id=:id  limit 1",array(':id'=>$id));
		   if (checksubmit('submit')) {
		   	 $data=array(
			 'promoteType'=>$_GP['radioPromotionType'],
			 'condition'=>(int)intval($_GP['promotionmoney']),
			 'pname'=>$_GP['promotionname'],
			 'starttime'=>strtotime($_GP['start_time']),
			 'endtime'=>strtotime($_GP['end_time']),
			 'description'=>$_GP['description']
		 );

		 if($data['starttime']>$data['endtime']){
		 	message('设置错误，开始时间不能大于结束时间','refresh','error');
			return;
		 }
		 	 if(empty($data['pname'])){
			message('请输入活动名称','refresh','error');
			return;
		 }

		 if(empty($data['condition'])){
			message('请输入满额(件)数量','refresh','error');
			return;
		 }
	
		 if(!empty($id)){	
			 mysqld_update("shop_pormotions",$data,array('id'=>$id));
		 }else{
			mysqld_insert("shop_pormotions",$data);
		 }
		 message('操作成功！',create_url('site', array('name' => 'promotion','do' => 'promotion','op'=>'display')),'success');
		  }
				    	include page('promotion');
				    	exit;
			}
