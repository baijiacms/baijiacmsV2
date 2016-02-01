<?php
defined('SYSTEM_IN') or exit('Access Denied');
abstract class BjSystemModule {
		public function __mobile($f_name){
			global $_CMS,$_GP;
			$config=globaSetting();
			$cfg=$config;
			$filephp=$_CMS['module'].'/class/mobile/'.strtolower(substr($f_name,3)).'.php';
		
			if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.$filephp))
			{
								include_once  CUSTOM_ROOT.$filephp;
			}else
			{
					include_once  SYSTEM_ROOT.$filephp;
			}
	}
}