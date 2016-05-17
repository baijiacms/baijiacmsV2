<?php
	define('LOCK_TO_UPDATE', true);	
		$settings=globaSetting();
	 $op = !empty($_GP['op']) ? $_GP['op'] : 'display';
			if($_GP['act']=="toupdate"&&LOCK_TO_UPDATE==true)
			{
		
						require 'updatesql.php';
					 $cfg = array(
                'system_version' => CORE_VERSION
            );
          refreshSetting($cfg);
    			message("系统升级完成!",create_url('site', array('name' => 'index','do' => 'main')),"success");
			}
		
		
				$op="version";
							   if(is_file(WEB_ROOT.'/config/debug.php'))
				{
					$core_development=1;
				}
				
							if($_GP['act']=="development")
			{
					if(empty($_GP['status']))
          	{
          		@unlink(WEB_ROOT.'/config/debug.php');
          			message("开发模式关闭成功!","refresh","success");
          	}else
          	{
          		


file_put_contents(WEB_ROOT.'/config/debug.php',"<?php define('DEVELOPMENT',1);define('SQL_DEBUG', 1);?>");
			message("开发模式开启成功!","refresh","success");
          	}
          }
					$localversion=$settings['system_version'];
		
			include page('update');