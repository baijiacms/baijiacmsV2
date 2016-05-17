<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">用户组权限列表</h3>
  <form action="" method="post" class="form-horizontal" enctype="multipart/form-data" >
  	
		<table class="table table-striped table-bordered table-hover">
			<thead >
				<tr>
					<th style="text-align:center;min-width:150px;">权限  <strong><a href="javascript:;" onclick="checkrule(true)">全选</a>，<a href="javascript:;"  onclick="checkrule(false)">全否</a></strong>
			                	</th>
					<th style="text-align:center;min-width:150px;">功能名称</th>
					<th style="text-align:center;min-width:150px;">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
						<?php $index=1;  if(is_array($system_list)) { foreach($system_list as $item) { ?>
				<tr>
					<td style="text-align:center;">
		<input <?php echo $item['readonly']==true?"disabled":""?> <?php if($item['readonly']==false){ ?>id="s<?php echo $index;$index++?>"<?php } ?> type="checkbox" name="<?php  echo $item['modname'].'-'.$item['moddo'];?>" value="1"  <?php echo $item['check']==true?"checked":""?>>
						<?php if($item['readonly']==true){?>	<br/>	<span class="label label-info">继承用户组</span>	<?php }?>			</td>
									<td style="text-align:center;"><?php  echo $item['rule_name'];?></td>
<td style="text-align:center;"><span class="label label-success">系统模块</span></td>
					</tr>
				<?php  } } ?>
				
				<?php  if(is_array($modules_list)) { foreach($modules_list as $item) { ?>
				<tr>
					<td style="text-align:center;">
						
						<input <?php echo $item['readonly']==true?"disabled":""?> <?php if($item['readonly']==false){ ?>id="s<?php echo $index;$index++?>"<?php } ?> type="checkbox" name="<?php  echo $item['name'].'-ALL';?>" value="1"  <?php echo $item['check']==true?"checked":""?>>
						</td>
									<td style="text-align:center;"><?php  echo $item['title'];?></td>
<td style="text-align:center;"><span class="label label-warning">扩展模块</span></td>
					</tr>
				<?php  } } ?>
					<tr>
						
					<td colspan="3" >
						&nbsp;&nbsp;&nbsp;
					<input name="submit" type="submit" value=" 保存权限 " class="btn btn-info"/>
						</td>
					</tr>
				
					    <script>
			                      function checkrule(ischecked)
			                      {
			                      	for(var i=1;i<<?php echo $index;?>;i++)
			                      	{
			                      	document.getElementById("s"+i).checked=ischecked;
			                      	
			                      	}
			                      
			                     	}</script>
			</tbody>
		</table>
    </form>

<?php  include page('footer');?>
