<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: °Ù¼ÒÍþÐÅ <QQ:2752555327> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
$nowyear = intval(date('Y', time()));
 $nowmonth = intval(date('m', time()));
 $years = array(array('year' => $nowyear-3, 'checked' => 0), array('year' => $nowyear-2, 'checked' => 0), array('year' => $nowyear-1, 'checked' => 0), array('year' => $nowyear, 'checked' => 1));
 $dropMonthForYaer = $_GP['dropMonthForYaer']?$_GP['dropMonthForYaer']:$nowyear;
 $radioMonthForSaleType = $_GP['radioMonthForSaleType']?$_GP['radioMonthForSaleType']:'0';
 $dropMonthForYaer = intval($dropMonthForYaer);

 $selectmonthSale = $_GP['selectmonthSale']?$_GP['selectmonthSale']:$nowmonth;
 $radiodayForSaleType = $_GP['radiodayForSaleType']?$_GP['radiodayForSaleType']:'0';
 $dropdayForYaer = $_GP['dropdayForYaer']?$_GP['dropdayForYaer']:$nowyear;
 $dropdayForYaer = intval($dropdayForYaer);


 foreach ($years as $id => $displayorder){
     if($years[$id]['year'] == $dropMonthForYaer)
    {
        
         $years[$id]['checked'] = 1;
         }else
        {
         $years[$id]['checked'] = 0;
        
         }
     }

 $datas = array(array());
 $index = 0;
 $allcount = 0;
 $topcount = 0;

 for ($month = 1; $month <= 12; $month++){
     $datas[$index]['month'] = $month;
     $lastday = date('t', strtotime($dropMonthForYaer . "-" . $month . "-1"));
    
     if($radioMonthForSaleType == '0')
    {
         $ordercount = mysqld_selectcolumn("SELECT count(id) FROM " . table('shop_order') . " WHERE  createtime >=" . strtotime($dropMonthForYaer . "-" . $month . "-1" . " 00:00:01") . " and createtime <=" . strtotime($dropMonthForYaer . "-" . $month . "-" . $lastday . " 23:59:59"));
         }
     if($radioMonthForSaleType == '1')
    {
         $ordercount = mysqld_selectcolumn("SELECT sum(cast(price as decimal(8,2))) FROM " . table('shop_order') . " WHERE  createtime >=" . strtotime($dropMonthForYaer . "-" . $month . "-1" . " 00:00:01") . " and createtime <=" . strtotime($dropMonthForYaer . "-" . $month . "-" . $lastday . " 23:59:59"));
         }
     if(empty($ordercount))
        {
         $ordercount = 0;
         }
     if($topcount < $ordercount)
    {
         $topcount = $ordercount;
         }
     $datas[$index]['month'] = $month;
     $datas[$index]['count'] = $ordercount;
     $allcount = $allcount + $ordercount;
     $index = $index + 1;
    
    
    
    
    
     if($nowyear == $dropMonthForYaer)
    {
        
         if($nowmonth == $month)
        {
            
             $month = 13;
             }
        
         }
    
     }

 foreach ($datas as $index => $row){
     if($allcount > 0)
    {
         $datas[$index]['persent'] = round(($datas[$index]['count'] / $allcount), 2) * 100;
         }else
        {
         $datas[$index]['persent'] = 0;
         }
     }




 $dayallcount = 0;
 $daytopcount = 0;
 $daydatas = array(array());
 $dayindex = 0;
 $lastday = date('t', strtotime($dropdayForYaer . "-" . $selectmonthSale . "-1"));

 for($day = 1;$day <= $lastday;$day++)
{
    
     if($radiodayForSaleType == '0')
    {
         $dayordercount = mysqld_selectcolumn("SELECT count(id) FROM " . table('shop_order') . " WHERE createtime >=" . strtotime($dropdayForYaer . "-" . $selectmonthSale . "-" . $day . " 00:00:01") . " and createtime <=" . strtotime($dropdayForYaer . "-" . $selectmonthSale . "-" . $day . " 23:59:59"));
         }
     if($radiodayForSaleType == '1')
    {
         $dayordercount = mysqld_selectcolumn("SELECT sum(cast(price as decimal(8,2))) FROM " . table('shop_order') . " WHERE createtime >=" . strtotime($dropdayForYaer . "-" . $selectmonthSale . "-" . $day . " 00:00:01") . " and createtime <=" . strtotime($dropdayForYaer . "-" . $selectmonthSale . "-" . $day . " 23:59:59"));
         }
    
     if(empty($dayordercount))
        {
         $dayordercount = 0;
         }
    
     $daydatas[$dayindex]['day'] = $day;
     $daydatas[$dayindex]['count'] = $dayordercount;
     $dayindex = $dayindex + 1;
    
     $dayallcount = $dayallcount + $dayordercount;
     if($daytopcount < $dayordercount)
    {
         $daytopcount = $dayordercount;
         }
     }


 foreach ($daydatas as $index => $row){
     if($dayallcount > 0)
    {
         $daydatas[$index]['persent'] = round(($daydatas[$index]['count'] / $dayallcount), 2) * 100;
         }else
        {
         $daydatas[$index]['persent'] = 0;
         }
     }

 if(!empty($_GP['salereportEXP01']))
    {
     $report = "salereport01";
     $list = $datas;
    
     require_once 'report.php';
     exit;
     }

 if(!empty($_GP['salereportEXP02']))
    {
     $report = "salereport02";
     $list = $daydatas;
     require_once 'report.php';
     exit;
     }
 include addons_page('salereport');