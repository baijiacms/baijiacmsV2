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
                     
                     
                      if($_CMS['addons_bj_tbk']) {
                $bj_tbk_good_commission = mysqld_select("SELECT * FROM " . table('bj_tbk_good_commission') . " WHERE goodid = :id", array(':id' => $id));
                if (empty($bj_tbk_good_commission['goodid'])) {
                    	 mysqld_insert('bj_tbk_good_commission', array('customCommission'=>intval($_GP['customCommission']),
                    	 'customCommissionType'=>intval($_GP['customCommissionType']),'commission1'=>intval($_GP['bj_tbk_commission'])
                    	 ,'commission2'=>intval($_GP['bj_tbk_commission2'])
                    	 ,'commission3'=>intval($_GP['bj_tbk_commission3']), 'goodid' => $id));
             
                }else
                {
                	 mysqld_update('bj_tbk_good_commission', array('customCommission'=>intval($_GP['customCommission']),
                	 'customCommissionType'=>intval($_GP['customCommissionType']),'commission1'=>intval($_GP['bj_tbk_commission']),'commission2'=>intval($_GP['bj_tbk_commission2']),'commission3'=>intval($_GP['bj_tbk_commission3'])
                	), array('goodid' => $id));
                }
          }      
                      	if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shop/class/web/goods_2.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shop/class/web/goods_2.php');
				}