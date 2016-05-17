<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: baijiacms <QQ:1987884799> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');

class indexAddons  extends BjSystemModule {
	public function do_changepwd()
	{
		$this->__web(__FUNCTION__);
	}
	public function do_center()
	{
		$this->__web(__FUNCTION__);
	}
	public function do_Main()
	{
		$this->__web(__FUNCTION__);
	}
		public function do_keupload()
	{
		$this->__web(__FUNCTION__);
	}
		
	public function do_file_ueupload()
	{
		$this->__web(__FUNCTION__);
	}
	public function do_ueupload()
	{
		$this->__web(__FUNCTION__);
	}
	
	public function dateToWeekday($dateindex)
	{
		if($dateindex==1)
		{
			return '周一';
		}
			if($dateindex==2)
		{
			return '周二';
		}
			if($dateindex==3)
		{
			return '周三';
		}
			if($dateindex==4)
		{
			return '周四';
		}
			if($dateindex==5)
		{
			return '周五';
		}
			if($dateindex==6)
		{
			return '周六';
		}
			if($dateindex==7)
		{
			return '周日';
		}
		return "";
	}
	
		function checkVersion()
	{

		$settings=globaSetting();		
		if(empty($settings['system_version']))
		{
					message("版本检查更新",create_url('site', array('name' => 'modules','do' => 'update','act'=>'toupdate')),"success");
	
		}else
		{
		if(intval(CORE_VERSION)>intval($settings['system_version']))
		{
			message("发现最新版本，系统将进行更新！",create_url('site', array('name' => 'modules','do' => 'update','act'=>'toupdate')),"success");
		}
		}
	}
	
	
	function checkAddons()
	{
			$addons = dir(ADDONS_ROOT); 
			while($file = $addons->read())
			{
								if(($file!=".") AND ($file!="..")) 
									{
										
										
											if(is_file(ADDONS_ROOT.$file.'/key.php'))
											{
											 $addons_key=file_get_contents(ADDONS_ROOT.$file.'/key.php');
													if($file==$addons_key||md5($file)==$addons_key)
													{
														$item = mysqld_select("SELECT * FROM " . table('modules')." where `name`=:name", array(':name' => $file));
								       			if(empty($item['name']))
								       			{
								       					message("发现可用插件，系统将进行安装！",create_url('site', array('name' => 'modules','do' => 'addons_update')),"success");
								       			}else
								       			{
															 $addons_version=file_get_contents(ADDONS_ROOT.$file.'/version.php');
															if($addons_version>$item['version'])
															{
																	message("发现插件更新，系统将进行更新！",create_url('site', array('name' => 'modules','do' => 'addons_update')),"success");
							
															}
								       			}
							      	 		}
							    	  }
							}
			}
	}

	
}


