<?php
  if($_CMS['addons_bj_hx']) {
               $verifylist = mysqld_selectall("SELECT * FROM " . table('bj_hx_verify'));
   }
   
    	if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shop/class/web/goods_3.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shop/class/web/goods_3.php');
				}