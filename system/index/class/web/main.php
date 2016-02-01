<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 百家威信 <QQ:2752555327> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
	$allrule = mysqld_selectall('SELECT * FROM '.table('rule'));
						
							 	$account = mysqld_select('SELECT * FROM '.table('user')." WHERE  id=:id" , array(':id'=> $_CMS[WEB_SESSION_ACCOUNT]['id']));
							 		$menurule=array();
							 			$userRule = mysqld_selectall('SELECT * FROM '.table('user_rule')." WHERE  uid=:uid" , array(':uid'=> $_CMS[WEB_SESSION_ACCOUNT]['id']));
								foreach($allrule as  $item){
										foreach($userRule as  $rule){
											if($item['modname']==$rule['modname']&&$item['moddo']==$rule['moddo'])
											{
												$menurule[]=$item['modname']."-".$item['moddo'];
										
											}
										}
									
								}
								
								
$username=	$_CMS[WEB_SESSION_ACCOUNT]['username'];
	$settings=globaSetting();
	$condition='';
	if(mysqld_fieldexists('modules', 'isdisable')) {
	$condition=' and `isdisable`=0 ';
}
		$modulelist = mysqld_selectall("SELECT *,'' as menus FROM " . table('modules') . " where 1=1 $condition order by displayorder");
		foreach($modulelist as $index => $module)  
							{
			$modulelist[$index]['menus']=mysqld_selectall("SELECT * FROM " . table('modules_menu') . " WHERE `module`=:module order by id",array(':module'=>$module['name']));
		}
		include page('main');