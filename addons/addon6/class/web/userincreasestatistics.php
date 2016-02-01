<?php
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: °Ù¼ÒÍþÐÅ <QQ:2752555327> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
$usertype = $_GP['usertype']?$_GP['usertype']:'user';

 $condtitiontime = '';
 $conditionflag = '';
 if($usertype == 'agent')
{
     $conditionflag = ' and flag=1';
     $condtitiontime = 'flagtime';
     }else
    {
    
     $condtitiontime = 'createtime';
     }

 $list = mysqld_selectall("SELECT * FROM " . table('member') . "   WHERE istemplate = 0 ");
 $nowyear = intval(date('Y', time()));
 $nowmonth = intval(date('m', time()));
 $years = array(array('year' => $nowyear-3, 'checked' => 0), array('year' => $nowyear-2, 'checked' => 0), array('year' => $nowyear-1, 'checked' => 0), array('year' => $nowyear, 'checked' => 1));
 $nowday = date('t', time());


 $chartdata1 = array();


 $index = 0;
 for($dateindex = 7;$dateindex >= 0;$dateindex--)
{
     if($dateindex == 0)
    {
         $time = date("Y-m-d", time());
         }else
        {
         $time = date("Y-m-d", strtotime("-" . $dateindex . " day"));
         }
    
     $start_time = strtotime($time . " 00:00:01");
     $end_time = strtotime($time . " 23:59:59");
     $chart1data = mysqld_select("SELECT count(*) as counts,'" . $time . "' as dates FROM " . table('member') . "   WHERE istemplate = 0 $conditionflag and " . $condtitiontime . ">=" . $start_time . " and  " . $condtitiontime . "<=" . $end_time);
    
     $chartdata1[$index]['counts'] = $chart1data['counts'];
     $chartdata1[$index]['dates'] = $chart1data['dates'];
     $chartdata1[$index]['index'] = $index;
     $index = $index + 1;
     }




 $index = 0;
 $chartdata2 = array();
 $dropMonthForYaer = $_GP['dropMonthForYaer']?$_GP['dropMonthForYaer']:$nowyear;
 $dropMonthForYaer = intval($dropMonthForYaer);
 $selectmonthSale = $_GP['selectmonthSale']?$_GP['selectmonthSale']:$nowmonth;
 $lastday = date('t', strtotime($dropMonthForYaer . "-" . $selectmonthSale . "-1"));
 foreach ($years as $id => $displayorder){
     if($years[$id]['year'] == $dropMonthForYaer)
    {
        
         $years[$id]['checked'] = 1;
         }else
        {
         $years[$id]['checked'] = 0;
        
         }
     }
 for($dateindex = 1;$dateindex <= $lastday;$dateindex++)
{
    
    
     $time = $dropMonthForYaer . "-" . $selectmonthSale . "-" . $dateindex;
    
     $start_time = strtotime($time . " 00:00:01");
     $end_time = strtotime($time . " 23:59:59");
     $chart1data = mysqld_select("SELECT count(*) as counts,'" . $time . "' as dates FROM " . table('member') . "   WHERE istemplate = 0 $conditionflag and " . $condtitiontime . ">=" . $start_time . " and  " . $condtitiontime . "<=" . $end_time);
    
     $chartdata2[$index]['counts'] = $chart1data['counts'];
     $chartdata2[$index]['dates'] = $dateindex;
     $chartdata2[$index]['index'] = $index;
     $index = $index + 1;
     }


 $index = 0;
 $chartdata3 = array();
 $dropMonthForYaer2 = $_GP['dropMonthForYaer2']?$_GP['dropMonthForYaer2']:$nowyear;
 $dropMonthForYaer2 = intval($dropMonthForYaer2);
 $years2 = array(array('year' => $nowyear-3, 'checked' => 0), array('year' => $nowyear-2, 'checked' => 0), array('year' => $nowyear-1, 'checked' => 0), array('year' => $nowyear, 'checked' => 1));
 foreach ($years2 as $id => $displayorder){
     if($years2[$id]['year'] == $dropMonthForYaer2)
    {
        
         $years2[$id]['checked'] = 1;
         }else
        {
         $years2[$id]['checked'] = 0;
        
         }
     }
 for($dateindex = 1;$dateindex <= 12;$dateindex++)
{
    
     $lastday = date('t', strtotime($dropMonthForYaer2 . "-" . $dateindex . "-1"));
    
     $time = $dropMonthForYaer2 . "-" . $dateindex;
    
     $start_time = strtotime($time . "-1" . " 00:00:01");
     $end_time = strtotime($time . "-" . $lastday . " 23:59:59");
     $chart1data = mysqld_select("SELECT count(*) as counts,'" . $time . "' as dates FROM " . table('member') . "   WHERE istemplate = 0$conditionflag and " . $condtitiontime . ">=" . $start_time . " and  " . $condtitiontime . "<=" . $end_time);
    
     $chartdata3[$index]['counts'] = $chart1data['counts'];
     $chartdata3[$index]['dates'] = $chart1data['dates'];
     $chartdata3[$index]['index'] = $index;
     $index = $index + 1;
     }


 include addons_page('userincreasestatistics');
