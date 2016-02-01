<?php
			$code=$_GP['code'];
				$settings=globaSetting();
			   if (checksubmit('submit')) {
			   	 require WEB_ROOT.'/system/modules/plugin/payment/'.$code.'/submit.php';
			   	 
				message('保存成功！',create_url('site', array('name' => 'modules','do' => 'payment','op'=>'list')),'success');
			  }
			$item = mysqld_select("SELECT * FROM " . table('payment') . " WHERE code = :code", array(':code' => $code));
			$configs = unserialize($item['configs']);
     include WEB_ROOT.'/system/modules/plugin/payment/'.$code.'/config.php';