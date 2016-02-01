<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 百家威信 <QQ:2752555327> <http://www.baijiacms.com>
// +----------------------------------------------------------------------

//订单总金额
$allorderprice = mysqld_selectcolumn("SELECT sum(cast(price as decimal(8,2))) FROM " . table('shop_order') . " WHERE status=3  ");
//总订单数
$allordercount = mysqld_selectcolumn("SELECT count(id) FROM " . table('shop_order') . " WHERE status=3  ");
//总会员数
$allmembercount = mysqld_selectcolumn("SELECT count(*) FROM " . table('member')." where istemplate=0");
//总访问次数
$allorderviewcount = mysqld_selectcolumn("SELECT sum(cast(viewcount as decimal(8,0))) FROM " . table('shop_goods') );
//有过订单的会员
$haveordermembercount = mysqld_selectcolumn("select count(os.openid) from (SELECT orders.openid FROM " . table('shop_order') . " orders  group by orders.openid) as os");
if(empty($allorderprice))
{
		$allorderprice=0;
}


include addons_page('saletargets');