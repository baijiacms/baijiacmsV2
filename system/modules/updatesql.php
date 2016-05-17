<?php defined('SYSTEM_IN') or exit('Access Denied');defined('LOCK_TO_UPDATE') or exit('Access Denied');
$sql ="";
$weixin_rule = mysqld_select("SELECT * FROM " . table('rule') . " WHERE `modname`='weixin' and `moddo`='weixin' ");
if(empty($weixin_rule['modname']))
{
	$sql =$sql."
	delete from `baijiacms_rule` where `modname`='weixin' and `moddo`='weixin';
insert into `baijiacms_rule` (`moddescription`,`modname`,`moddo`)value('微信设置','weixin','weixin');
	";
		$user_list = mysqld_selectall("SELECT * FROM " . table('user') );
	foreach ($user_list as &$_tuser) {
		mysqld_delete('user_rule',array('uid'=>$_tuser['id'],'modname'=>'weixin','moddo'=>'weixin'));
		mysqld_insert('user_rule',array('uid'=>$_tuser['id'],'modname'=>'weixin','moddo'=>'weixin'));
	}
}
$alipay_rule = mysqld_select("SELECT * FROM " . table('rule') . " WHERE `modname`='alipay' and `moddo`='alipay' ");
if(empty($alipay_rule['modname']))
{
	$sql =$sql."
	delete from `baijiacms_rule` where `modname`='alipay' and `moddo`='alipay';
	insert into `baijiacms_rule` (`moddescription`,`modname`,`moddo`)value('支付宝服务窗设置', 'alipay', 'alipay');
	";
		$user_list = mysqld_selectall("SELECT * FROM " . table('user') );
	foreach ($user_list as &$_tuser) {
		mysqld_delete('user_rule',array('uid'=>$_tuser['id'],'modname'=>'alipay','moddo'=>'alipay'));
		mysqld_insert('user_rule',array('uid'=>$_tuser['id'],'modname'=>'alipay','moddo'=>'alipay'));
	}
}


$bonus_rule = mysqld_select("SELECT * FROM " . table('rule') . " WHERE `modname`='bonus' and `moddo`='bonus' ");
if(empty($bonus_rule['modname']))
{
	$sql =$sql."
	delete from `baijiacms_rule` where `modname`='bonus' and `moddo`='bonus';
insert into `baijiacms_rule` (`moddescription`,`modname`,`moddo`)value('促销管理','bonus','bonus');
	";
	$user_list = mysqld_selectall("SELECT * FROM " . table('user') );
	foreach ($user_list as &$_tuser) {
		mysqld_delete('user_rule',array('uid'=>$_tuser['id'],'modname'=>'bonus','moddo'=>'bonus'));
		mysqld_insert('user_rule',array('uid'=>$_tuser['id'],'modname'=>'bonus','moddo'=>'bonus'));
	}
}

$sql = $sql."
update `baijiacms_shop_order` set paytype=1 where paytypecode='gold';
update `baijiacms_shop_order` set paytype=3 where paytypecode='delivery';
update `baijiacms_shop_order` set paytype=2 where paytypecode='weixin';
update `baijiacms_shop_order` set paytype=2 where paytypecode='alipay';
update `baijiacms_shop_order` set paytype=2 where paytypecode='bank';

CREATE TABLE IF NOT EXISTS `baijiacms_system_rule` (
  `modname` varchar(15) DEFAULT NULL,
  `moddo` varchar(15) DEFAULT NULL,
  `rule_name` varchar(100) DEFAULT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `baijiacms_user_group` (
  `createtime` int(10) NOT NULL,
  `groupName` varchar(100) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_user_group
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_user_group_rule
-- ----------------------------
CREATE TABLE IF NOT EXISTS `baijiacms_user_group_rule` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `gid` int(10) NOT NULL,
  `modname` varchar(15) NOT NULL,
  `rule_name` varchar(100) DEFAULT NULL,
  `moddo` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS  `baijiacms_sms_cache` (
  `createtime` int(10) NOT NULL,
  `checkcount` int(3) NOT NULL,
  `smstype` varchar(50) DEFAULT NULL,
  `tell` varchar(50) DEFAULT NULL,
  `vcode` varchar(50) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS  `baijiacms_paylog_alipay` (
  `createtime` int(10) NOT NULL,
  `alipay_safepid` varchar(50) DEFAULT NULL,
  `buyer_email` varchar(50) DEFAULT NULL,
   `buyer_id` varchar(50) DEFAULT NULL,
   `out_trade_no` varchar(50) DEFAULT NULL,
    `seller_email` varchar(50) DEFAULT NULL,
     `seller_id` varchar(50) DEFAULT NULL,
  `total_fee` decimal(10,2) DEFAULT NULL COMMENT '交易金额',
   `trade_no` varchar(50) DEFAULT NULL,
    `body` varchar(200) DEFAULT NULL,
  `orderid` int(10) DEFAULT NULL,
  `ordersn` varchar(50) DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `presult` varchar(50) DEFAULT NULL COMMENT 'success 或error',
  `order_table` varchar(50) DEFAULT NULL COMMENT '订单类型 shop_order gold_order',
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS  `baijiacms_paylog_unionpay` (
  `createtime` int(10) NOT NULL,
  `txnTime` int(10) DEFAULT NULL,
  `txnAmt` decimal(10,2) DEFAULT NULL COMMENT '交易金额',
  `queryid` varchar(50) DEFAULT NULL COMMENT '交易查询流水号',
  `currencyCode` varchar(10) DEFAULT NULL COMMENT '交易币种',
  `reqReserved` varchar(100) DEFAULT NULL COMMENT '请求保留域',
   `settleAmt` decimal(10,2) DEFAULT NULL COMMENT '清算金额',
  `settleCurrencyCode` varchar(10) DEFAULT NULL COMMENT '清算币种',
  `traceTime` int(10) DEFAULT NULL COMMENT '交易传输时间',
  `traceNo` varchar(50) DEFAULT NULL COMMENT '系统跟踪号',
  `merId` varchar(50) DEFAULT NULL COMMENT '商户代码',
  `orderid` int(10) DEFAULT NULL,
  `ordersn` varchar(50) DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `presult` varchar(50) DEFAULT NULL COMMENT 'success 或error',
  `order_table` varchar(50) DEFAULT NULL COMMENT '订单类型 shop_order gold_order',
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS  `baijiacms_paylog_weixin` (
  `createtime` int(10) NOT NULL,
  `timeend` int(10) DEFAULT NULL,
  `total_fee` decimal(10,2) DEFAULT NULL COMMENT '交易金额',
  `mchId` varchar(50) DEFAULT NULL COMMENT '商户id',
  `openid` varchar(50) DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `out_trade_no` varchar(50) DEFAULT NULL,
  `orderid` int(10) DEFAULT NULL,
  `ordersn` varchar(50) DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `presult` varchar(50) DEFAULT NULL COMMENT 'success 或error',
  `order_table` varchar(50) DEFAULT NULL COMMENT '订单类型 shop_order gold_order',
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS  `baijiacms_shop_goods_comment` (
  `createtime` int(10) NOT NULL,
  `optionname` varchar(100) DEFAULT NULL,
  `orderid` int(10) DEFAULT NULL,
  `ordersn` varchar(20) DEFAULT NULL,
  `openid` varchar(50) DEFAULT NULL,
  `comment` text,
  `rate` int(1) DEFAULT '0' COMMENT '0差评 1中评 2好评',
  `goodsid` int(10) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS  `baijiacms_shop_pormotions` (
  `description` varchar(200) DEFAULT NULL COMMENT '描述(预留)',
  `endtime` int(10) NOT NULL COMMENT '束结时间',
  `starttime` int(10) NOT NULL COMMENT '开始时间',
  `condition` decimal(10,2) NOT NULL COMMENT '条件',
  `promoteType` int(11) NOT NULL COMMENT '0 按订单数包邮 1满额包邮',
  `pname` varchar(100) NOT NULL COMMENT '名称',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS  `baijiacms_gold_teller` (
  `createtime` int(10) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '0未审核-1拒绝1审核功成',
  `fee` decimal(10,2) NOT NULL,
  `openid` varchar(40) NOT NULL,
  `ordersn` varchar(20) DEFAULT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `baijiacms_gold_order` (
  `createtime` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL,
  `openid` varchar(40) NOT NULL,
 	`ordersn` varchar(20) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `baijiacms_shop_diymenu` (
  `menu_type` varchar(10) NOT NULL,
  `torder` int(2) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `url` varchar(350) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `baijiacms_rank_model` (
  `experience` int(11) DEFAULT '0',
  `rank_level` int(3) DEFAULT  '0' COMMENT '等级',
  `rank_name` varchar(50) DEFAULT NULL  COMMENT '等级名称',
  PRIMARY KEY (`rank_level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `baijiacms_rank_phb` (
	`rank_level` int(11) DEFAULT '0',
  `rank_name` varchar(50) DEFAULT '',
  `realname` varchar(50) DEFAULT '' NOT NULL,
  `openid` varchar(50) DEFAULT '' NOT NULL,
  `rank_top` int(2) DEFAULT '0' COMMENT '名次',
  PRIMARY KEY (`rank_top`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `baijiacms_bonus_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(60) NOT NULL DEFAULT '',
  `type_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `send_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted` int(1)  NOT NULL DEFAULT '0',
  `min_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `max_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `send_start_date` int(11) NOT NULL DEFAULT '0',
  `send_end_date` int(11) NOT NULL DEFAULT '0',
  `use_start_date` int(11) NOT NULL DEFAULT '0',
  `use_end_date` int(11) NOT NULL DEFAULT '0',
  `min_goods_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `baijiacms_bonus_user` (
  `bonus_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bonus_type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `bonus_sn` varchar(20) DEFAULT '' NOT NULL,
  `openid` varchar(50) DEFAULT '' NOT NULL,
  `deleted` int(1)  NOT NULL DEFAULT '0',
  `isuse` int(1)  NOT NULL DEFAULT '0',
  `used_time` int(10) unsigned NOT NULL DEFAULT '0',
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `collect_time` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`bonus_id`),
  KEY `openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `baijiacms_bonus_good` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `bonus_type_id` mediumint(8) NOT NULL ,
  `good_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `baijiacms_alipay_rule` (
  `url` varchar(500) NOT NULL,
  `thumb` varchar(60) NOT NULL,
  `keywords` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ruletype` int(11) NOT NULL COMMENT '1文本回复 2图文回复',
  `content` text,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `baijiacms_alipay_alifans` (
  `createtime` int(10) NOT NULL DEFAULT '0',
  `openid` varchar(50) DEFAULT NULL,
  `alipay_openid` varchar(50) NOT NULL,
  `follow` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否订阅',
  `nickname` varchar(100) NOT NULL DEFAULT '' COMMENT '昵称',
  `avatar` varchar(200) NOT NULL DEFAULT '',
  `gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别(0:保密 1:男 2:女)',
  PRIMARY KEY (`alipay_openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `baijiacms_shop_dispatch_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dispatchid` int(11) NOT NULL,
  `country` varchar(30) NOT NULL,
  `provance` varchar(30) DEFAULT '',
  `city` varchar(30) DEFAULT '',
  `area` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `baijiacms_dispatch` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(120) NOT NULL DEFAULT '',
  `sendtype` int(5) NOT NULL DEFAULT '1' COMMENT '0为快递，1为自提',
  `desc` text NOT NULL,
  `configs` text NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
if(!mysqld_fieldexists('user', 'is_admin')) {
	$sql=$sql."delete from  ".table('user_rule')." ;";
	$sql=$sql."ALTER TABLE ".table('user')." ADD COLUMN `is_admin` int(1) NOT NULL DEFAULT '0' COMMENT '1管理员0用户';";
	$sql=$sql."update ".table('user')." set `is_admin`=1;";
}
if(!mysqld_fieldexists('user_rule', 'rule_name')) {
	$sql=$sql."delete from  ".table('user_rule')." ;";
	$sql=$sql."ALTER TABLE ".table('user_rule')." ADD COLUMN `rule_name` varchar(100) DEFAULT NULL COMMENT '1管理员0用户';";
}
if(!mysqld_fieldexists('user', 'groupName')) {
	$sql=$sql."ALTER TABLE ".table('user')." ADD COLUMN  `groupName` varchar(100) NOT NULL DEFAULT '' COMMENT '用户组名称';";
}
if(!mysqld_fieldexists('user', 'groupid')) {
	$sql=$sql."ALTER TABLE ".table('user')." ADD COLUMN `groupid` int(10) NOT NULL DEFAULT '0' COMMENT '用户组id';";
}
if(!mysqld_fieldexists('weixin_wxfans', 'longitude')) {
	$sql=$sql."ALTER TABLE ".table('weixin_wxfans')." ADD COLUMN `longitude` decimal(10,2) DEFAULT '0' COMMENT '地理位置经度';";
}
if(!mysqld_fieldexists('weixin_wxfans', 'latitude')) {
	$sql=$sql."ALTER TABLE ".table('weixin_wxfans')." ADD COLUMN `latitude` decimal(10,2) DEFAULT '0' COMMENT '地理位置纬度';";
}
if(!mysqld_fieldexists('weixin_wxfans', 'precision')) {
	$sql=$sql."ALTER TABLE ".table('weixin_wxfans')." ADD COLUMN `precision` decimal(10,2) DEFAULT '0' COMMENT '地理位置精度';";
}
if(!mysqld_fieldexists('weixin_rule', 'addonsrule')) {
	$sql=$sql."ALTER TABLE ".table('weixin_rule')." ADD COLUMN `addonsrule` int(1) NOT NULL  DEFAULT '0' COMMENT '0常规，1模块规则';";
}
if(!mysqld_fieldexists('weixin_rule', 'addonsModule')) {
	$sql=$sql."ALTER TABLE ".table('weixin_rule')." ADD COLUMN `addonsModule` varchar(50) DEFAULT '' COMMENT '所属模块';";
}

if(!mysqld_fieldexists('modules', 'isdisable')) {
	$sql=$sql."ALTER TABLE ".table('modules')." ADD COLUMN `isdisable` int(1) DEFAULT '0' COMMENT '模块是否禁用';";
}
if(!mysqld_fieldexists('member', 'avatar')) {
	$sql=$sql."ALTER TABLE ".table('member')." ADD COLUMN `avatar` varchar(200) DEFAULT '' COMMENT '用户头像';";
}
if(!mysqld_fieldexists('member', 'weixin_openid')) {
	$sql=$sql."ALTER TABLE ".table('member')." ADD COLUMN `weixin_openid` varchar(100) DEFAULT '' COMMENT '微信openid';";
}
if(!mysqld_fieldexists('member', 'alipay_openid')) {
	$sql=$sql."ALTER TABLE ".table('member')." ADD COLUMN `alipay_openid` varchar(50) DEFAULT '' COMMENT '阿里openid';";
}
if(!mysqld_fieldexists('member', 'experience')) {
	$sql=$sql."ALTER TABLE ".table('member')." ADD COLUMN `experience` int(11) DEFAULT '0' COMMENT '账户经验值';";
	$sql = $sql."update ".table('member')." set experience=credit;";
}
if(!mysqld_fieldexists('shop_category', 'thumbadv')) {
	$sql=$sql."ALTER TABLE ".table('shop_category')." ADD COLUMN `thumbadv` varchar(255) NOT NULL COMMENT '分类广告图片';";
}
if(!mysqld_fieldexists('shop_category', 'thumbadvurl')) {
	$sql=$sql."ALTER TABLE ".table('shop_category')." ADD COLUMN `thumbadvurl` varchar(255) NOT NULL COMMENT '分类广告url';";
}
if(!mysqld_fieldexists('shop_goods', 'isfirst')) {
	$sql=$sql."ALTER TABLE ".table('shop_goods')." ADD COLUMN `isfirst` int(1) DEFAULT '0' COMMENT '首发';";
}

if(!mysqld_fieldexists('shop_goods', 'isjingping')) {
	$sql=$sql."ALTER TABLE ".table('shop_goods')." ADD COLUMN `isjingping` int(1) DEFAULT '0' COMMENT '精品';";
}
if(!mysqld_fieldexists('shop_order', 'paytime')) {
	$sql=$sql."ALTER TABLE ".table('shop_order')." ADD COLUMN `paytime` int(10) DEFAULT '0' COMMENT '支付时间';";
}
if(!mysqld_fieldexists('gold_order', 'paytime')) {
	$sql=$sql."ALTER TABLE ".table('gold_order')." ADD COLUMN `paytime` int(10) DEFAULT '0' COMMENT '支付时间';";
}
if(!mysqld_fieldexists('shop_order', 'hasbonus')) {
	$sql=$sql."ALTER TABLE ".table('shop_order')." ADD COLUMN `hasbonus` int(1) DEFAULT '0' COMMENT '是否使用优惠券';";
}
if(!mysqld_fieldexists('shop_order', 'bonusprice')) {
	$sql=$sql."ALTER TABLE ".table('shop_order')." ADD COLUMN `bonusprice` decimal(10,2) DEFAULT '0.00' COMMENT '优惠券抵消金额';";
}
if(!mysqld_fieldexists('member_paylog', 'account_fee')) {
	$sql=$sql."ALTER TABLE ".table('member_paylog')." ADD COLUMN `account_fee` decimal(10,2) NOT NULL COMMENT '账户剩余积分或余额';";
}

if(!mysqld_fieldexists('member_paylog', 'account_fee')) {
	$sql=$sql."ALTER TABLE ".table('member_paylog')." ADD COLUMN `account_fee` decimal(10,2) NOT NULL COMMENT '账户剩余积分或余额';";
}

if(!mysqld_fieldexists('shop_order_goods', 'iscomment')) {
	$sql=$sql."ALTER TABLE ".table('shop_order_goods')." ADD COLUMN `iscomment` int(1) DEFAULT '0' COMMENT '是否已评论0否1是';";
}

if(!mysqld_fieldexists('member', 'outgold')) {
	$sql=$sql."ALTER TABLE ".table('member')." ADD COLUMN `outgold` double NOT NULL DEFAULT '0' COMMENT '已提取余额';";
}
if(!mysqld_fieldexists('member', 'outgoldinfo')) {
	$sql=$sql."ALTER TABLE ".table('member')." ADD COLUMN `outgoldinfo` varchar(1000) DEFAULT '0' COMMENT '提款信息 序列化';";
}
if(!mysqld_fieldexists('shop_order', 'isverify')) {
	$sql=$sql."ALTER TABLE ".table('shop_order')." ADD COLUMN `isverify` int(1) DEFAULT '0' COMMENT '是否是核销订单0否1是';";
}
if(!mysqld_fieldexists('shop_order', 'verify_shopvname')) {
	$sql=$sql."ALTER TABLE ".table('shop_order')." ADD COLUMN `verify_shopvname` varchar(50) DEFAULT '' COMMENT '核销门店名称';";
}
if(!mysqld_fieldexists('shop_order', 'verify_shopvid')) {
	$sql=$sql."ALTER TABLE ".table('shop_order')." ADD COLUMN `verify_shopvid` int(10) DEFAULT '0' COMMENT '核销门店id';";
}
if(!mysqld_fieldexists('shop_order', 'verify_openid')) {
	$sql=$sql."ALTER TABLE ".table('shop_order')." ADD COLUMN `verify_openid` varchar(50) DEFAULT '' COMMENT '核销员openid';";
}
if(!mysqld_fieldexists('shop_goods', 'isverify')) {
	$sql=$sql."ALTER TABLE ".table('shop_goods')." ADD COLUMN `isverify` int(1) DEFAULT '0' COMMENT '是否是核销产品0否1是';";
}

if(true)
{
	$sql=$sql."delete from ".table('system_rule').";";
	$sql=$sql."
	
	
	 
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('member', 'list', '会员管理');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('member', 'rank', '会员等级');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('member', 'outchargegold', '余额提现审核');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('shop', 'goods', '商品管理');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('shop', 'category', '商品分类管理');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('shop', 'order', '订单管理');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('shop', 'orderbat', '批量发货');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('shop', 'goods_comment', '评论管理');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('bonus', 'bonus', '优惠券管理');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('promotion', 'promotion', '促销免运费');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('shopwap', 'ALL', '商城模板');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('shop', 'adv', '商城首页广告设置');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('bj_tbk', 'setting', '分销模块-基础设置');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('bj_tbk', 'agent', '分销模块-代理管理');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('bj_tbk', 'commission', '分销模块-佣金审核');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('bj_tbk', 'tmessage', '分销模块-消息处理');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('bj_tbk', 'spread', '分销模块-海报管理');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('bj_tbk', 'phbmedal', '分销模块-粉丝排行头衔管理');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('shop', 'config', '商城基础设置');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('shop', 'noticemail', '新订单邮件提现');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('sms', 'setting', '短信设置');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('modules', 'payment', '支付方式设置');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('modules', 'thirdlogin', '快捷登陆设置');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('modules', 'dispatch', '配送方式设置');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('weixin', 'ALL', '微信设置');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`) VALUES ('alipay', 'ALL', '支付宝服务窗');
INSERT INTO `baijiacms_system_rule` (`modname`, `moddo`,`rule_name`)  VALUES ('user', 'ALL', '用户管理'); ";
	
}

mysqld_batch($sql); 

if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/modules/updatesql.php'))
{
	require CUSTOM_ROOT.'/modules/updatesql.php';
}

clear_theme_cache();
