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
<h3 class="header smaller lighter blue">商品访问与购买比</h3>

	<table class="table table-striped table-bordered table-hover">
			<thead >
				<tr>
					<th width="85"  >排行</th>
					<th width="41" >商品名称</th>
				<th width="41" >访问次数</th>
					<th width="42" >购买件数</th>
							<th width="42" >访问购买率</th>
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
					<td><?php  echo $item['viewcount'];?></td>
					<td><?php  echo $item['salescount'];?></td>
					<td><?php  echo $item['cpersent'];?>%</td>
				</tr>
				<?php  } } ?>

			</tr>
		</table>
		
<?php  include page('footer');?>