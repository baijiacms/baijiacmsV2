<?php

// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: °Ù¼ÒÍþÐÅ <QQ:2752555327> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
 $goodslist = mysqld_selectall("SELECT goods.id,goods.sales from  " . table('shop_goods') . " goods  ");

 foreach ($goodslist as $gooditem){
    
     $goodtotal = mysqld_selectcolumn("SELECT sum(goodorder.total) FROM " . table('shop_order_goods') . " goodorder left join " . table('shop_order') . " orders on orders.id=goodorder.orderid WHERE goodorder.goodsid = :id and orders.status>=1", array(':id' => $gooditem['id']));
     if($goodtotal > 0 && $goodslist['sales'] != $goodtotal && !empty($goodtotal))
        {
         mysqld_update('shop_goods', array('sales' => $goodtotal), array('id' => $gooditem['id']));
         }
     }


 $list = mysqld_selectall("SELECT goods.*,0 as cpersent,goods.sales salescount from " . table('shop_goods') . " goods order by salescount desc ");
 foreach ($list as $id => $displayorder){
    
    
     $list[$id]['cpersent'] = round(($list[$id]['salescount'] / ($list[$id]['viewcount'] == 0?1:$list[$id]['viewcount'])) * 100, 2);
     if(empty($list[$id]['viewcount']))
        {
         $list[$id]['viewcount'] = 0;
         }
     if(empty($list[$id]['salescount']))
        {
         $list[$id]['salescount'] = 0;
         }
     if(empty($list[$id]['cpersent']))
        {
         $list[$id]['cpersent'] = 0;
         }
     }
 include addons_page('productsalestatistics');
