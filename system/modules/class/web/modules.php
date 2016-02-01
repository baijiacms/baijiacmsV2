<?php
$modules_list=mysqld_selectall("SELECT * FROM " . table('modules') . " order by displayorder ");
 $operation = !empty($_GP['op']) ? $_GP['op'] : 'display';
  if($operation=='display')
 {
   if (checksubmit('submit')) {
   	if(!empty($_GP['displayorder']))
   	{
   	 foreach($_GP['displayorder'] as $module_name => $displayorder) {
                    mysqld_update('modules', array('displayorder' => $displayorder), array('name' => $module_name));
                }
                
     }
			 	message('排序更新成功','refresh','success');
  }
}
 if($operation=='open_module')
 {
 	
 	
			 mysqld_update('modules',array('isdisable' => 0) , array('name' => $_GP['module_name']));
			 	message('插件启动成功！','refresh','success');
 }
  if($operation=='close_module')
 {
 	
			 mysqld_update('modules',array('isdisable' => 1) , array('name' => $_GP['module_name']));
			 	message('插件关闭成功！','refresh','success');
 	
 }
		include page('modules_list');