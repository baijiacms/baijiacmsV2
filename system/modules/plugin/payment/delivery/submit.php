<?php 
$pay_submit_data=array('delivery_pay_desc'=>
htmlspecialchars_decode($_GP['delivery_pay_desc']));
mysqld_update('payment',array('order' => $_GP['pay_order'],'configs'=> serialize($pay_submit_data)) , array('code' => 'delivery'));
	mysqld_update('payment', array('enabled' => '1') , array('code' => 'delivery'));
?>