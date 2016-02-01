<?php

			$code=$_GP['code'];
			require WEB_ROOT.'/system/modules/plugin/dispatch/'.$code.'/lang.php';
						

                 $item = mysqld_select("SELECT * FROM " . table('dispatch') . " WHERE code = :code", array(':code' => $code));
              
                 if (empty($item['id'])) {
                 				 $data = array(
                    'code' => $code,
                    'name' => $_LANG['dispatch_'.$code.'_name'],
                    'desc' => $_LANG['dispatch_'.$code.'_desc'],
                    'enabled' => '1',
                   'sendtype' => $_LANG['dispatch_'.$code.'_sendtype']
                  );
									 mysqld_insert('dispatch', $data);
                } else {
                				 $data = array(
                    'name' => $_LANG['dispatch_'.$code.'_name'],
                    'desc' => $_LANG['dispatch_'.$code.'_desc'],
                    'enabled' => '1',
                   'sendtype' => $_LANG['dispatch_'.$code.'_sendtype']
                  );
                    mysqld_update('dispatch',$data , array('code' => $code));
                }
                message("操作成功",create_url('site', array('name' => 'modules','do' => 'dispatch','op'=>'display')));