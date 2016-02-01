<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">单页管理&nbsp;&nbsp;&nbsp;<a href="<?php  echo web_url('singlepage', array('op'=>'post'));?>" class="btn btn-primary">新建单页</a></h3>
<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
		 <th class="text-center" >名称</th>
    <th class="text-center" >链接</th>
    <th class="text-center">操作</th>
				</tr>
			</thead>
		<?php  if(is_array($singlepage_list)) { foreach($singlepage_list as $item) { ?>
				<tr>
					<td class="text-center"><?php echo $item['title']; ?></td>
               <td class="text-center"> 
              	<input readonly="readlony" type="text"  class="col-sm-10" value="<?php echo WEBSITE_ROOT;?><?php  echo create_url('mobile',array('name' => 'addon9','do' => 'singlepage','id'=>$item['id']))?>" /><a target="_blank" href="<?php echo WEBSITE_ROOT;?><?php  echo create_url('mobile',array('name' => 'addon9','do' => 'singlepage','id'=>$item['id']))?>">预览</a> </td>
         <td class="text-center">    	<a class="btn btn-xs btn-info"  href="<?php echo WEBSITE_ROOT;?><?php  echo create_url('mobile',array('name' => 'addon9','do' => 'singlepage','id'=>$item['id']))?>" target="_blank"><i class="icon-eye-open"></i>&nbsp;预&nbsp;览&nbsp;</a> 
                    	&nbsp;&nbsp;	
                                                    	<a class="btn btn-xs btn-info"  href="<?php  echo web_url('singlepage', array('op' => 'post', 'id' => $item['id']))?>"><i class="icon-edit"></i>&nbsp;修&nbsp;改&nbsp;</a> 
                    	&nbsp;&nbsp;	<a class="btn btn-xs btn-info" onclick="return confirm('此操作不可恢复，确认删除？');return false;"  href="<?php  echo web_url('singlepage', array('op' => 'delete', 'id' => $item['id']))?>"><i class="icon-edit"></i>&nbsp;删&nbsp;除&nbsp;</a> </td>
                                </td>
				</tr>
				<?php  } } ?>
		</table>

<?php  include page('footer');?>
