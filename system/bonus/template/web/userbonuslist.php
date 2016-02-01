<?php defined('SYSTEM_IN') or exit('Access Denied');?><?php  include page('header');?>
<h3 class="header smaller lighter blue">优惠券</h3>

					<table class="table table-striped table-bordered table-hover">
			<thead >
				<tr>
					<th style="text-align:center;">优惠券名称</th>
						<th style="text-align:center;">优惠券金额</th>
					<th style="text-align:center;">使用期限</th>
					<th style="text-align:center;">状态</th>
				</tr>
			</thead>
			<tbody>
 <?php   foreach($bonuslist as $v) { ?>
								<tr>
										<td class="text-center">
										<?php  echo $v['type_name'];?>
									</td>
											<td class="text-center">
										<?php  echo $v['type_money'];?>
									</td>
										<td class="text-center">
										<?php  echo date('Y-m-d H:i:s', $v['use_start_date']);?>到<?php  echo date('Y-m-d H:i:s', $v['use_end_date']);?>
									</td>
										<td class="text-center">
									        <?php if($v['isuse']==0){  ?>  <?php if($v['use_end_date']<=time()){  ?> 已过期<?php }else{  ?>  未使用 <?php } ?>  <?php }else{  ?>   已使用   <?php } ?>                              </div>
                             
									</td>
								<?php   } ?>
  </tbody>
    </table>
<?php  include page('footer');?>