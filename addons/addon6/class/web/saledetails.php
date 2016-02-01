<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: °Ù¼ÒÍşĞÅ <QQ:2752555327> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
 $condition = "";
 $pindex = max(1, intval($_GP['page']));
 $psize = 20;
 if(!empty($_GP['start_time']) && !empty($_GP['end_time']))
    {
     $start_time = strtotime($_GP['start_time'] . " 00:00:01");
     $end_time = strtotime($_GP['end_time'] . " 23:59:59");
    
     }else
    {
     $start_time = strtotime(date('Y-m-01 00:00:01', time()));
     $end_time = strtotime(date('Y-m-t 23:59:59', time()));
    
     }
 $condition = " and orders.createtime>=" . $start_time . " and orders.createtime<=" . $end_time;

 if(!empty($_GP['saledetailsEXP01']))
    {
    
     $psize = 9999;
     $pindex = 1;
     }
 $list = mysqld_selectall("SELECT ordergoods.price,ordergoods.total,(select title from " . table('shop_goods') . " goods where ordergoods.goodsid=goods.id) titles,orders.createtime,orders.ordersn from  " . table('shop_order_goods') . " ordergoods left join " . table('shop_order') . " orders  on orders.id=ordergoods.orderid where 1=1 $condition order by orders.createtime  desc  LIMIT " . ($pindex - 1) * $psize . ',' . $psize);
 $total = mysqld_selectcolumn("SELECT count(ordergoods.id) from  " . table('shop_order_goods') . " ordergoods left join " . table('shop_order') . " orders  on orders.id=ordergoods.orderid where 1=1 $condition order by orders.createtime desc");
 $pager = pagination($total, $pindex, $psize);

 if(!empty($_GP['saledetailsEXP01']))
    {
     $report = "saledetails";
    
     require_once 'report.php';
     exit;
     }
 include addons_page('saledetails');