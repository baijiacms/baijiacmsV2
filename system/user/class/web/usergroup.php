<?php
defined('SYSTEM_IN') or exit('Access Denied');
	  $operation = !empty($_GP['op']) ? $_GP['op'] : 'listgroup';
	   if ($operation == 'listgroup') {
	   			 $list = mysqld_selectall("select * from " . table('user_group'));
			include page('listgroup');
	  }
	
	  
	  if ($operation == 'deletegroup') {
	  		mysqld_delete('user_group', array('id'=>$_GP['id']));
	  		mysqld_delete('user_group_rule', array('gid'=> $_GP['id']));
		message('删除成功',refresh(),'success');	
	  }
	  
	  
	    if ($operation == 'rule') {
	   				$id=intval($_GP['id']);
	   			 $modules_list = mysqld_selectall("select * from " . table('modules')."where name!=:name",array(":name"=>"bj_tbk"));
	   			
	   			  $system_list = mysqld_selectall("select * from " . table('system_rule'));
	   			  
	   			  	$user_group_rule = mysqld_selectall('SELECT * FROM '.table('user_group_rule')." WHERE  gid=:gid" , array(':gid'=> $id));
						
	   			  	foreach($system_list as $key => $item){
										foreach($user_group_rule as  $rule){
											if($item['modname']==$rule['modname']&&$item['moddo']==$rule['moddo'])
											{
												$system_list[$key]['check']=true;
											}
										}
									
								}
								
								
								  	foreach($modules_list as $key => $item){
										foreach($user_group_rule as  $rule){
											if($item['name']==$rule['modname'])
											{	
												$modules_list[$key]['check']=true;
											}
										}
									
								}
	   			  
	   			  
	   			  
	   					 if (checksubmit('submit')) {
					
		
							if(empty($id))
							{
								
									message('操作异常',refresh(),'error');	
								
							}
							
								 mysqld_delete('user_group_rule', array('gid'=> $id));
							foreach($system_list as $item){
								if(!empty($_GP[$item['modname'].'-'.$item['moddo']]))
								{
										$data= array('gid'=>  $id,'rule_name'=>$item['rule_name'],'modname'=> $item['modname'],'moddo'=>$item['moddo']);
								 mysqld_insert('user_group_rule', $data);
								}
							
							}
							
								foreach($modules_list as $item){
								if(!empty($_GP[$item['name'].'-ALL']))
								{
								
										$data= array('gid'=>  $id,'rule_name'=>$item['title'],'modname'=> $item['name'],'moddo'=>'ALL');
								 mysqld_insert('user_group_rule', $data);
								}
							
							}
							
								message('权限保存成功！',web_url('usergroup', array('op'=>'listgroup')),'success');
							
						}
	   			 
			include page('listgroup_rule');
	  }
	
	  	 
	  
	  	  if ($operation == 'usergroup') {
	  		 			 $usergroup = mysqld_select("select * from " . table('user_group')." where id=:id",array('id'=> $_GP['id']));
	  		 		
								 if (checksubmit('submit')) {	 
							 	if(empty($_GP['groupName']))
							 	{
							 		message('用户组名称不能空');	
							 		exit;
							 	}
							 	if(empty($_GP['id']))
							 	{
							$data= array('groupName'=> $_GP['groupName'],'createtime'=>time());
							 mysqld_insert('user_group', $data);
							 
							 	message('用户组添加成功！',web_url('usergroup', array('op'=>'listgroup')),'success');	
							 		exit;
							}else
							{
								 mysqld_update('user_group',array('groupName'=> $_GP['groupName']),array('id'=> $_GP['id']));
									 	message('用户组修改成功！',web_url('usergroup', array('op'=>'listgroup')),'success');	
							 		exit;
							}
		 	
					}
	
			include page('usergroup');
	  }


