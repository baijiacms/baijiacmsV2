<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 百家威信 <QQ:2752555327> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');
require(WEB_ROOT.'/system/common/lib/lib_core.php');
require(WEB_ROOT.'/system/common/lib/lib_weixin.php');
require(WEB_ROOT.'/system/common/lib/lib_alipay.php');
if(is_file(WEB_ROOT.'/system/modules/plugin/thirdlogin/qq/lib_qq.php'))
{
require(WEB_ROOT.'/system/modules/plugin/thirdlogin/qq/lib_qq.php');
}
if(is_file(WEB_ROOT.'/addons/bj_qrcode/lib/lib_bj_qrcode.php'))
{

require(WEB_ROOT.'/addons/bj_qrcode/lib/lib_bj_qrcode.php');
	$addons_bj_qrcode = mysqld_select("SELECT * FROM " . table('modules') . " WHERE isdisable=0 and `name`='bj_qrcode'");
	if(!empty($addons_bj_qrcode['name']))
	{
			$_CMS['addons_bj_qrcode']=true;
	}
}
if(is_file(WEB_ROOT.'/addons/bj_message/lib/lib_bj_message.php'))
{

require(WEB_ROOT.'/addons/bj_message/lib/lib_bj_message.php');
	$addons_bj_message = mysqld_select("SELECT * FROM " . table('modules') . " WHERE isdisable=0 and `name`='bj_message'");
	if(!empty($addons_bj_message['name']))
	{
			$_CMS['addons_bj_message']=true;
	}
}

if(is_file(WEB_ROOT.'/addons/bj_hx/lib/lib_bj_hx.php'))
{

	require(WEB_ROOT.'/addons/bj_hx/lib/lib_bj_hx.php');
		$addons_bj_hx = mysqld_select("SELECT * FROM " . table('modules') . " WHERE isdisable=0 and `name`='bj_hx'");
	if(!empty($addons_bj_hx['name']))
	{
				$_CMS['addons_bj_hx']=true;
	}
}
require(WEB_ROOT.'/system/common/lib/lib_login.php');
