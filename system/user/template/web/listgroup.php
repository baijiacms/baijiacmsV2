<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">用户组&nbsp;&nbsp;&nbsp;<a href="<?php  echo web_url('usergroup', array('op'=>'usergroup'));?>" class="btn btn-primary">添加用户组</a></h3>
		<table class="table table-striped table-bordered table-hover">
			<thead >
				<tr>
					<th style="text-align:center;min-width:150px;">用户组</th>
					<th style="text-align:center;min-width:150px;">创建时间</th>
					<th style="text-align:center; min-width:60px;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td style="text-align:center;"><?php  echo $item['groupName'];?></td>
							<td style="text-align:center;">
									<?php  echo date('Y-m-d H:i:s', $item['createtime'])?></td>
						<td style="text-align:center;">
						<a class="btn btn-xs btn-info"  href="<?php  echo web_url('usergroup', array('op'=>'rule','id' => $item['id']))?>"><i class="icon-edit"></i>设置权限</a>
						&nbsp;&nbsp;
						<a class="btn btn-xs btn-info"  href="<?php  echo web_url('usergroup', array('op'=>'usergroup','id' => $item['id']))?>"><i class="icon-edit"></i>编辑</a>&nbsp;&nbsp;
						<a class="btn btn-xs btn-danger" href="<?php  echo web_url('usergroup', array('op'=>'deletegroup','id' => $item['id']))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;"><i class="icon-edit"></i>&nbsp;删&nbsp;除&nbsp;</a>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>

<?php  include page('footer');?>
