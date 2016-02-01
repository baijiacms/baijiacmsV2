<?php
defined('SYSTEM_IN') or exit('Access Denied');
		hasrule('weixin','weixin');
$settings=globaSetting();
				   		  
		$payment = mysqld_select("SELECT * FROM " . table('payment') . " WHERE code = :code", array(':code' => 'weixin'));
		if(!empty($payment['configs']))
		{
			$paymentconfig = unserialize($payment['configs']);			   		
		}	   		
				$thirdlogin = mysqld_select("SELECT * FROM " . table('thirdlogin') . " WHERE code = :code", array(':code' => 'weixin'));
				   		
 if (checksubmit()) {
            $cfg = array(
               'weixinname' => $_GP['weixinname'],
                'weixintoken' => $_GP['weixintoken'],
                'EncodingAESKey' => $_GP['EncodingAESKey'],
						  	'weixin_appId' => $_GP['weixin_appId'],
				   		  'weixin_appSecret' => $_GP['weixin_appSecret'],
				   		  'weixin_autoreg'=> $_GP['weixin_autoreg'],
				   		  'weixin_autoaddress'=> $_GP['weixin_autoaddress'],
				   		  'weixin_noaccess'=> intval($_GP['weixin_noaccess'])
            );
        
         
          refreshSetting($cfg);
 					  mysqld_delete('config', array('name'=>'weixin_access_token'));
         
         $settings=globaSetting();
				   		  
				   		  
				   		  
				   		      $thirdlogin = mysqld_select("SELECT * FROM " . table('thirdlogin') . " WHERE code = :code", array(':code' => 'weixin'));
              	require WEB_ROOT.'/system/modules/plugin/thirdlogin/weixin/lang.php';
              
                 if (empty($thirdlogin['id'])) {
                 		 $data = array(
                    'code' => 'weixin',
                     'enabled' => intval($_GP['thirdlogin_weixin']),
                    'name' => $_LANG['thirdlogin_weixin_name']
                  );
									 mysqld_insert('thirdlogin', $data);
                } else {
	                		 $data = array(
	                		  'enabled' => intval($_GP['thirdlogin_weixin']),
	                    'name' => $_LANG['thirdlogin_weixin_name'],
	                  );
                    mysqld_update('thirdlogin',$data , array('code' =>'weixin'));
                }
				   		  
				   		  
            if(empty($settings['weixintoken'])&&!empty($_GP['weixintoken']))
	        {
	        	header("location:". create_url('site', array('name' => 'weixin','do' => 'setting')));
	        }else
	        {
            message('保存成功', 'refresh', 'success');
          }
        }
        if(empty($settings['weixintoken']))
        {
        $isfirst=true;	
        }

					include page('setting');