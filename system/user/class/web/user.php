<?php
defined('SYSTEM_IN') or exit('Access Denied');
	  $operation = !empty($_GP['op']) ? $_GP['op'] : 'listuser';
	   if ($operation == 'listuser') {
	   	
	   			 $list = mysqld_selectall("select * from " . table('user'));

			include page('listuser');
	  }
	
	  
	  if ($operation == 'deleteuser') {
	  		mysqld_delete('user', array('id'=>$_GP['id']));
	  			 mysqld_delete('user_rule', array('uid'=> $_GP['id']));
		message('删除成功',refresh(),'success');	
	  }
	  
	  	  if ($operation == 'edituser') {
	  		 $user_group_list = mysqld_selectall("select * from " . table('user_group'));
							
					$account = mysqld_select('SELECT * FROM '.table('user')." WHERE  id=:id" , array(':id'=> $_GP['id']));
					$username =$account['username'];
					$id =$account['id'];
					if (checksubmit('submit')) {
						
				 	if(empty($_GP['username']))
							 	{
							 		message('用户名不能为空',refresh(),'error');	
							 	}
							 	
						if($username!=$_GP['username'])
						{
							$t_account = mysqld_select('SELECT * FROM '.table('user')." WHERE  username=:username and id!=:id limit 1" , array(':username'=> $_GP['username'],':id'=> $_GP['id']));
						if(!empty(	$t_account['id']))
						{
						message("该用户名已存在，不能重复使用");	
						}
							
						}
					
					if(!empty($account['id']))
					{
				 $user_group = mysqld_select("select * from " . table('user_group')."where id=:id",array(":id"=>intval($_GP['groupid'])));
					$data= array('username'=> $_GP['username'],'is_admin'=> intval($_GP['is_admin']),'groupid'=> intval($_GP['groupid']),'groupName'=> $user_group['groupName'],'createtime'=>time());
							
						 mysqld_update('user', $data,array('id'=> $account['id']));
								message('密码修改成功！',create_url('site',array('name' => 'user','do' => 'user','op'=>'listuser')),'succes');	
					}else
					{
						message('用户名不存在',refresh(),'error');	
					}
					 	
					}
						include page('edituser');
	  }
	  
	   	  if ($operation == 'changepwd') {
	   	  			$account = mysqld_select('SELECT * FROM '.table('user')." WHERE  id=:id" , array(':id'=> $_GP['id']));
	   	  				 if (checksubmit('submit')) {
			 	if(empty($_GP['newpassword']))
							 	{
							 		message('密码不能为空',refresh(),'error');	
							 	}
							if($_GP['newpassword']!=$_GP['confirmpassword'])
							{
								
									message('两次密码不一致！',refresh(),'error');	
								
							}
							
							
							$data= array('password'=> md5($_GP['newpassword']),'createtime'=>time());
							 mysqld_update('user', $data,array('id'=> $account['id']));
							 
									message('密码修改成功！',web_url('user'),'succes');	
							}
			
			
	   	  			include page('changepwd');
	   	  }
	   	  
	  	  if ($operation == 'adduser') {
	  					 $user_group_list = mysqld_selectall("select * from " . table('user_group'));
								 if (checksubmit('submit')) {
							 	if(empty($_GP['username'])||empty($_GP['newpassword']))
							 	{
							 		message('用户名或密码不能为空',refresh(),'error');	
							 	}
						if($username!=$_GP['username'])
						{
							$t_account = mysqld_select('SELECT * FROM '.table('user')." WHERE  username=:username  limit 1" , array(':username'=> $_GP['username']));
						if(!empty(	$t_account['id']))
						{
						message("该用户名已存在，不能重复使用");	
						}
							
						}
						$account = mysqld_select('SELECT * FROM '.table('user')." WHERE  username=:username" , array(':username'=> $_GP['username']));
						
						if(empty($account['id']))
						{
							if($_GP['newpassword']!=$_GP['confirmpassword'])
							{
								
									message('两次密码不一致！',refresh(),'error');	
								
							}
							
							
				 $user_group = mysqld_select("select * from " . table('user_group')."where id=:id",array(":id"=>intval($_GP['groupid'])));
							$data= array('username'=> $_GP['username'],'is_admin'=> intval($_GP['is_admin']),'groupid'=> intval($_GP['groupid']),'groupName'=> $user_group['groupName'],'password'=> md5($_GP['newpassword']),'createtime'=>time());
							 mysqld_insert('user', $data);
							 
							 
					
						
							 
							 
									message('新增用户成功！',web_url('user'),'succes');	
						}else
						{
							message($_GP['username'].'用户名已存在',refresh(),'error');	
						}
						
		 	
					}
	
			include page('edituser');
	  }


 if ($operation == 'rule') {
	   				$id=intval($_GP['id']);
	   			 $modules_list = mysqld_selectall("select * from " . table('modules')."where name!=:name",array(":name"=>"bj_tbk"));
	   			
	   			  $system_list = mysqld_selectall("select * from " . table('system_rule'));
	   			  
	   			  $user = mysqld_select("select * from " . table('user')." where id=:uid", array(':uid'=> $id));
	   			
	   			 	$user_group_rule = mysqld_selectall('SELECT * FROM '.table('user_group_rule')." WHERE  gid=:gid" , array(':gid'=> $user['groupid']));
						
	   			  
	   			  	$user_rule_rule = mysqld_selectall('SELECT * FROM '.table('user_rule')." WHERE  uid=:uid" , array(':uid'=> $id));
						
							$t_system_rule=false;
	   			  
	   			  	foreach($system_list as $key => $item){
	   			  			$t_system_rule=false;
	   			  				foreach($user_group_rule as  $rule){
											if($item['modname']==$rule['modname']&&$item['moddo']==$rule['moddo'])
											{
												$system_list[$key]['check']=true;
												$system_list[$key]['readonly']=true;
												$t_system_rule=true;
											}
										}
	   			  			if($t_system_rule==false)
	   			  			{
										foreach($user_rule_rule as  $rule){
											if($item['modname']==$rule['modname']&&$item['moddo']==$rule['moddo'])
											{
												$system_list[$key]['check']=true;
											}
										}
									}
									
								}
								
								$t_system_rule=false;
								
								foreach($modules_list as $key => $item){
								  			$t_system_rule=false;
								  			foreach($user_group_rule as  $rule){
											if($item['name']==$rule['modname'])
											{	
												$modules_list[$key]['check']=true;
												
												$modules_list[$key]['readonly']=true;
													$t_system_rule=true;
											}
										}
								  		
									 if($t_system_rule==false)
		   			  			{
											foreach($user_rule_rule as  $rule){
												if($item['name']==$rule['modname'])
												{	
													$modules_list[$key]['check']=true;
												}
											}
										}
									
								}
	   			  
	   			  
	   			  
	   					 if (checksubmit('submit')) {
					
		
							if(empty($id))
							{
								
									message('操作异常',refresh(),'error');	
								
							}
							
								 mysqld_delete('user_rule', array('uid'=> $id));
								 			$t_system_rule=false;
							foreach($system_list as $item){
								 			$t_system_rule=false;
										foreach($user_group_rule as  $rule){
											if($item['modname']==$rule['modname']&&$item['moddo']==$rule['moddo'])
											{
												$t_system_rule=true;
											}
										}
										
									if($t_system_rule==false)
	   			  			{
										if(!empty($_GP[$item['modname'].'-'.$item['moddo']]))
										{
												$data= array('uid'=>  $id,'rule_name'=>$item['rule_name'],'modname'=> $item['modname'],'moddo'=>$item['moddo']);
										 mysqld_insert('user_rule', $data);
										}
									}
							}
								$t_system_rule=false;
								foreach($modules_list as $item){
										$t_system_rule=false;
										
								foreach($user_group_rule as  $rule){
											if($item['name']==$rule['modname'])
											{	
												$t_system_rule=true;
											}
										}
										
										if($t_system_rule==false)
	   			  			{
								if(!empty($_GP[$item['name'].'-ALL']))
								{
								
										$data= array('uid'=>  $id,'rule_name'=>$item['title'],'modname'=> $item['name'],'moddo'=>'ALL');
								 mysqld_insert('user_rule', $data);
								}
							}
								
							
							}
							
								message('权限保存成功！',web_url('user', array('op'=>'listuser')),'success');
							
						}
	   			 
			include page('listuser_rule');
	  }