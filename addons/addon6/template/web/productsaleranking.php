<?php 
// +----------------------------------------------------------------------
// | WE CAN DO IT JUST FREE
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://www.baijiacms.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 百家威信 <QQ:2752555327> <http://www.baijiacms.com>
// +----------------------------------------------------------------------
defined('SYSTEM_IN') or exit('Access Denied');?>
<?php  include page('header');?>
<h3 class="header smaller lighter blue">商品销售排行</h3>
		<div class="alert alert-info" style="margin:10px 0; width:auto;">
			<i class="icon-lightbulb"></i>  查询一段时间内商品销售量和销售额，默认排序为销售量从高到低。
		</div>
		
	<link type="text/css" rel="stylesheet" href="<?php echo RESOURCE_ROOT;?>/addons/common/css/datetimepicker.css" />
		<script type="text/javascript" src="<?php echo RESOURCE_ROOT;?>/addons/common/js/datetimepicker.js"></script>
<form action="">
		<input type="hidden" name="mod" value="site" />
				<input type="hidden" name="name" value="addon6" />
				<input type="hidden" name="do" value="productsaleranking" />
				
<h4 class="sub-title">
	起始日期：<input name="start_time" id="start_time" type="text" value="<?php  echo empty($start_time)?date('Y-m-d',time()):date('Y-m-d',$start_time);?>" readonly="readonly"  /> 
， 终止日期：<input name="end_time" id="end_time" type="text" value="<?php  echo empty($end_time)?date('Y-m-d',time()):date('Y-m-d',$end_time);?>" readonly="readonly"  /> 
	&nbsp;&nbsp;&nbsp;<input type="submit" name="" value=" 查  询 " class="btn btn-primary" >&nbsp;<button type="submit" name="productsalerankingEXP01" value="productsalerankingEXP01" class="btn btn-warning btn-primary">导出excel</button>
	</h4>
			</form>
		<table class="table table-striped table-bordered table-hover">
			<thead class="navbar-inner">
				<tr>
					<th width="85"  >排行</th>
					<th width="41" >商品名称</th>
				<th width="41" >销售量</th>
					<th width="42" >销售额</th>
				</tr>
			</thead>
			<tbody>
				<?php  $index=1?>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td><?php  echo $index;?> <?php  if($index==1||$index==2||$index==3) { ?>
						<img  src="<?php  echo WEBSITE_ROOT;?>addons/addon6/images/000<?php  echo $index;?>.gif" style="border-width:0px;">
						<?php  } ?><?php  $index++?></td>
					<td><?php  echo $item['title'];?></td>
					<td><?php echo $item['salescount']==0?0:$item['salescount']?></td>
					<td><?php echo $item['salesmoney']==0?0:$item['salesmoney']?></td>
				</tr>
				<?php  } } ?>

			</tr>
		</table>
				
								<script type="text/javascript">
		$("#start_time").datetimepicker({
			format: "yyyy-mm-dd",
			minView: "2",
			//pickerPosition: "top-right",
			autoclose: true
		});
	</script> 
	<script type="text/javascript">
		$("#end_time").datetimepicker({
			format: "yyyy-mm-dd",
			minView: "2",
			autoclose: true
		});
	</script>
<?php  include page('footer');?>