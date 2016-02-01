<?php 

		
				
				$payment = mysqld_select("SELECT * FROM " . table('payment') . " WHERE  enabled=1 and code='bank' limit 1");
          $configs=unserialize($payment['configs']);
            require_once WEB_ROOT.'/system/shopwap/class/mobile/order_notice_mail.php';  
             mailnotice($orderid);
         message( $configs['bank_pay_desc'],WEBSITE_ROOT.mobile_url('myorder'),'success',false);
			
?>