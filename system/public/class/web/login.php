<?php

			
			if(!$this->check_verify($_GP['verify']))
			{
				message('验证码输入错误！','refresh','error');	
			}
			$account = mysqld_select('SELECT * FROM '.table('user')." WHERE  username = :username and password=:password" , array(':username' => $_GP['username'],':password'=> md5($_GP['password'])));
				if(!empty($account['id']))
			{
				unset($account['password']);
				$_SESSION[WEB_SESSION_ACCOUNT]=$account;
				checkAddons();
				header("location:".create_url('site', array('name' => 'public','do' => 'index')));
		}else
		{
			
					message('用户名密码错误！','refresh','error');	
			
			}