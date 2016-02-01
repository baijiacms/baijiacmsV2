<?php
define('SYSTEM_ACT', 'mobile');
$mname='weixin';
$do='process';
ob_start();
$CLASS_LOADER="driver";
require 'includes/init.php';
ob_end_flush();
exit;