<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">文章管理&nbsp;&nbsp;&nbsp;<a href="<?php  echo web_url('article', array('op'=>'post'));?>" class="btn btn-primary">添加文章</a></h3>
<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
		 <th class="text-center" >文章名称</th>
    <th class="text-center"  >文章分类</th>
    <th class="text-center" width="100px">阅读次数</th>
    <th class="text-center" >属性</th>
    <th class="text-center" >链接</th>
    <th class="text-center">操作</th>
				</tr>
			</thead>
		<?php  if(is_array($article_list)) { foreach($article_list as $item) { ?>
				<tr>
					<td class="text-center"><?php echo $item['title']; ?></td>
          <td class="text-center"><?php echo    $category_pcate[$item['pcate']]['name']; ?><?php if(!empty($item['ccate'])){ ?>-<?php   } ?><?php echo  $category_ccate[$item['ccate']]['name']; ?></td>
           <td class="text-center"><?php echo $item['readcount']; ?></td>
          <td class="text-center"><?php if(!empty($item['ishot'])){ ?> <label data="1" class="label label-info">热门</label><?php   } ?>
          	<?php if(!empty($item['iscommend'])){ ?> <label data="1" class="label label-info">推荐</label><?php   } ?></td>
              <td class="text-center"> 
              	<input readonly="readlony" type="text"  class="col-sm-10" value="<?php echo WEBSITE_ROOT;?><?php  echo create_url('mobile',array('name' => 'addon8','do' => 'article','id'=>$item['id']))?>" /> </td>
         <td class="text-center">
                                                    	<a class="btn btn-xs btn-info"  href="<?php  echo web_url('article', array('op' => 'post', 'id' => $item['id']))?>"><i class="icon-edit"></i>&nbsp;修&nbsp;改&nbsp;</a> 
                    	&nbsp;&nbsp;	<a class="btn btn-xs btn-info" onclick="return confirm('此操作不可恢复，确认删除？');return false;"  href="<?php  echo web_url('article', array('op' => 'delete', 'id' => $item['id']))?>"><i class="icon-edit"></i>&nbsp;删&nbsp;除&nbsp;</a> </td>
                                </td>
				</tr>
				<?php  } } ?>
		</table>

<?php  include page('footer');?>
