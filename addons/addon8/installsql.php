<?php
//article addon8
defined('SYSTEM_IN') or exit('Access Denied');
defined('LOCK_TO_ADDONS_INSTALL') or exit('Access Denied');
$sql = "
CREATE TABLE IF NOT EXISTS `baijiacms_addon8_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iscommend` tinyint(1) NOT NULL DEFAULT '0',
  `ishot` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pcate` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '一级分类',
  `ccate` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '二级分类',
  `mobileTheme` int(10) NOT NULL DEFAULT '0'COMMENT '内容模板',
  `title` varchar(100) NOT NULL DEFAULT '',
  `readcount` int(10) NOT NULL DEFAULT '0' COMMENT '阅读次数',
  `description` varchar(200) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `thumb` varchar(200) NOT NULL DEFAULT '' COMMENT '缩略图',
  `displayorder` int(10) unsigned NOT NULL DEFAULT '0',
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_iscommend` (`iscommend`),
  KEY `idx_ishot` (`ishot`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `baijiacms_addon8_article_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '分类名称',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID,0为第一级',
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `deleted` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否删除',
  `icon` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

delete from `baijiacms_modules` where `name`='addon8';
delete from `baijiacms_modules_menu` where `module`='addon8';
INSERT INTO `baijiacms_modules` (`icon`,`group`,`title`,`version`,`name`) VALUES ('icon-edit', 'addons', '微文章', '1.0', 'addon8');
INSERT INTO `baijiacms_modules_menu`(`href`,`title`,`module`) VALUES ('index.php?mod=site&name=addon8&do=article', '文章管理', 'addon8');
INSERT INTO `baijiacms_modules_menu`(`href`,`title`,`module`) VALUES ('index.php?mod=site&name=addon8&do=category', '文章分类', 'addon8');
";

mysqld_batch($sql);