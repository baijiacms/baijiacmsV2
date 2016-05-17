<?php
		
			$settings=globaSetting();
			if (checksubmit("submit")) {
            $cfg = array(
                'shop_openreg' => intval($_GP['shop_openreg']),
                 'shop_regcredit' => intval($_GP['shop_regcredit']),
						 	  'shop_postsale' => intval($_GP['shop_postsale']),
				   		  'shop_title' => $_GP['shop_title'],
				   		   'shop_description' => $_GP['shop_description'],
				   		    'shop_icp' => $_GP['shop_icp'],
				   		    'shop_kfcode' => htmlspecialchars_decode($_GP['shop_kfcode']),
				   		    'shop_tongjicode' => htmlspecialchars_decode($_GP['shop_tongjicode']),
				   		  'help' =>   htmlspecialchars_decode($_GP['help'])
            );
      
          	if (!empty($_FILES['shop_logo']['tmp_name'])) {
                    $upload = file_upload($_FILES['shop_logo']);
                    if (is_error($upload)) {
                        message($upload['message'], '', 'error');
                    }
                    $shoplogo = $upload['path'];
                }
                if(!empty($shoplogo))
                {
                	$cfg['shop_logo']=$shoplogo;
                }
            
                
                	if (!empty($_FILES['admin_logo']['tmp_name'])) {
                    $upload = file_upload($_FILES['admin_logo']);
                    if (is_error($upload)) {
                        message($upload['message'], '', 'error');
                    }
                    $admin_logo = $upload['path'];
                }
                
                
             
                
                if(!empty($admin_logo))
                {
                	$cfg['admin_logo']=$admin_logo;
                }
                
                
               if (!empty($_GP['admin_logo_del'])) {
                	$cfg['admin_logo'] = '';
                }
          	refreshSetting($cfg);
          	
         
          	
            message('保存成功', 'refresh', 'success');
        }
       if(is_file(WEB_ROOT.'/config/debug.php'))
				{
					$core_development=1;
				}
		include page('setting');