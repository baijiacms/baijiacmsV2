<?php 

			$hasqrcode=false;
if($_CMS['addons_bj_qrcode'])
{
	
					$spread = mysqld_select("SELECT * FROM " . table('bj_qrcode_qrcode')." order by active desc limit 1" );
			if(!empty($spread['id']))
			{
				$hasqrcode=true;
			}
}

  if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/fansindex_1.php'))
			{
  			require(CUSTOM_ROOT.'/common/extends/class/shopwap/class/mobile/fansindex_1.php');
				}