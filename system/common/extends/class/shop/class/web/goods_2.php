<?php
 if($_CMS['addons_bj_hx']) {
                 
                    	 mysqld_delete('bj_hx_verify_goods', array('goodsid' => $id));
                 
                    	if(!empty($_GP['verifyshop_cb']))
	                    {
	                    	 foreach ($_GP['verifyshop_cb'] as $verifyshop_cb ) {
	                    		 mysqld_insert('bj_hx_verify_goods', array('goodsid' => $id,'verifyid'=>$verifyshop_cb,'createtime'=>time()));
	                    		}
	                    }
                    		
                 
                     }
                     
                     
                      	if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shop/class/web/goods_2.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shop/class/web/goods_2.php');
				}
                     
  