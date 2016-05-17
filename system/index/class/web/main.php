<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: baijiacms <QQ:1987884799> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
			$this->checkVersion();
			$this->checkAddons();
			
							 	$account = mysqld_select('SELECT * FROM '.table('user')." WHERE  id=:id" , array(':id'=> $_CMS[WEB_SESSION_ACCOUNT]['id']));
	
								
								
$username=	$_CMS[WEB_SESSION_ACCOUNT]['username'];
	$settings=globaSetting();
	$condition='';

	$condition=' and `isdisable`=0 ';

		$modulelist = mysqld_selectall("SELECT *,'' as menus FROM " . table('modules') . " where 1=1 $condition order by displayorder");
		foreach($modulelist as $index => $module)  
							{
		
				if(checkrule($module['name'],'ALL'))
				{
					
					
						$modulelist[$index]['menus']=mysqld_selectall("SELECT * FROM " . table('modules_menu') . " WHERE `module`=:module order by id",array(':module'=>$module['name']));
					
				}else
				{
					
				unset($modulelist[$index]);	
				}

	
		
		}
		include page('main');