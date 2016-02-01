<?php
			$operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
			if($operation=='delete')
			{
					mysqld_delete('addon9_singlepage',array("id"=>intval($_GP['id'])));
						message("删除成功！","refresh","success");
			}
			if($operation=='post')
			{

        
					$singlepage = mysqld_select("SELECT * FROM " . table('addon9_singlepage')." where id='".intval($_GP['id'])."' " );
  	   if (checksubmit('submit')) {
					  if(	empty($_GP['id']))
					   {
					   	
				$data=array('createtime'=>
				time(),'title'=>
				$_GP['title'],'open_footer'=>
				intval($_GP['open_footer']),'content'=>
				htmlspecialchars_decode($_GP['content']));

            
				
				mysqld_insert('addon9_singlepage',$data);
				message("添加成功",create_url('site', array('name' => 'addon9','do' => 'singlepage','op'=>'post','id'=>mysqld_insertid())),"success");
					}else
					{
					$data=array('title'=>
				$_GP['title'],'open_footer'=>
				intval($_GP['open_footer']),'content'=>
				htmlspecialchars_decode($_GP['content']));
                
				mysqld_update('addon9_singlepage',$data,array('id'=>$_GP['id']));
				
				message("修改成功","refresh","success");
					}
				}
				   
				    	include addons_page('singlepage');
				    	exit;
			}
		$singlepage_list = mysqld_selectall("SELECT * FROM " . table('addon9_singlepage') );
  	  
        	include addons_page('singlepage_list');