<?php 

            mysqld_update('shop_order', array('status' => '1','paytype' => '3','paytime'=>time()), array('id' => $orderid));

	  require_once WEB_ROOT.'/system/shopwap/class/mobile/order_notice_mail.php';  
             mailnotice($orderid);
            message('订单提交成功，请您收到货时付款！', WEBSITE_ROOT.mobile_url('myorder'), 'success');

?>