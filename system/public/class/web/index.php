<?php
			$settings=globaSetting();
		if (!empty($_CMS[WEB_SESSION_ACCOUNT])) {
			header("location:".create_url('site', array('name' => 'index','do' => 'main')));
			}
		include page('index');