<?php
	$settings=globaSetting();
					$themeconfig=SYSTEM_WEBROOT."/themes/".SESSION_PREFIX."_theme.bjk";
			if(!is_file($themeconfig)) {
						$myfile = fopen($themeconfig, "w");
					fwrite( $myfile,'default');
					fclose($myfile);
			}
			$operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
			if($operation=='post')
			{
				if(!empty($_GP['theme']))
				{
					$myfile = fopen($themeconfig, "w");
					fwrite( $myfile,$_GP['theme']);
					fclose($myfile);
				}
				unset($_SESSION["theme"]);
				clear_theme_cache();
				  message('保存成功', 'refresh', 'success');
			}
			if (is_file($themeconfig)) { 
			$myfile = fopen($themeconfig, "r");
		
		$items=fgets($myfile);
			fclose($myfile);
		}
		if(empty($items))
		{
		$items='default';
		
		}
			$mydir = dir(WEB_ROOT . "/themes/");
			$themes=array();
			$index=0;
			while($file = $mydir->read())
			{
				if((is_dir(WEB_ROOT . "/themes/$file")) AND ($file!=".") AND ($file!=".."))
				{
					$themes[$index++]=$file;
				}
			}
        	include page('themes');