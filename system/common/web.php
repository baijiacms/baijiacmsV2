<?php
defined('SYSTEM_IN') or exit('Access Denied');
abstract class BjSystemModule {
		public function __web($f_name){
			global $_CMS,$_GP;
			
			$filephp=$_CMS['module'].'/class/web/'.strtolower(substr($f_name,3)).'.php';
			
			if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.$filephp))
			{
								include_once  CUSTOM_ROOT.$filephp;
			}else
			{
					include_once  SYSTEM_ROOT.$filephp;
			}
		}
}