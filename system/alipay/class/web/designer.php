<?php
defined('SYSTEM_IN') or exit('Access Denied');

		hasrule('alipay','alipay');
		
		
		$menus = $this->menuQuery();
		
		
		
			include page('designer');