<?php
define('SYSTEM_ACT', 'mobile');
$mname='alipay';
$do='process';
ob_start();
$CLASS_LOADER="driver";
require 'includes/init.php';
ob_end_flush();
exit;