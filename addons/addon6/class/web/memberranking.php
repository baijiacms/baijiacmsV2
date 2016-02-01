<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: °Ù¼ÒÍşĞÅ <QQ:2752555327> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
 $sortname = $_GP['sortname']?$_GP['sortname']:'ordermoney';
 if(!empty($_GP['start_time']) && !empty($_GP['end_time']))
    {
     $start_time = strtotime($_GP['start_time'] . " 00:00:01");
     $end_time = strtotime($_GP['end_time'] . " 23:59:59");
     }
else
    {
     $start_time = strtotime(date('Y-m-01 00:00:01', time()));
     $end_time = strtotime(date('Y-m-t 23:59:59', time()));
    
     }

 $condition1 = "";
 $condition2 = "";
 if(!empty($start_time) && !empty($end_time) && !empty($_GP['start_time']) && !empty($_GP['end_time']))
    {
    
     $condition1 = " and orders.createtime>=" . $start_time . " and " . "orders.createtime<=" . $end_time;
     $condition2 = " and orders2.createtime>=" . $start_time . " and " . "orders2.createtime<=" . $end_time;
     }
 $list = mysqld_selectall("SELECT member.realname,member.mobile,(" . "SELECT count(orders.id) FROM " . table('shop_order') . " orders where orders.openid=member.openid  " . $condition1 . ") as ordercount,(" . "SELECT sum(cast(orders2.price as decimal(8,2))) FROM " . table('shop_order') . " orders2 where orders2.openid=member.openid " . $condition2 . ") ordermoney FROM " . table('member') . " member where  member.istemplate=0 ORDER BY " . $sortname . "  DESC limit 100");



 if(!empty($_GP['memberrankingEXP01']))
    {
     $report = "memberranking";
    
     require_once 'report.php';
     exit;
     }
 include addons_page('memberranking');