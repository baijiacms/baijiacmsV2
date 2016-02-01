<?php 
			   	  			 $data = array(
                    'code' => 'qq',
                    'name' => 'qq',
                    'enabled' => '1'
                  );
                 $item = mysqld_select("SELECT * FROM " . table('thirdlogin') . " WHERE code = :code", array(':code' => 'qq'));
              
                 if (empty($item['id'])) {
									 mysqld_insert('thirdlogin', $data);
                } else {
                    mysqld_update('thirdlogin',$data , array('code' => $code));
                }
                $thirdlogin_submit_data=array('thirdlogin_qq_appid'=>
$_GP['thirdlogin_qq_appid'],'thirdlogin_qq_appkey'=>
$_GP['thirdlogin_qq_appkey']);
mysqld_update('thirdlogin',array('configs'=> serialize($thirdlogin_submit_data)) , array('code' => 'qq'));
			  
			   	  ?>