<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 百家威信 <QQ:2752555327> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');
defined('SYSTEM_INSTALL_IN') or exit('Access Denied');
$sql = "
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

-- ----------------------------
-- Table structure for baijiacms_alipay_alifans
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_alipay_alifans`;
CREATE TABLE `baijiacms_alipay_alifans` (
  `createtime` int(10) NOT NULL DEFAULT '0',
  `openid` varchar(50) DEFAULT NULL,
  `alipay_openid` varchar(50) NOT NULL,
  `follow` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否订阅',
  `nickname` varchar(100) NOT NULL DEFAULT '' COMMENT '昵称',
  `avatar` varchar(200) NOT NULL DEFAULT '',
  `gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别(0:保密 1:男 2:女)',
  PRIMARY KEY (`alipay_openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_alipay_alifans
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_alipay_rule
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_alipay_rule`;
CREATE TABLE `baijiacms_alipay_rule` (
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

-- ----------------------------
-- Records of baijiacms_alipay_rule
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_attachment
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_attachment`;
CREATE TABLE `baijiacms_attachment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `filename` varchar(255) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL COMMENT '1为图片',
  `createtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_attachment
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_bonus_good
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_bonus_good`;
CREATE TABLE `baijiacms_bonus_good` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `bonus_type_id` mediumint(8) NOT NULL,
  `good_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_bonus_good
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_bonus_type
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_bonus_type`;
CREATE TABLE `baijiacms_bonus_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(60) NOT NULL DEFAULT '',
  `type_money` decimal(10,2) NOT NULL DEFAULT '0.00',
  `send_type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `min_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `max_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  `send_start_date` int(11) NOT NULL DEFAULT '0',
  `send_end_date` int(11) NOT NULL DEFAULT '0',
  `use_start_date` int(11) NOT NULL DEFAULT '0',
  `use_end_date` int(11) NOT NULL DEFAULT '0',
  `min_goods_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_bonus_type
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_bonus_user
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_bonus_user`;
CREATE TABLE `baijiacms_bonus_user` (
  `bonus_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bonus_type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `bonus_sn` varchar(20) NOT NULL DEFAULT '',
  `openid` varchar(50) NOT NULL DEFAULT '',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `isuse` int(1) NOT NULL DEFAULT '0',
  `used_time` int(10) unsigned NOT NULL DEFAULT '0',
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `collect_time` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) NOT NULL,
  PRIMARY KEY (`bonus_id`),
  KEY `openid` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_bonus_user
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_config
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_config`;
CREATE TABLE `baijiacms_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(100) NOT NULL COMMENT '配置名称',
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_config
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_dispatch
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_dispatch`;
CREATE TABLE `baijiacms_dispatch` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(120) NOT NULL DEFAULT '',
  `sendtype` int(5) NOT NULL DEFAULT '1' COMMENT '0为快递，1为自提',
  `desc` text NOT NULL,
  `configs` text NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_dispatch
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_gold_order
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_gold_order`;
CREATE TABLE `baijiacms_gold_order` (
  `createtime` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `paytime` int(10) DEFAULT '0' COMMENT '支付时间',
  `price` decimal(10,2) NOT NULL,
  `openid` varchar(40) NOT NULL,
  `ordersn` varchar(20) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_gold_order
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_gold_teller
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_gold_teller`;
CREATE TABLE `baijiacms_gold_teller` (
  `createtime` int(10) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '0未审核-1拒绝1审核功成',
  `fee` decimal(10,2) NOT NULL,
  `openid` varchar(40) NOT NULL,
  `ordersn` varchar(20) DEFAULT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_gold_teller
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_member
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_member`;
CREATE TABLE `baijiacms_member` (
  `email` varchar(20) NOT NULL,
  `credit` int(11) NOT NULL DEFAULT '0' COMMENT '积分',
  `gold` double NOT NULL DEFAULT '0' COMMENT '余额',
  `openid` varchar(50) NOT NULL,
  `realname` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `createtime` int(10) NOT NULL,
  `istemplate` tinyint(1) DEFAULT '0' COMMENT '是否为临时账户 1是，0为否',
  `status` tinyint(1) DEFAULT '1' COMMENT '0为禁用，1为可用',
  `experience` int(11) DEFAULT '0' COMMENT '账户经验值',
  `avatar` varchar(200) DEFAULT '' COMMENT '用户头像',
  `outgold` double NOT NULL DEFAULT '0' COMMENT '已提取余额',
  `outgoldinfo` varchar(1000) DEFAULT '0' COMMENT '提款信息 序列化',
  `weixin_openid` varchar(100) DEFAULT '' COMMENT '微信openid',
  `alipay_openid` varchar(50) DEFAULT '' COMMENT '阿里openid',
  PRIMARY KEY (`openid`),
  KEY `idx_member_from_user` (`openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_member
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_member_paylog
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_member_paylog`;
CREATE TABLE `baijiacms_member_paylog` (
  `createtime` int(10) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `openid` varchar(40) NOT NULL,
  `type` varchar(30) NOT NULL COMMENT 'usegold使用金额 addgold充值金额 usecredit使用积分 addcredit充值积分',
  `pid` bigint(20) NOT NULL AUTO_INCREMENT,
  `account_fee` decimal(10,2) NOT NULL COMMENT '账户剩余积分或余额',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_member_paylog
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_modules
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_modules`;
CREATE TABLE `baijiacms_modules` (
  `displayorder` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(30) NOT NULL,
  `group` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `version` decimal(5,2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `isdisable` int(1) DEFAULT '0' COMMENT '模块是否禁用',
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_modules
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_modules_menu
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_modules_menu`;
CREATE TABLE `baijiacms_modules_menu` (
  `href` varchar(200) NOT NULL,
  `title` varchar(50) NOT NULL,
  `module` varchar(30) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_modules_menu
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_paylog
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_paylog`;
CREATE TABLE `baijiacms_paylog` (
  `paytype` varchar(30) NOT NULL,
  `pdate` text NOT NULL,
  `ptype` varchar(10) NOT NULL,
  `typename` varchar(30) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of baijiacms_paylog
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_payment
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_payment`;
CREATE TABLE `baijiacms_payment` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(120) NOT NULL DEFAULT '',
  `desc` text NOT NULL,
  `order` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `configs` text NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `iscod` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `online` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pay_code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_payment
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_qq_qqfans
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_qq_qqfans`;
CREATE TABLE `baijiacms_qq_qqfans` (
  `createtime` int(10) NOT NULL DEFAULT '0',
  `openid` varchar(50) DEFAULT NULL,
  `qq_openid` varchar(50) NOT NULL,
  `nickname` varchar(100) NOT NULL DEFAULT '' COMMENT '昵称',
  `avatar` varchar(200) NOT NULL DEFAULT '',
  `gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别(0:保密 1:男 2:女)',
  PRIMARY KEY (`qq_openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_qq_qqfans
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_rank_model
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_rank_model`;
CREATE TABLE `baijiacms_rank_model` (
  `experience` int(11) DEFAULT '0',
  `rank_level` int(3) NOT NULL DEFAULT '0' COMMENT '等级',
  `rank_name` varchar(50) DEFAULT NULL COMMENT '等级名称',
  PRIMARY KEY (`rank_level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_rank_model
-- ----------------------------
INSERT INTO `baijiacms_rank_model` VALUES ('0', '1', '普通会员');
-- ----------------------------
-- Table structure for baijiacms_rank_phb
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_rank_phb`;
CREATE TABLE `baijiacms_rank_phb` (
  `rank_level` int(11) DEFAULT '0',
  `rank_name` varchar(50) DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `openid` varchar(50) NOT NULL DEFAULT '',
  `rank_top` int(2) NOT NULL DEFAULT '0' COMMENT '名次',
  PRIMARY KEY (`rank_top`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_rank_phb
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_rule
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_rule`;
CREATE TABLE `baijiacms_rule` (
  `moddescription` varchar(20) NOT NULL,
  `moddo` varchar(20) NOT NULL DEFAULT '',
  `modname` varchar(20) NOT NULL DEFAULT '',
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of baijiacms_rule
-- ----------------------------
INSERT INTO `baijiacms_rule` VALUES ('商品管理', 'goods', 'shop', '1');
INSERT INTO `baijiacms_rule` VALUES ('管理分类', 'category', 'shop', '2');
INSERT INTO `baijiacms_rule` VALUES ('订单管理', 'order', 'shop', '3');
INSERT INTO `baijiacms_rule` VALUES ('批量发货', 'orderbat', 'shop', '4');
INSERT INTO `baijiacms_rule` VALUES ('商城基础设置', 'config', 'shop', '5');
INSERT INTO `baijiacms_rule` VALUES ('首页广告', 'adv', 'shop', '6');
INSERT INTO `baijiacms_rule` VALUES ('模板设置', 'themes', 'shop', '7');
INSERT INTO `baijiacms_rule` VALUES ('支付方式', 'payment', 'modules', '8');
INSERT INTO `baijiacms_rule` VALUES ('快捷登录', 'thirdlogin', 'modules', '9');
INSERT INTO `baijiacms_rule` VALUES ('配送方式', 'dispatch', 'shop', '10');
INSERT INTO `baijiacms_rule` VALUES ('会员管理', 'list', 'member', '11');
INSERT INTO `baijiacms_rule` VALUES ('权限管理', 'user', 'user', '12');
INSERT INTO `baijiacms_rule` VALUES ('云服务', 'update', 'modules', '13');
INSERT INTO `baijiacms_rule` VALUES ('微信设置', 'weixin', 'weixin', '14');
INSERT INTO `baijiacms_rule` VALUES ('支付宝服务窗设置', 'alipay', 'alipay', '15');
INSERT INTO `baijiacms_rule` VALUES ('促销管理', 'bonus', 'bonus', '16');

-- ----------------------------
-- Table structure for baijiacms_shop_address
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_address`;
CREATE TABLE `baijiacms_shop_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL,
  `realname` varchar(20) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `province` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `area` varchar(30) NOT NULL,
  `address` varchar(300) NOT NULL,
  `isdefault` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_address
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_adv
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_adv`;
CREATE TABLE `baijiacms_shop_adv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `displayorder` int(11) DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_enabled` (`enabled`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_adv
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_cart
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_cart`;
CREATE TABLE `baijiacms_shop_cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `goodsid` int(11) NOT NULL,
  `goodstype` tinyint(1) NOT NULL DEFAULT '1',
  `session_id` varchar(50) NOT NULL,
  `total` int(10) unsigned NOT NULL,
  `optionid` int(10) DEFAULT '0',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `idx_openid` (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_cart
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_category
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_category`;
CREATE TABLE `baijiacms_shop_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `commission` int(10) unsigned DEFAULT '0' COMMENT '推荐该类商品所能获得的佣金',
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `thumb` varchar(255) NOT NULL COMMENT '分类图片',
  `thumbadv` varchar(255) NOT NULL COMMENT '分类广告图片',
  `thumbadvurl` varchar(255) NOT NULL COMMENT '分类广告url',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID,0为第一级',
  `isrecommand` int(10) DEFAULT '0',
  `description` varchar(500) NOT NULL COMMENT '分类介绍',
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否开启',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_category
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_dispatch
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_dispatch`;
CREATE TABLE `baijiacms_shop_dispatch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dispatchname` varchar(50) NOT NULL,
  `sendtype` int(5) NOT NULL DEFAULT '1' COMMENT '0为快递，1为自提',
  `firstprice` decimal(10,2) NOT NULL,
  `secondprice` decimal(10,2) NOT NULL,
  `provance` varchar(30) DEFAULT '',
  `city` varchar(30) DEFAULT '',
  `area` varchar(30) DEFAULT '',
  `firstweight` int(10) NOT NULL,
  `secondweight` int(10) NOT NULL,
  `express` varchar(50) NOT NULL,
  `deleted` int(10) NOT NULL DEFAULT '0',
  `displayorder` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_dispatch
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_dispatch_area
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_dispatch_area`;
CREATE TABLE `baijiacms_shop_dispatch_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dispatchid` int(11) NOT NULL,
  `country` varchar(30) NOT NULL,
  `provance` varchar(30) DEFAULT '',
  `city` varchar(30) DEFAULT '',
  `area` varchar(30) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_dispatch_area
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_diymenu
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_diymenu`;
CREATE TABLE `baijiacms_shop_diymenu` (
  `menu_type` varchar(10) NOT NULL,
  `torder` int(2) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `url` varchar(350) NOT NULL,
  `tname` varchar(100) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_diymenu
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_goods
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_goods`;
CREATE TABLE `baijiacms_shop_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pcate` int(10) unsigned NOT NULL DEFAULT '0',
  `ccate` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0为实体，1为虚拟',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `displayorder` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `description` varchar(1000) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `goodssn` varchar(50) NOT NULL DEFAULT '',
  `weight` decimal(10,2) NOT NULL DEFAULT '0.00',
  `productsn` varchar(50) NOT NULL DEFAULT '',
  `marketprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `productprice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` int(10) NOT NULL DEFAULT '0',
  `totalcnf` int(11) DEFAULT '0' COMMENT '0 拍下减库存 1 付款减库存 2 永久不减',
  `sales` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL,
  `credit` int(11) DEFAULT '0',
  `hasoption` int(11) DEFAULT '0',
  `isnew` int(11) DEFAULT '0',
  `issendfree` int(11) DEFAULT NULL,
  `ishot` int(11) DEFAULT '0',
  `isdiscount` int(11) DEFAULT '0',
  `isrecommand` int(11) DEFAULT '0',
  `istime` int(11) DEFAULT '0',
  `timestart` int(11) DEFAULT '0',
  `timeend` int(11) DEFAULT '0',
  `viewcount` int(11) DEFAULT '0',
  `remark` text,
  `deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `isfirst` int(1) DEFAULT '0' COMMENT '首发',
  `isjingping` int(1) DEFAULT '0' COMMENT '精品',
  `isverify` int(1) DEFAULT '0' COMMENT '是否是核销产品0否1是',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_goods
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_goods_comment
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_goods_comment`;
CREATE TABLE `baijiacms_shop_goods_comment` (
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

-- ----------------------------
-- Records of baijiacms_shop_goods_comment
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_goods_option
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_goods_option`;
CREATE TABLE `baijiacms_shop_goods_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goodsid` int(10) DEFAULT '0',
  `title` varchar(50) DEFAULT '',
  `thumb` varchar(60) DEFAULT '',
  `productprice` decimal(10,2) DEFAULT '0.00',
  `marketprice` decimal(10,2) DEFAULT '0.00',
  `costprice` decimal(10,2) DEFAULT '0.00',
  `stock` int(11) DEFAULT '0',
  `weight` decimal(10,2) DEFAULT '0.00',
  `displayorder` int(11) DEFAULT '0',
  `specs` text,
  PRIMARY KEY (`id`),
  KEY `indx_goodsid` (`goodsid`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_goods_option
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_goods_piclist
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_goods_piclist`;
CREATE TABLE `baijiacms_shop_goods_piclist` (
  `picurl` varchar(255) NOT NULL,
  `goodid` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_goods_piclist
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_goods_spec
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_goods_spec`;
CREATE TABLE `baijiacms_shop_goods_spec` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `displaytype` tinyint(3) unsigned NOT NULL,
  `content` text NOT NULL,
  `goodsid` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_goods_spec
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_goods_spec_item
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_goods_spec_item`;
CREATE TABLE `baijiacms_shop_goods_spec_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specid` int(11) DEFAULT '0',
  `title` varchar(255) DEFAULT '',
  `thumb` varchar(255) DEFAULT '',
  `show` int(11) DEFAULT '0',
  `displayorder` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `indx_specid` (`specid`),
  KEY `indx_show` (`show`),
  KEY `indx_displayorder` (`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_goods_spec_item
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_order
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_order`;
CREATE TABLE `baijiacms_shop_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `openid` varchar(50) NOT NULL,
  `ordersn` varchar(20) NOT NULL,
  `credit` int(10) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '-6已退款 -5已退货 -4退货中， -3换货中， -2退款中，-1取消状态，0普通状态，1为已付款，2为已发货，3为成功',
  `sendtype` tinyint(1) unsigned NOT NULL COMMENT '0为快递，1为自提',
  `paytype` tinyint(1) NOT NULL COMMENT '1为余额，2为在线，3为到付',
  `paytypecode` varchar(30) NOT NULL COMMENT '0货到付款，1微支付，2支付宝付款，3余额支付，4积分支付',
  `paytypename` varchar(50) NOT NULL,
  `transid` varchar(50) NOT NULL DEFAULT '0' COMMENT '外部单号(微支付单号等)',
  `remark` varchar(1000) NOT NULL DEFAULT '',
  `expresscom` varchar(30) NOT NULL,
  `expresssn` varchar(50) NOT NULL,
  `express` varchar(30) NOT NULL,
  `addressid` int(10) unsigned NOT NULL,
  `goodsprice` decimal(10,2) DEFAULT '0.00',
  `dispatchprice` decimal(10,2) DEFAULT '0.00',
  `dispatchexpress` varchar(50) DEFAULT '',
  `dispatch` int(10) DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL,
  `address_address` varchar(100) NOT NULL,
  `address_area` varchar(10) NOT NULL,
  `address_city` varchar(10) NOT NULL,
  `address_province` varchar(10) NOT NULL,
  `address_realname` varchar(10) NOT NULL,
  `address_mobile` varchar(20) NOT NULL,
  `rsreson` varchar(500) DEFAULT '' COMMENT '退货款退原因',
  `isrest` int(1) NOT NULL DEFAULT '0',
  `paytime` int(10) DEFAULT '0' COMMENT '订单支付时间',
  `updatetime` int(10) DEFAULT '0' COMMENT '订单更新时间',
  `hasbonus` int(1) DEFAULT '0' COMMENT '是否使用优惠券',
  `bonusprice` decimal(10,2) DEFAULT '0.00' COMMENT '优惠券抵消金额',
  `isverify` int(1) DEFAULT '0' COMMENT '是否是核销订单0否1是',
  `verify_shopvname` varchar(50) DEFAULT '' COMMENT '核销门店名称',
  `verify_shopvid` int(10) DEFAULT '0' COMMENT '核销门店id',
  `verify_openid` varchar(50) DEFAULT '' COMMENT '核销员openid',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_order
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_order_goods
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_order_goods`;
CREATE TABLE `baijiacms_shop_order_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` int(10) unsigned NOT NULL,
  `goodsid` int(10) unsigned NOT NULL,
  `status` tinyint(3) DEFAULT '0' COMMENT '申请状态，-2为标志删除，-1为审核无效，0为未申请，1为正在申请，2为审核通过',
  `content` text,
  `price` decimal(10,2) DEFAULT '0.00',
  `total` int(10) unsigned NOT NULL DEFAULT '1',
  `optionid` int(10) DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL,
  `optionname` text,
  `iscomment` int(1) DEFAULT '0' COMMENT '是否已评论0否1是',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_order_goods
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_order_paylog
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_order_paylog`;
CREATE TABLE `baijiacms_shop_order_paylog` (
  `createtime` int(10) NOT NULL,
  `orderid` int(10) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `openid` varchar(40) NOT NULL,
  `pid` bigint(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_order_paylog
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_shop_pormotions
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_shop_pormotions`;
CREATE TABLE `baijiacms_shop_pormotions` (
  `description` varchar(200) DEFAULT NULL COMMENT '描述(预留)',
  `endtime` int(10) NOT NULL COMMENT '束结时间',
  `starttime` int(10) NOT NULL COMMENT '开始时间',
  `condition` decimal(10,2) NOT NULL COMMENT '条件',
  `promoteType` int(11) NOT NULL COMMENT '0 按订单数包邮 1满额包邮',
  `pname` varchar(100) NOT NULL COMMENT '名称',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_shop_pormotions
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_thirdlogin
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_thirdlogin`;
CREATE TABLE `baijiacms_thirdlogin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(120) NOT NULL DEFAULT '',
  `desc` text NOT NULL,
  `configs` text NOT NULL,
  `enabled` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pay_code` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_thirdlogin
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_user
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_user`;
CREATE TABLE `baijiacms_user` (
  `createtime` int(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_user
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_user_rule
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_user_rule`;
CREATE TABLE `baijiacms_user_rule` (
  `moddo` varchar(15) NOT NULL,
  `modname` varchar(15) NOT NULL,
  `uid` int(10) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of baijiacms_user_rule
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_weixin_rule
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_weixin_rule`;
CREATE TABLE `baijiacms_weixin_rule` (
  `url` varchar(500) NOT NULL,
  `thumb` varchar(60) NOT NULL,
  `keywords` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ruletype` int(11) NOT NULL COMMENT '1文本回复 2图文回复',
   `addonsrule` int(1) NOT NULL  DEFAULT '0' COMMENT '0常规，1模块规则',
   `addonsModule` varchar(50) DEFAULT '' COMMENT '所属模块',
  `content` text,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_weixin_rule
-- ----------------------------

-- ----------------------------
-- Table structure for baijiacms_weixin_wxfans
-- ----------------------------
DROP TABLE IF EXISTS `baijiacms_weixin_wxfans`;
CREATE TABLE `baijiacms_weixin_wxfans` (
  `createtime` int(10) NOT NULL DEFAULT '0',
  `openid` varchar(50) DEFAULT NULL,
  `weixin_openid` varchar(100) NOT NULL,
  `follow` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否订阅',
  `nickname` varchar(100) NOT NULL DEFAULT '' COMMENT '昵称',
  `avatar` varchar(200) NOT NULL DEFAULT '',
  `gender` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别(0:保密 1:男 2:女)',
  `longitude` decimal(10,2) DEFAULT '0' COMMENT '地理位置经度',
  `latitude` decimal(10,2) DEFAULT '0' COMMENT '地理位置纬度',
  `precision` decimal(10,2) DEFAULT '0' COMMENT '地理位置精度',
  PRIMARY KEY (`weixin_openid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of baijiacms_weixin_wxfans
-- ----------------------------

";

mysqld_batch($sql);
if(CUSTOM_VERSION==true&&is_file(CUSTOM_ROOT.'/public/class/web/installsql.php'))
{
	require CUSTOM_ROOT.'/public/class/web/installsql.php';
}
define('LOCK_TO_UPDATE', true);
require WEB_ROOT.'/system/modules/updatesql.php';
define('LOCK_TO_ADDONS_INSTALL', true);
if(is_file(ADDONS_ROOT.'addon6/installsql.php'))
{
require ADDONS_ROOT.'addon6/installsql.php';
}
if(is_file(ADDONS_ROOT.'addon7/installsql.php'))
{
require ADDONS_ROOT.'addon7/installsql.php';
}
if(is_file(ADDONS_ROOT.'addon8/installsql.php'))
{
require ADDONS_ROOT.'addon8/installsql.php';
}
if(is_file(ADDONS_ROOT.'addon9/installsql.php'))
{
require ADDONS_ROOT.'addon9/installsql.php';
}