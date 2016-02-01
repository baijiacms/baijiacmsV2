<?php
				$singlepage = mysqld_select("SELECT * FROM " . table('addon9_singlepage')." where id=:id ",array(":id"=>intval($_GP['id'])) );
				$cfg=globaSetting();
  	 		include addons_page('singlepage');
   