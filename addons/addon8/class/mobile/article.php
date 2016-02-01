<?php
				$article = mysqld_select("SELECT * FROM " . table('addon8_article')." where id=:id ",array(":id"=>intval($_GP['id'])) );
				if(!empty($article['id']))
				{
					
							mysqld_update('addon8_article',array('readcount'=>intval($article['readcount'])+1),array('id'=>intval($_GP['id'])));
				}
				$cfg=globaSetting();
  	 			if(empty($article['mobileTheme']))
  	 			{
        	include addons_page('article');
       	 }else
       	 {
       	 		include addons_page('article'.$article['mobileTheme']);
       	 }