<?php

			$code=$_GP['code'];
			require WEB_ROOT.'/system/modules/plugin/payment/'.$code.'/lang.php';
						

                 $item = mysqld_select("SELECT * FROM " . table('payment') . " WHERE code = :code", array(':code' => $code));
              
                 if (empty($item['id'])) {
                 				 $data = array(
                    'code' => $code,
                    'name' => $_LANG['payment_'.$code.'_name'],
                    'desc' => $_LANG['payment_'.$code.'_desc'],
                    'enabled' => '0',
                   'iscod' => $_LANG['payment_'.$code.'_iscod'],
                   'online' => $_LANG['payment_'.$code.'_online']
                  );
									 mysqld_insert('payment', $data);
                } else {
                				 $data = array(
                    'name' => $_LANG['payment_'.$code.'_name'],
                    'desc' => $_LANG['payment_'.$code.'_desc'],
                   'iscod' => $_LANG['payment_'.$code.'_iscod'],
                   'online' => $_LANG['payment_'.$code.'_online']
                  );
                    mysqld_update('payment',$data , array('code' => $code));
                }
$this->do_payment_config();