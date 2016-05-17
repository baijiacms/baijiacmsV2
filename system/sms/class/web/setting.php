<?php
defined('SYSTEM_IN') or exit('Access Denied');

$settings=globaSetting();
				   		  
	   		 if (checksubmit("submit")) {
            $cfg = array(
            'regsiter_usesms' => intval( $_GP['regsiter_usesms']),
               'sms_key' => $_GP['sms_key'],
                'sms_secret' => $_GP['sms_secret'],
                'sms_secret_sec' => $_GP['sms_secret_sec'],
                'sms_secret_resec' => $_GP['sms_secret_resec'],
                'sms_secret_count' => $_GP['sms_secret_count']
            );
        
         
          refreshSetting($cfg);
         
         $settings=globaSetting();
				   		  
				   		  
				   		  
            message('保存成功', 'refresh', 'success');
        }
 if (checksubmit("smstest")) {
				system_sms_test($_GP['sms_test_tell']);
				   		  
				   		  
            message('已发送测试短信', 'refresh', 'success');
        }
    

					include page('setting');