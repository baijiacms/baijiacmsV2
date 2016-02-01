<?php
defined('SYSTEM_IN') or exit('Access Denied');
	  $operation = !empty($_GP['op']) ? $_GP['op'] : 'listuser';
	   if ($operation == 'listuser') {
	   	
	   			 $list = mysqld_selectall("select * from " . table('user'));

			include page('listuser');
	  }
	  if ($operation == 'rule') {
	   	
	   			
				$allrule = mysqld_selectall('SELECT * FROM '.table('rule'));
						$id=$_GP['id'];
							 	$account = mysqld_select('SELECT * FROM '.table('user')." WHERE  id=:id" , array(':id'=> $id));
							 			$username =$account['username'];
							 			
							 			$userRule = mysqld_selectall('SELECT * FROM '.table('user_rule')." WHERE  uid=:uid" , array(':uid'=> $id));
								foreach($allrule as $key => $item){
										foreach($userRule as  $rule){
											if($item['modname']==$rule['modname']&&$item['moddo']==$rule['moddo'])
											{
												$allrule[$key]['check']=true;
											}
										}
									
								}
								 if (checksubmit('submit')) {
					
					
							if(empty($id))
							{
								
									message('操作异常',refresh(),'error');	
								
							}
							 
							 
						if(!empty($account['id']))
						{	
							 mysqld_delete('user_rule', array('uid'=> $account['id']));
							foreach($allrule as $item){
								if(!empty($_GP[$item['modname'].'-'.$item['moddo']]))
								{
										$data= array('uid'=> $account['id'],'modname'=> $item['modname'],'moddo'=>$item['moddo']);
								 mysqld_insert('user_rule', $data);
								}
							
							}
						}
						
							 
									message('权限修改成功！',refresh(),'succes');	
					
						
						 	
						}
							
					
					
					
					
					
					include page('rule');
	  }
	  
	  if ($operation == 'deleteuser') {
	  		mysqld_delete('user', array('id'=>$_GP['id']));
	  			 mysqld_delete('user_rule', array('uid'=> $_GP['id']));
		message('删除成功',refresh(),'success');	
	  }
	  	  if ($operation == 'changepwduser') {
	  		
					$account = mysqld_select('SELECT * FROM '.table('user')." WHERE  id=:id" , array(':id'=> $_GP['id']));
					$username =$account['username'];
					$id =$account['id'];
					if (checksubmit('submit')) {
						 	if(empty($_GP['newpassword']))
						 	{
						 		message('密码不能为空',refresh(),'error');	
						 	}
						 	
					
					if(!empty($account['id']))
					{
						if($_GP['newpassword']!=$_GP['confirmpassword'])
						{
							
								message('两次密码不一致！',refresh(),'error');	
						}
						$data= array('password'=> md5($_GP['newpassword']));
						 mysqld_update('user', $data,array('id'=> $account['id']));
								message('密码修改成功！',create_url('site',array('name' => 'user','do' => 'user','op'=>'listuser')),'succes');	
					}else
					{
						message($_GP['username'].'用户名不存在',refresh(),'error');	
					}
					 	
					}
						include page('changepwd');
	  }
	  
	  	  if ($operation == 'adduser') {
	  		
								$allrule = mysqld_selectall('SELECT * FROM '.table('rule'));
								 if (checksubmit('submit')) {
							 	if(empty($_GP['username'])||empty($_GP['newpassword']))
							 	{
							 		message('用户名或密码不能为空',refresh(),'error');	
							 	}
							 	
						$account = mysqld_select('SELECT * FROM '.table('user')." WHERE  username=:username" , array(':username'=> $_GP['username']));
						
						if(empty($account['id']))
						{
							if($_GP['newpassword']!=$_GP['confirmpassword'])
							{
								
									message('两次密码不一致！',refresh(),'error');	
								
							}
							$data= array('username'=> $_GP['username'],'password'=> md5($_GP['newpassword']),'createtime'=>time());
							 mysqld_insert('user', $data);
							 
							 
							 	$account = mysqld_select('SELECT * FROM '.table('user')." WHERE  username=:username" , array(':username'=> $_GP['username']));
						if(!empty($account['id']))
						{
							 mysqld_delete('user_rule', array('uid'=> $account['id']));
							foreach($allrule as $item){
								if(!empty($_GP[$item['modname'].'-'.$item['moddo']]))
								{
										$data= array('uid'=> $account['id'],'modname'=> $item['modname'],'moddo'=>$item['moddo']);
								 mysqld_insert('user_rule', $data);
								}
							
							}
						}
						
							 
							 
									message('新增用户成功！',web_url('user'),'succes');	
						}else
						{
							message($_GP['username'].'用户名已存在',refresh(),'error');	
						}
						
		 	
					}
	
			include page('adduser');
	  }


