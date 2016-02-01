<?php
//article addon8
defined('SYSTEM_IN') or exit('Access Denied');
defined('LOCK_TO_ADDONS_INSTALL') or exit('Access Denied');
$sql = "
CREATE TABLE IF NOT EXISTS `baijiacms_addon9_singlepage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `open_footer` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `createtime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


delete from `baijiacms_modules` where `name`='addon9';
delete from `baijiacms_modules_menu` where `module`='addon9';
INSERT INTO `baijiacms_modules` (`icon`,`group`,`title`,`version`,`name`) VALUES ('icon-list-alt', 'addons', '微单页', '1.0', 'addon9');
INSERT INTO `baijiacms_modules_menu`(`href`,`title`,`module`) VALUES ('index.php?mod=site&name=addon9&do=singlepage', '单页设置', 'addon9');
";

mysqld_batch($sql);