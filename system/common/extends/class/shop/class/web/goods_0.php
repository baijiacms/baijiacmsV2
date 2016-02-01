<?php
 if($_CMS['addons_bj_hx']) {
                  $bj_hx_verify_goods = mysqld_selectall("SELECT bj_hx_verify_goods.*,bj_hx_verify.vname FROM " . table('bj_hx_verify_goods') . " bj_hx_verify_goods left join " . table('bj_hx_verify') . " bj_hx_verify on bj_hx_verify_goods.verifyid=bj_hx_verify.id WHERE bj_hx_verify_goods.goodsid = :goodsid", array(':goodsid' => $id));
              
  }
 	if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shop/class/web/goods_0.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shop/class/web/goods_0.php');
				}