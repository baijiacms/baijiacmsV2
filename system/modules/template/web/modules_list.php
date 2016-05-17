<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<div class="alert alert-info">
      插件关闭后，管理界面刷新该插件菜单将隐藏，前台访问该插件将跳转商城首页<br>
    </div>
<h3 class="header smaller lighter blue">插件管理</h3>
	
		<form action="" class="form-horizontal" method="post" onsubmit="return formcheck(this)">
<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
    <th class="text-center"  >插件名称</th>
    <th class="text-center">操作</th>
				</tr>
			</thead>
		<?php  if(is_array($modules_list)) { foreach($modules_list as $item) { ?>
				<tr>
				  <td class="text-center"><?php  echo $item['title'];?></td>
         <td class="text-center"><?php if($item['isdisable']==1){?>
         	<a class="btn btn-xs btn-info"  href="<?php  echo web_url('modules', array('op'=>'open_module','module_name'=>$item['name']))?>" >
                                   <i class="icon-edit"></i>&nbsp;启&nbsp;动&nbsp;                               
                                </a><?php }else{ ?>
                                 <a class="btn btn-xs btn-danger" href="<?php  echo web_url('modules', array('op'=>'close_module','module_name'=>$item['name']))?>" >
                                  <i class="icon-edit"></i>&nbsp;关&nbsp;闭&nbsp;                          
                                </a>
                                 <?php }?>  </td>
				</tr>
				<?php  } } ?>
				
					
		</table>

		</form>



<?php  include page('footer');?>
