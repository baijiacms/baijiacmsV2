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

			<h3 class="header smaller lighter blue">零售生意报告</h3>
<div class="alert alert-info" style="margin:10px 0; width:auto;">
			<i class="icon-lightbulb"></i> 查看生意情况，您可以按月或按日分别查看商城订单交易量、交易额
		</div>

			<form action="">
				<input type="hidden" name="mod" value="site" />
				<input type="hidden" name="name" value="addon6" />
				<input type="hidden" name="do" value="salereport" />
	
				<h4 class="sub-title">
		按月统计：
				&nbsp;&nbsp;&nbsp;
					<select name="dropMonthForYaer" >
		<?php  if(is_array($years)) { foreach($years as $v) { ?>
	<option value="<?php  echo $v['year'];?>"  <?php  if($v['checked'] == 1) { ?>selected="selected"<?php  } ?>><?php  echo $v['year'];?></option>
			<?php  } } ?>
</select>
								年&nbsp;&nbsp;
				<input type="radio" name="radioMonthForSaleType" value="0" <?php  if($radioMonthForSaleType == 0) { ?>checked=""<?php  } ?>>交易量&nbsp;
			<input type="radio" name="radioMonthForSaleType" value="1" <?php  if($radioMonthForSaleType == 1) { ?>checked=""<?php  } ?>>交易额&nbsp;&nbsp;&nbsp;
			<input type="submit" name="submit" value=" 查 询 " class="btn btn-primary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;			<button type="submit" name="salereportEXP01" value="salereportEXP01" class="btn btn-warning btn-primary">导出excel</button></td>
					
				
					<span class="pull-right" style="padding:10px 10px 0 0;">总<?php  if($radioMonthForSaleType == 1 ) { ?>交易额<?php  } else { ?>交易量<?php  } ?>：<span style="color:red; "><?php  echo $allcount;?></span>，最高峰<?php  if($radioMonthForSaleType == 1 ) { ?>交易额<?php  } else { ?>交易量<?php  } ?>：<span style="color:red; "><?php  echo $topcount;?></span></span>
					</h4>
					<table class="table table-striped table-bordered table-hover">
							<thead >
								<tr>
									<th style="text-align:center">月份</th>
									<th style="text-align:center"><?php  if($radioMonthForSaleType == 1 ) { ?>交易额 <?php  } else { ?> 交易量<?php  } ?></th>
									<th style="text-align:left">比例示意图</th>
								</tr>
							</thead>
							<tbody>
								<?php  if(is_array($datas)) { foreach($datas as $v) { ?>
								<tr>
									<td style="text-align: center;">
										<?php  echo $v['month'];?>
									</td>
									<td style="text-align: center;">
										<?php  echo $v['count'];?>
									</td>
									<td style="text-align: left;">
										<img width="<?php  echo (4*$v['persent'])?>px" height="15" style="margin-left:0px;background: url(<?php  echo WEBSITE_ROOT;?>addons/addon6/images/lenth.gif);height: 15px;"><?php  echo $v['persent'];?>%
									</td>
								
						
								</tr>
								<?php  } } ?>
							</tbody>
						</table>
				
				<h4 class="sub-title">按日统计&nbsp;&nbsp;&nbsp;
					
					<select name="dropdayForYaer" >
		<?php  if(is_array($years)) { foreach($years as $v) { ?>
	<option value="<?php  echo $v['year'];?>"  <?php  if($v['checked'] == 1) { ?>selected="selected"<?php  } ?>><?php  echo $v['year'];?></option>
			<?php  } } ?>
</select>
								年&nbsp;&nbsp;&nbsp;
							
					<select name="selectmonthSale" class="span1">	
	<option value="1" <?php  if($selectmonthSale == 1 ) { ?>selected="selected" <?php  } ?>>1</option>
	<option value="2" <?php  if($selectmonthSale == 2 ) { ?>selected="selected" <?php  } ?>>2</option>
	<option value="3" <?php  if($selectmonthSale == 3 ) { ?>selected="selected" <?php  } ?>>3</option>
	<option value="4" <?php  if($selectmonthSale == 4 ) { ?>selected="selected" <?php  } ?>>4</option>
	<option value="5" <?php  if($selectmonthSale == 5 ) { ?>selected="selected" <?php  } ?>>5</option>
	<option value="6" <?php  if($selectmonthSale == 6 ) { ?>selected="selected" <?php  } ?>>6</option>
	<option value="7" <?php  if($selectmonthSale == 7 ) { ?>selected="selected" <?php  } ?>>7</option>
	<option value="8" <?php  if($selectmonthSale == 8 ) { ?>selected="selected" <?php  } ?>>8</option>
	<option value="9" <?php  if($selectmonthSale == 9 ) { ?>selected="selected" <?php  } ?>>9</option>
	<option value="10" <?php  if($selectmonthSale == 10 ) { ?>selected="selected" <?php  } ?>>10</option>
	<option value="11" <?php  if($selectmonthSale == 11 ) { ?>selected="selected" <?php  } ?>>11</option>
	<option value="12" <?php  if($selectmonthSale == 12 ) { ?>selected="selected" <?php  } ?>>12</option>

</select>月
				
					<label ><input type="radio" name="radiodayForSaleType" value="0" <?php  if($radiodayForSaleType == 0) { ?>checked=""<?php  } ?>>交易量</label>&nbsp;
					<label ><input type="radio" name="radiodayForSaleType" value="1" <?php  if($radiodayForSaleType == 1) { ?>checked=""<?php  } ?>>交易额</label>&nbsp;
		<input type="submit" name="t2" value="查询" class="btn btn-primary">&nbsp;&nbsp;
						<button type="submit" name="salereportEXP02" value="salereportEXP02" class="btn btn-warning btn-primary">导出excel</button>
		<span class="pull-right" style="padding:10px 10px 0 0;">总<?php  if($radiodayForSaleType == 1 ) { ?>交易额<?php  } else { ?>交易量<?php  } ?>：<span style="color:red; "><?php  echo $dayallcount;?></span>，最高峰<?php  if($radiodayForSaleType == 1 ) { ?>交易额<?php  } else { ?>交易量<?php  } ?>：<span style="color:red; "><?php  echo $daytopcount;?></span></span>
					
		
		</h4>

						<table class="table table-striped table-bordered table-hover">
							<thead class="navbar-inner">
								<tr>
									<th class="row-hover">日期</th>
									<th class="row-hover" style="width:200px"><?php  if($radiodayForSaleType == 1 ) { ?>交易额<?php  } else { ?>交易量<?php  } ?></th>
									<th class="row-hover" >比例示意图</th>
								</tr>
							</thead>
							<tbody>
								<?php  if(is_array($daydatas)) { foreach($daydatas as $v) { ?>
								<tr>
									<td style="text-align: center;">
										<?php  echo $v['day'];?>
									</td>
									<td style="text-align: center;width:200px">
										<?php  echo $v['count'];?>
									</td>
									<td style="text-align: left;">
										<img width="<?php  echo (4*$v['persent'])?>px" height="15" style="margin-left:0px;background: url(<?php  echo WEBSITE_ROOT;?>addons/addon6/images/lenth.gif);height: 15px;"><?php  echo $v['persent'];?>%
									</td>
								
						
								</tr>
								<?php  } } ?>
							</tbody>
						</table>

    	</form>


<?php  include page('footer');?>